@extends('layouts.app')

@section('title')
    Tasks
@endsection

@section('content')
    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.create') }}">
            Add Task!
        </a>
    </nav>

    @isset($tasks)
        @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <a href="{{ route('tasks.show', [$task->id]) }}" @class(['line-through' => $task->completed])>
                    {{ $task->title }}
                </a>
                <br>
            @endforeach
        @else
            <h1>There are no tasks</h1>
        @endif

        @if ($tasks->count())
            <nav class="mt-4">
                {{ $tasks->links() }}
            </nav>
        @endif
    @endisset
@endsection
