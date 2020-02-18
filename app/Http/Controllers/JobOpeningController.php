<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Jobopening,
    Tree
};

class JobOpeningController extends Controller
{
    public function index(Request $request)
    {
        $section = Tree::ofUrl($request->path())
            ->with('section')
            ->first()
            ->section;
        $jobopenings = Jobopening::get();
        return view('front.jobopenings.index', [
            'jobopenings' => $jobopenings,
            'section' => $section,
        ]);
    }

    public function show(Request $request, Jobopening $jobopening)
    {
        $tree = Tree::ofUrl('about/job_openings')
            ->with([
                'childrenTrees.section' => function($query) {
                    $query->withCount('currentUserLikes');
                    $query->withCount('likes');
                }
            ])
            ->first();
        return view('front.jobopenings.show', [
            'jobopening' => $jobopening,
            'tree' => $tree,
        ]);
    }
}
