<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Feedback;
use Illuminate\Support\Facades\Http;

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
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $recaptchaSecret = env('RECAPTCHA_SECRET_KEY');
        $remoteIp = $request->ip();

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $recaptchaSecret,
            'response' => $recaptchaResponse,
            'remoteip' => $remoteIp,
        ]);

        $responseData = $response->json();

        if ($responseData['success'] && $responseData['score'] >= 0.5) {
            Mail::to('info@evar.tj')->send(new Feedback($request));
        }

        return redirect()->back();
    }
}
  