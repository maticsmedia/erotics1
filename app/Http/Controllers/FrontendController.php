<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $member = Member::orderBy("id", "desc")->limit(4)->get();
        return view("frontend.index", compact("member"));
    }

    public function ProfileDetail($id)
    {
        $profile = Member::find($id);
        return view('frontend.user_detail', compact('profile'));
    }

    public function AboutUs()
    {
        return view('frontend.aboutus');
    }

    public function PrivacyPolicy()
    {
        return view('frontend.privacypolicy');
    }
}
