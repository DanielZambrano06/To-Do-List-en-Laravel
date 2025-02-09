<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las tareas asociadas al usuario autenticado
        $tasks = Task::where('user_id', auth()->id())->get();
        
        // Retornar la vista 'tasks.index' con las tareas obtenidas
        return view('tasks.index', compact('tasks'));
    }
    
    public function store(Request $request)
    {
        // Validar que el campo 'title' sea obligatorio, una cadena y no exceda los 255 caracteres
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
    
        // Crear una nueva tarea asociada al usuario autenticado
        Task::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);
    
        // Redirigir al usuario a la lista de tareas con un mensaje de éxito
        return redirect()->route('tasks.index')->with('success', 'Tarea creada exitosamente.');
    }
    
    public function update(Request $request, Task $task)
    {
        // Verificar si la tarea está completada, en ese caso no permitir editarla
        if ($task->is_completed) {
            return redirect()->route('tasks.index')->with('error', 'No puedes editar una tarea completada.');
        }
    
        // Validar que el campo 'title' sea obligatorio, una cadena y no exceda los 255 caracteres
        $request->validate(['title' => 'required|string|max:255']);
    
        // Actualizar la tarea con los nuevos valores para 'title' y 'description'
        $task->update($request->only(['title', 'description']));
    
        // Redirigir al usuario a la lista de tareas con un mensaje de éxito
        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada.');
    }
    
    public function destroy(Task $task)
    {
        // Verificar si la tarea está completada, en ese caso no permitir eliminarla
        if ($task->is_completed) {
            return redirect()->route('tasks.index')->with('error', 'No puedes eliminar una tarea completada.');
        }
    
        // Eliminar la tarea de la base de datos
        $task->delete();
    
        // Redirigir al usuario a la lista de tareas con un mensaje de éxito
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada.');
    }
    
    public function complete(Task $task)
    {
        // Marcar la tarea como completada
        $task->update(['is_completed' => true]);
    
        // Redirigir al usuario a la lista de tareas con un mensaje de éxito
        return redirect()->route('tasks.index')->with('success', 'Tarea completada.');
    }
}    