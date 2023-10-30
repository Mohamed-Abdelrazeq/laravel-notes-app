<?php

use App\Models\Task;
use Illuminate\Http\Client\Request;
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

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);

    return view('show',[
        "task" => $task,
    ]);
})->name("tasks.show");

Route::post('/tasks', function (Request $request) {
    $task = new Task();
    $task->title = request('title');
    $task->description = request('description');
    $task->save();

    return redirect()->route("tasks.index");
})->name("tasks.store");

Route::fallback(function () {
    return "404";
});