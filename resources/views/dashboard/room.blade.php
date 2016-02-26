@extends('dashboard.adminbase')

@section('text')

<a href="{{ route('add_room') }}" class="btn btn-primary">
  <i class="fa fa-plus-square"></i>                                    Add new Room </a>                                                                                  
  @foreach($rooms as $room)
      <h1>{{$room->code}}</h1>

      <p>{{$room->description}}</p>
   @endforeach

@stop
