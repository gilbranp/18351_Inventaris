<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'dashboard';
        $user = User::orderBy('created_at','DESC')->get();
        return  view('dashboard.dashboard',compact('title','user'));
    }
}
