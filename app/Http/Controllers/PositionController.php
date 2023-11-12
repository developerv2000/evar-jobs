<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function webmaster_index(Request $request)
    {
        // Generate parameters for order request
        $order_by = $request->order_by;
        if (!$order_by) $order_by = "name";

        $order_type = $request->order_type;
        if (!$order_type) $order_type = "asc";

        $active_page = $request->page;
        if (!$active_page) $active_page = 1;

        $positions = Position::orderBy($order_by, $order_type)
            ->paginate(30, ["*"], "page", $active_page)
            ->appends($request->except("page"));

        //used in search & counting
        $all_items = Position::orderBy("name", "asc")->get();
        $items_count = count($all_items);

        return view("dashboard.positions.index", compact("positions", "all_items", "items_count", "order_by", "order_type", "active_page"));
    }

    public function webmaster_create()
    {
        return view("dashboard.positions.create");
    }

    public function store(Request $request)
    {
        $position = new Position();
        $position->name = $request->name;
        $position->save();

        return redirect()->route('dashboard.positions.index'); 
    }

    public function webmaster_single($id)
    {
        $position = Position::find($id);

        return view("dashboard.positions.single", compact("position"));
    }

    public function update(Request $request)
    {
        $position = Position::find($request->id);
        $position->name = $request->name;
        $position->save();

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        Position::find($request->id)->delete();

        return redirect()->route("dashboard.positions.index");
    }

    public function remove_multiple(Request $request)
    {
        foreach($request->ids as $id) {
            Position::find($id)->delete();
        }

        return redirect()->back();
    }
}
