<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustoemrController extends Controller
{
    public function index(){
        $users = User::all();
        return view('pages.Admin.Customers.index', compact('users'));
    }
}
