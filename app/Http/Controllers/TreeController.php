<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\{
    Question,
    Document,
    PaymentMethod,
    Tree,
    Section,
};

class TreeController extends Controller
{
    public function index(string $url = null)
    {
        $tree = Tree::ofUrl($url)->with('section.layout')->first();
        $components = json_decode($tree->section->components, true);

        return view($tree->section->view, [
            'tree' => $tree,
            'components' => $components,
        ]);
    }

    public function homeContacts(Request $request)
    {
        $section = Tree::ofUrl($request->path())->first()->section;
        $questions = Question::published()->general()->get();
        return view('front.trees.home_contacts', [
            'section' => $section,
            'questions' => $questions,
        ]);
    }

    public function about(Request $request)
    {
        $tree = Tree::ofUrl($request->path())
            ->with([
                'childrenTrees.section' => function($query) {
                    $query->withCount('currentUserLikes');
                    $query->withCount('likes');
                }
            ])
            ->first();
        return view('front.trees.about', [
            'tree' => $tree,
        ]);
    }

    public function documents()
    {
        $documents = Document::published()
            ->withCount('currentUserLikes')
            ->withCount('likes')
            ->get();
        return view('front.trees.documents', [
            'documents' => $documents
        ]);
    }

    public function partnership(Request $request)
    {
        $tree = Tree::ofUrl($request->path())
            ->with([
                'section',
                'childrenTrees.section' => function($query) {
                    $query->withCount('currentUserLikes');
                    $query->withCount('likes');
                }
            ])
            ->first();
        return view('front.trees.partnership', [
            'tree' => $tree
        ]);
    }

    public function archive(Request $request)
    {
        $section = Tree::ofUrl($request->path())->with('section')->first()->section;
        return view('front.trees.archive', [
            'section' => $section
        ]);
    }

    public function payment()
    {
        $methods = PaymentMethod::notAlternative()->get();
        return view('front.trees.payment', [
            'methods' => $methods,
        ]);
    }

    public function otherPaymentMethods()
    {
        $methods = PaymentMethod::alternative()->get();
        return view('front.trees.other_payment_methods', [
            'methods' => $methods,
        ]);
    }

    public function autopayment(Request $request)
    {
        $section = Tree::ofUrl($request->path())
            ->first()
            ->section()
            ->withCount('currentUserLikes')
            ->withCount('likes')
            ->first();
        return view('front.trees.autopayment', [
            'section' => $section,
        ]);
    }

    public function deferredPayment(Request $request)
    {
        $section = Tree::ofUrl($request->path())->first();
        return view('front.trees.deferred_payment', [
            'section' => $section,
        ]);
    }
}
