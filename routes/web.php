<?php

use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("tasks.index");
});

Route::get('/tasks', function () {
    $tasks = Task::latest()
                    ->where('compeleted',true)
                    ->get();
    return view('index',[
    "tasks" => $tasks,
    ]
);
})->name("tasks.index");

Route::get('tasks/{id}', function ( $id) {
    $task = Task::findOrFail($id);

    return view('show',[
        "task" => $task,
    ]);
})->name("tasks.show");


Route::fallback(function () {
    return "404";
});