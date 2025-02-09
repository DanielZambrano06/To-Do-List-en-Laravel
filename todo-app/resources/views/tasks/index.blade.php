@extends('layouts.app')  <!-- Hereda la plantilla base 'app' que contiene el layout principal de la aplicación -->

@section('content')  <!-- Define la sección de contenido dentro de la plantilla heredada -->

<div class="container">  <!-- Contenedor para mantener el diseño centrado y con márgenes apropiados -->
    <h2>Lista de Tareas</h2>  <!-- Título que indica que estamos en la lista de tareas -->
    
    <!-- Enlace para crear una nueva tarea, redirige a la ruta de crear tarea -->
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Nueva Tarea</a>

    <!-- Lista de tareas -->
    <ul class="list-group mt-3">  <!-- Clase 'mt-3' añade un margen superior -->
        @foreach ($tasks as $task)  <!-- Bucle para recorrer cada tarea en la variable $tasks -->
            <li class="list-group-item d-flex justify-content-between">  <!-- Elemento de lista que se alinea de manera flexible -->
                <!-- Muestra el título de la tarea, y si está completada, se agrega un ícono de marca de verificación (✅) -->
                <span>{{ $task->title }} @if($task->is_completed) ✅ @endif</span>
                
                <div>  <!-- Contenedor para los botones de acciones -->
                    @if(!$task->is_completed)  <!-- Verifica si la tarea no está completada -->
                        <!-- Enlace para editar la tarea, solo visible si no está completada -->
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Editar</a>
                        
                        <!-- Formulario para marcar la tarea como completada, que envía una solicitud POST -->
                        <form action="{{ route('tasks.complete', $task) }}" method="POST" class="d-inline">
                            @csrf  <!-- Token CSRF para proteger la aplicación contra ataques -->
                            <button type="submit" class="btn btn-success btn-sm">Completar</button>
                        </form>

                        <!-- Formulario para eliminar la tarea, que envía una solicitud DELETE -->
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                            @csrf  <!-- Token CSRF para proteger la aplicación contra ataques -->
                            @method('DELETE')  <!-- Indica que esta solicitud es de tipo DELETE -->
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection  <!-- Fin de la sección de contenido -->
