<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskCompleted;

class TaskController extends Controller
{
       // Display a listing of the tasks
       public function index()
       {
           $tasks = auth()->user()->tasks;
           $log = new Log();
           $log->user_id = auth()->id();
           $log->action = "listar";

           $log->save();
           return view('tasks.index', compact('tasks'));
       }
   
       public function create()
       {
           return view('tasks.create');
       }
   
       public function store(Request $request)
       {
           $request->validate([
               'title' => 'required|string|max:255',
               'description' => 'nullable|string',
               'image' => 'nullable|image|max:2048',
           ]);
   
           $task = new Task();
           $task->title = $request->title;
           $task->description = $request->description;
   
           if ($request->hasFile('image')) {
               $path = $request->file('image')->store('tasks', 'public');
               $task->image = $path;
           }
   
           $task->user_id = auth()->id();

           $log = new Log();
           $log->user_id = auth()->id();
           $log->action = "criar";

           $log->save();
           $task->save();
   
           return redirect()->route('tasks.index')->with('success', 'Task criada com successo.');
       }
   
       public function edit(Task $task)
       {
        $tasks = auth()->user()->tasks;
           return view('tasks.edit', compact('task'));
       }
   
       public function update(Request $request, Task $task)
       {
           $this->authorize('update', $task);
   
           $request->validate([
               'title' => 'required|string|max:255',
               'description' => 'nullable|string',
               'image' => 'nullable|image|max:2048',
           ]);
   
           $task->title = $request->title;
           $task->description = $request->description;
   
           if ($request->hasFile('image')) {
               $path = $request->file('image')->store('tasks', 'public');
               $task->image = $path;
           }

           $log = new Log();
           $log->user_id = auth()->id();
           $log->action = "editar";

           $log->save();
   
           $task->save();
   
           return redirect()->route('tasks.index')->with('success', 'Task atualizada com successo.');
       }
   
       public function destroy(Task $task)
       {
        //    $this->authorize('delete', $task);
        $tasks = auth()->user()->tasks;
        $log = new Log();
        $log->user_id = auth()->id();
        $log->action = "deletar";

        $log->save();
           $task->delete();
   
           return redirect()->route('tasks.index')->with('success', 'Task deletada com sucesso.');
       }
   
       public function markAsCompleted(Task $task)
       {
        $tasks = auth()->user()->tasks;
           $task->completed = true;
           $log = new Log();
           $log->user_id = auth()->id();
           $log->action = "completar";

           $log->save();
           $task->save();
   
           
           // Enviar e-mail de notificação (opcional)
           // ...
   
           return redirect()->route('tasks.index')->with('success', 'Task marcada com sucesso.');
       }
}
