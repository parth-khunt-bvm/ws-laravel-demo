<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view("backend.pages.dashboard.dashboard");
    }


    public function appsorders(){
        return view("backend.pages.ecommerce.orders");
    }
}
