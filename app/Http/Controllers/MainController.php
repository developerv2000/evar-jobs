<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Feedback;

class MainController extends Controller
{
    public function home()
    {
        $vacancies = Vacancy::latest()->get();

        $positions = Position::orderBy("name", "asc")->get();

        //used in selects
        $currentYear = date("Y");

        return view("home.index", compact("vacancies", "currentYear", "positions"));
    }

    public function feedback(Request $request)
    {
        Mail::to('info@evar.tj')->send(new Feedback($request));

        return redirect()->back();
    }
}
