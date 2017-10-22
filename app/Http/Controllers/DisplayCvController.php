<?php

namespace App\Http\Controllers;

use App\Recruiter_like_user_cv;
use App\RecruiterLikeCvUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DisplayCvController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function finder()
    {
        $users = User::inRandomOrder()
            ->whereNotNull('file')
            ->where('isRecruiter', '=', '0')
            ->get();

        foreach ($users as $user){
            $like = recruiter_like_user_cv::where([
                ['recruiter_id', '=', Auth::user()->id],
                ['user_id', '=', $user->id]
            ])
                ->first();

            if (!$like)
                return $user;
        }
        return null;
    }

    protected function index()
    {
        $user = $this->finder();
        if ($user)
            return view('finder.index', ['user' => $user]);
        return view('finder.index');
    }

    protected function like($id)
    {
        $link = Recruiter_like_user_cv::create(['user_id' => $id, 'recruiter_id' => Auth::user()->id, 'choice' => 1]);
        $link->save();

        $user = $this->finder();
        if ($user)
            return view('finder.index', ['user' => $user]);
        return view('finder.index');
    }

    protected
    function dislike($id)
    {
        $link = Recruiter_like_user_cv::create(['user_id' => $id, 'recruiter_id' => Auth::user()->id, 'choice' => 0]);
        $link->save();

        $user = $this->finder();
        if ($user)
            return view('finder.index', ['user' => $user]);
        return view('finder.index');
    }
}
