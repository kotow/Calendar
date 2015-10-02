@extends('layouts.default')
@section('content')
{{$project->name}} <b>{{$project->spend}}/{{$project->est}}</b>
<hr>
    @foreach($tasks as $task)
        <a href=/tasks/{{$task->id}}" > {{$task->name}} </a>   {{$task->timeSpend}}/{{$task->time_estimated}}
        <br>
    @endforeach
<hr>
<a href="/project/{{$project->id}}/edit" >Edit Project</a>
<a href="/project" >Delete Project</a><hr>
<a href="/task/create/{{$project->id}}" >Add task</a>
<a href="/project" >All Projects</a>


@stop