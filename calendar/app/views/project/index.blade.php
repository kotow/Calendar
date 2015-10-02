@extends('layouts.default')
@section('content')
    <h1>{{{$username}}}</h1>

    @foreach($projects as $project)
       <a href="/project/{{$project->id}}"> {{$project->name}} </a><br>

        @endforeach

    <a href="/project/create" >Create Project</a>
@stop