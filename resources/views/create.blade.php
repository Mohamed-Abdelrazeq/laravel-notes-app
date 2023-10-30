@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" />
        </div>

        <div>
            <label for="description" id="description">
                Description
            </label>
            <textarea name="description" id="description"></textarea>
        </div>

        <div>
            <label for="long_description" id="long_description" rows="5">
                Description
            </label>
            <textarea name="long_description" id="long_description" rows="15"></textarea>
        </div>

        <button type="submit">Add Task</button>
    </form>


@endsection
