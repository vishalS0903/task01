<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function create()
    {
        $user=User::all();
        // dd($user);
        return view('dashboard',compact('user'));
    }
}
