@extends('layouts.default')
@section('content')
<form method="POST" action="/project">
    <input type="text" name="name">
    <input type="submit">
</form>
@stop