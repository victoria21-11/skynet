<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Navigation,
    Question,
    NavparentNavchild,
    Document,
    PaymentMethod,
};

class NavigationController extends Controller
{
    public function index(string $url = null)
    {
        $navigation = Navigation::ofUrl($url)->first();
        if(is_null($navigation)) {
            $navigation = NavparentNavchild::ofUrl($url)->firstOrFail()->child;
        }
        return view($navigation->view, [
            'navigation' => $navigation
        ]);
    }

    public function homeContacts(Request $request)
    {
        $navigation = Navigation::ofParentsPivotUrl($request->path())->with('children')->first();
        $questions = Question::published()->general()->get();
        return view('front.navigations.home_contacts', [
            'navigation' => $navigation,
            'questions' => $questions,
        ]);
    }

    public function aboutContacts(Request $request)
    {
        $navigation = Navigation::ofParentsPivotUrl($request->path())->with('children')->first();
        return view('front.navigations.about_contacts', [
            'navigation' => $navigation,
        ]);
    }

    public function about(Request $request)
    {
        $navigation = Navigation::ofUrl($request->path())->with('children')->first();
        return view('front.navigations.about', [
            'navigation' => $navigation,
        ]);
    }

    public function documents()
    {
        $documents = Document::published()->get();
        return view('front.navigations.documents', [
            'documents' => $documents
        ]);
    }

    public function partnership()
    {
        $navigation = Navigation::ofUrl('partnership')->with('children')->first();
        return view('front.navigations.partnership', [
            'navigation' => $navigation
        ]);
    }

    public function dealer()
    {
        $navigation = Navigation::ofUrl('partnership')->with('children')->first();
        return view('front.partnership.dealer', [
            'navigation' => $navigation
        ]);
    }

    public function partner()
    {
        $navigation = Navigation::ofUrl('partnership')->with('children')->first();
        return view('front.partnership.partner', [
            'navigation' => $navigation
        ]);
    }

    public function archive()
    {
        $navigation = Navigation::ofUrl('archive')->with('children')->first();
        return view('front.navigations.archive', [
            'navigation' => $navigation
        ]);
    }

    public function payment()
    {
        $navigation = Navigation::ofUrl('payment')->first();
        $methods = PaymentMethod::notAlternative()->get();
        return view('front.navigations.payment', [
            'methods' => $methods,
            'navigation' => $navigation,
        ]);
    }

    public function otherPaymentMethods()
    {
        $navigation = Navigation::ofUrl('payment')->first();
        $methods = PaymentMethod::alternative()->get();
        return view('front.navigations.other_payment_methods', [
            'methods' => $methods,
            'navigation' => $navigation,
        ]);
    }

    public function autopayment()
    {
        $main = Navigation::ofUrl('payment')->first();
        $navigation = Navigation::ofUrl('autopayment')->first();
        return view('front.navigations.autopayment', [
            'navigation' => $navigation,
            'main' => $main,
        ]);
    }

    public function deferredPayment()
    {
        $main = Navigation::ofUrl('payment')->first();
        $navigation = Navigation::ofUrl('deferred_payment')->first();
        return view('front.navigations.deferred_payment', [
            'navigation' => $navigation,
            'main' => $main,
        ]);
    }
}
