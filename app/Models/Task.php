<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Defina os atributos que podem ser preenchidos em massa.
    protected $fillable = [
        'title',
        'description',
        'image',
        'completed',
        'user_id',
    ];

    /**
     * Retorna o usuário dono da tarefa.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}