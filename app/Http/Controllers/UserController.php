<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
 
class UserController extends Controller
{ 

       public function index()
       {
        if (Auth::check() && Auth::user()->role === 'admin') {
        $users = User::all();
        return view('users.index', compact('users'));
       }

       return redirect('/home')->with('error', 'Você não tem permissão para acessar esta página.');
       }
       
   
}
