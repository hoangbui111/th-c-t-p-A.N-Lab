<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}