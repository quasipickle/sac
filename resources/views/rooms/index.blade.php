@extends('user.admin.basepage')

@section('header')
    Rooms
@stop

@section('add_object')
    <a href="{{ route('room.create') }}" class="btn btn-primary">
    <i class="fa fa-plus-square"></i> Add new Room </a>
@stop

@section('admin_content')
<table class="table">
    <tr class="row">
        <th class="col-lg-2 col-md-2 col-sm-2 text-center">Code</th>
        <th class="col-lg-10 col-md-10 col-sm-10">Building</th>
    </tr>
        @foreach($rooms as $room)
        <tr class="row">
            <td class="text-center">
                {{$room->code}}
            </td>
            <td class="text-center">
                {{$room->description}}
            </td>
            <td class="text-center">
                @include('dashboard._change_avaliability', ['id' => $room['id']])
            </td>
            <td class="text-center">
                @if($room['available'])
                    <i class="fa fa-check-circle-o"></i>
                @else
                    <i class="fa fa-circle-o"></i>
                @endif
            </td>
            <td class="text-center">
                @include('room._delete', ['id' => $room['id']])
            </td>
        </tr>
        @endforeach
</table>
@stop
