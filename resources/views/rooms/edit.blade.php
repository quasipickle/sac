@extends('user.admin.basepage')

@section('header')
    Edit Room
@stop

@section('admin_content')
    <form class="form-horizontal" role="form"
        method="POST" action="{{ route('room.update', $room->id) }}">
        @include('rooms._form')
    </form>
@stop
