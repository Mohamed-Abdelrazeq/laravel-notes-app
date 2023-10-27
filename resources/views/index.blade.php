@extends('layouts.app')

@section('title')
    Tasks
@endsection

@section('content')
    @isset($tasks)
        @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <a href="{{ route('tasks.show', [$task->id]) }}">
                    {{ $task->title }}
                </a>
                <br>
            @endforeach
        @else
            <h1>There are no tasks</h1>
        @endif
    @endisset
@endsection
