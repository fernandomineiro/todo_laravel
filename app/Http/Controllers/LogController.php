<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log; // Modelo para a tabela logs
use App\Models\User; // Modelo para a tabela users

class LogController extends Controller
{
    public function index()
    {
        // Buscar todos os logs
        $logs = Log::with('user')->get(); // Usa a relação definida no modelo
 
        return view('logs.index', compact('logs'));
        // return response()->json($logs);
    }
}