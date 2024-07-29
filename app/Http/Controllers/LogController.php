<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Log; // Modelo para a tabela logs
use App\Models\User; // Modelo para a tabela users

class LogController extends Controller
{
    public function index()
    {

        if (Auth::check() && Auth::user()->role_id === 1) {
        $logs = Log::with('user')->get(); 
 
        return view('logs.index', compact('logs'));
    }

    return redirect('/home')->with('error', 'Você não tem permissão para acessar esta página.');
        // return response()->json($logs);
    }
}