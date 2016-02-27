@extends('dashboard.adminbase')

@section('text')
<h1> Courses </h1>
<div class="table-responsive">
  <table class="table">
    <tr class="row">
      <th class="col-lg-1 col-md-6 col-sm-2 text-center">Course code</th>
      <th class="col-lg-1 col-md-6 col-sm-2 text-center">Name</th>
    </tr>
      @foreach($courses as $c)
      <tr class="row">
        <td class="text-center">
          <a href="{!! route('show_rooms') !!}">
          {{$c->code}}
        </td>
        <td class="text-center">
          {{$c->description}}
        </a>
        </td>
      </tr>
      @endforeach
  </table>
@stop
