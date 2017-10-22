<?php

namespace App\Http\Controllers;

use App\Contact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if ($id == 1) {
            $users = User::orderBy('users.updated_at','DESC')->where('isRecruiter', 1)->Paginate(10);
            $users->withPath('');
            return view("admin.recruiter_table", ['users' => $users]);
        }
        elseif ($id == 2)
        {
            $contacts = Contact::orderBy('contacts.updated_at','DESC')->Paginate(10);
            $contacts->withPath('');
            return view("admin.contacts_table", ['contacts' => $contacts]);
        }
        else{
            $users = User::orderBy('users.updated_at','DESC')->where('isRecruiter', 0)->Paginate(10);
            $users->withPath('');
            return view("admin.user_table", ['users' => $users]);
        }
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view("admin.show", ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if ($user->isAdmin) {
            $user->isAdmin = 0;
            $user->save();
        }
        else {
            $user->isAdmin = 1;
            $user->save();
        }
        session()->flash('alert-danger', 'User was successful updated!');
        return back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('alert-danger', 'User was successful deleted!');
        return back();

    }
    public function destroy_contact($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        session()->flash('alert-danger', 'Contact was successful deleted!');
        return back();
    }

}
