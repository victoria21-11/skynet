<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Jobopening,
    Navigation
};

class JobOpeningController extends Controller
{
    public function index()
    {
        $navigation = Navigation::ofUrl('job_openings')->first();
        $jobopenings = Jobopening::get();
        return view('front.jobopenings.index', [
            'jobopenings' => $jobopenings,
            'navigation' => $navigation,
        ]);
    }

    public function show(Jobopening $jobopening)
    {
        $navigation = Navigation::ofUrl('job_openings')->first();
        return view('front.jobopenings.show', [
            'jobopening' => $jobopening,
            'navigation' => $navigation,
        ]);
    }
}
