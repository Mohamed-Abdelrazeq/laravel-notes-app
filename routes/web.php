<?php

use App\Models\Task;
use Illuminate\Http\Request ;
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
    $data = $request->validate([
        "title" => "required | min:3 | max:255",
        "description" => "required | min:3 ",
        "long_description" => "required | min:3 ",
    ]);

    $task = new Task();

    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()
            ->route("tasks.show", ['id' => $task->id])
            ->with('success', 'Task created successfully.');
})->name("tasks.store");

Route::fallback(function () {
    return "404";
});