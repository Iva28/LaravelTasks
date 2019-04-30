@extends('shared.layout')

@section('content')

<div class="container">
    @if(count($tasks) > 0)
        <ul>
            @foreach ($tasks as $task)
                <li>{{ $task->title }} <a href="{{ route('tasks.download', $task->id) }}">download</a></li>
            @endforeach
        </ul>
    {{-- @else <p>No data</p> --}}
    @endif

    <a href="/tasks/add">Add</a>
</div>

@endsection


