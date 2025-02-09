<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            // Crea una nueva tabla llamada 'tasks'
            $table->id();
            // Crea una columna 'id' autoincrementable que sirve como clave primaria
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Crea una columna 'user_id' que es una clave foránea, referenciando la columna 'id' de la tabla 'users'.
            // La opción 'onDelete('cascade')' indica que si un usuario se elimina, las tareas asociadas también se eliminarán.
            $table->string('title');
            // Crea una columna 'title' para almacenar el título de la tarea (cadena de texto)
            $table->text('description')->nullable();
            // Crea una columna 'description' para almacenar la descripción de la tarea. Puede ser nula.
            $table->boolean('is_completed')->default(false);
            // Crea una columna 'is_completed' para indicar si la tarea está completada. Por defecto es 'false'.
            $table->timestamps();
            // Crea las columnas 'created_at' y 'updated_at' para el seguimiento de fechas.
        });
    }
    


   
    public function down(): void
{
    Schema::dropIfExists('tasks');
    // Elimina la tabla 'tasks' si existe en la base de datos.
}

};
