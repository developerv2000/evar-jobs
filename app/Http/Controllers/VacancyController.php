<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function webmaster_index(Request $request)
    {
        // Generate parameters for order request
        $order_by = $request->order_by;
        if (!$order_by) $order_by = "created_at";

        $order_type = $request->order_type;
        if (!$order_type) $order_type = "desc";

        $active_page = $request->page;
        if (!$active_page) $active_page = 1;

        $vacancies = Vacancy::orderBy($order_by, $order_type)->get();

        //used in search & counting
        $all_items = $vacancies;
        $items_count = $all_items->count();

        return view("dashboard.vacancies.index", compact("vacancies", "all_items", "items_count", "order_by", "order_type", "active_page"));
    }

    public function webmaster_create()
    {
        return view("dashboard.vacancies.create");
    }

    public function store(Request $request)
    {
        $vacancy = new Vacancy;
        $vacancy->name = $request->name;
        $vacancy->salary = $request->salary;
        $vacancy->body = $request->body;
        $vacancy->save();

        return redirect()->route('dashboard.vacancies.index');
    }

    public function webmaster_single($id)
    {
        $vacancy = Vacancy::find($id);

        return view("dashboard.vacancies.single", compact("vacancy"));
    }

    public function update(Request $request)
    {
        $vacancy = Vacancy::find($request->id);
        $vacancy->name = $request->name;
        $vacancy->salary = $request->salary;
        $vacancy->body = $request->body;
        $vacancy->save();

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        Vacancy::find($request->id)->delete();

        return redirect()->route("dashboard.vacancies.index");
    }

    public function remove_multiple(Request $request)
    {
        foreach($request->ids as $id) {
            Vacancy::find($id)->delete();
        }

        return redirect()->back();
    }

}
