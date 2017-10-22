<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterFormController extends Controller
{
    public function showRegistration($id)
    {
        if ($id == 1) {
            return view("auth.recruiter_form");
        } else {
            return view("auth.user_form");
        }
    }
}
