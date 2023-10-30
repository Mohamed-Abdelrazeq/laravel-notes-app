@extends('layouts.app')

@section('title', 'Edit Task')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">
                {{ $task->title }}
            </label>
            <input type="text" name="title" id="title"
                value="{{ old('title') }}/>
            @error('title')
<p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" id="description">
            {{ $task->description }}
        </label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="long_description" id="long_description" rows="5">
            {{ $task->long_description }}
        </label>
        <textarea name="long_description" id="long_description" rows="15">{{ old('long_description') }}</textarea>
    </div>
    @error('long_description')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <button type="submit">Edit Task</button>
</form>


@endsection
