@extends('user.admin.basepage')

@section('header')
    Add Room
@stop

@section('admin_content')
    <form class="form-horizontal" role="form"
        method="POST" action="{{ route('room.store') }}">
        @include('rooms._form')
    </form>
@stop
