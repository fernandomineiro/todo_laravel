<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
  
class UserController extends Controller
{ 

       public function index()
       {
        if (Auth::check() && Auth::user()->role_id === 1) {


              $users = DB::table('users')
              ->join('roles', 'users.role_id', '=', 'roles.id')
              ->select('users.name', 'users.email', 'roles.type as role')
              ->get();
  
          return view('users.index', ['users' => $users]);
       }

       return redirect('/home')->with('error', 'Você não tem permissão para acessar esta página.');
       }
       
   
}
