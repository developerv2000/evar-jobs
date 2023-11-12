<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        //Redirect case no file uploaded
        if (!$request->file('file')) return redirect()->back();
        // Redirect with error case file size is too big
        $size = $request->file('file')->getSize();
        if (($size / 1024) > 2048) {
            session()->flash('alert', 'Ошибка. Размер файла не должно превысить 2 мегабайта.');
            return redirect()->back();
        }

        //Check if uploaded file is valid
        if ($request->file('file')->isValid()) {
            $extension = $request->file('file')->getClientOriginalExtension();

            //Check if file extension is valid
            if ($extension == 'docx' || $extension == 'doc' || $extension == 'pdf') {
                //Save file into database
                $file = new Upload();
                $file->name = "new";
                $file->save();
                //generate fileName 
                $date = \Carbon\Carbon::parse($file->created_at)->locale('ru');
                $formatted = $date->isoFormat('DD-MM-YYYY');
                $name = $file->id . ') ' . $formatted . '.' . $extension;
                $request->file('file')->storeAs('cvs', $name, 'private');

                //change fileName in database
                $file->name = $name;
                $file->save();

                session()->flash('alert', 'Ваша анкета успешно опубликована!');
            } else session()->flash('alert', 'Ошибка. Недопустимый формат файла!');
        }
        return redirect()->back();
    }

    public function webmaster_index(Request $request)
    {
        // Generate parameters for order request
        $order_by = $request->order_by;
        if (!$order_by) $order_by = "created_at";

        $order_type = $request->order_type;
        if (!$order_type) $order_type = "desc";

        $active_page = $request->page;
        if (!$active_page) $active_page = 1;

        $uploads = Upload::orderBy($order_by, $order_type)
            ->paginate(30, ["*"], "page", $active_page)
            ->appends($request->except("page"));

        //used in search & counting
        $all_items = Upload::latest()->get();
        $items_count = count($all_items);

        return view("dashboard.uploads.index", compact("uploads", "items_count", "order_by", "order_type", "active_page"));
    }


    public function download(Request $request)
    {
        $upload = Upload::find(request('id'));
        $upload->new = false;
        $upload->save();
  
        return response()->download(storage_path('app/uploads/cvs/' . $upload->name));
    }

    public function remove(Request $request)
    {
        Upload::find($request->id)->delete();

        return redirect()->route("dashboard.uploads.index");
    }

    public function remove_multiple(Request $request)
    {
        foreach($request->ids as $id) {
            Upload::find($id)->delete();
        }

        return redirect()->back();
    }


}
