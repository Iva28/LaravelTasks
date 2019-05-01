@extends('shared.layout')

@section('styles')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">

@endsection

@section('content')
@if(count($tasks) > 0)
<table>
    <caption>Tasks</caption>
    <tr>
      <th>Title</th>
      <th>Date</th>
      <th>Download</th>
      <th>Delete</th>
    </tr>
    @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ date_format ($task->created_at,"Y/m/d H:i") }}</td>
            <td>
                <a href="{{ route('tasks.download', $task->id) }}">
                    <span class="glyphicon glyphicon-download-alt"></span>
                </a>
            </td>
            <td>
                <a href="{{ route('tasks.delete', $task->id) }}">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </td>
       </tr>
    @endforeach
</table>
@endif




<a href="/tasks/add" class="btn">
    <span class="glyphicon glyphicon-plus add"></span>Add
</a>


@endsection


