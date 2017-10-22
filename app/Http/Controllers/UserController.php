<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isRecruiter;
use App\Recruiter_like_user_cv;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $recruiters = Recruiter_like_user_cv::join('users', 'recruiter_like_user_cvs.recruiter_id', '=', 'users.id')
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('user.show', ['user' => $user, 'recruiters' => $recruiters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    protected function validator(array $data, $id)
    {

        if (!$id) {
            return Validator::make($data, [
                'file' => 'required|mimes:pdf|max:1000',
            ]);
        } else {
            return Validator::make($data, [
                'avatar' => 'required|mimes:jpg,png,jpeg|max:1000',
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (!$request->isAvatarOrCV) {
            $this->validator($request->all(), 0)->validate();

            $request->file->storeAs('uploadedFile/File', Auth::user()->name . '.pdf');

            $user->file = "uploads/uploadedFile/File/" . Auth::user()->name . ".pdf";

        } else {
            $this->validator($request->all(), 1)->validate();

            $request->avatar->storeAs('uploadedFile/Avatar', Auth::user()->name . "." . $request->avatar->getClientOriginalExtension());

            $user->avatar = "uploads/uploadedFile/Avatar/" . Auth::user()->name . "." . $request->avatar->getClientOriginalExtension();

        }

        $user->save();

        return redirect()->action(
            'UserController@show', ['id' => Auth::user()->id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $recruiters = Recruiter_like_user_cv::join('users', 'recruiter_like_user_cvs.recruiter_id', '=', 'users.id')
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('user.show', ['user' => $user, 'recruiters' => $recruiters]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
