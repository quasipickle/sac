@extends('user.admin.basepage')

@section('admin_content')
<h1> Courses </h1>
  <table class="table">
    <tr class="row">
      <th class="col-lg-1 col-md-6 col-sm-2 text-center">Course code</th>
      <th class="col-lg-1 col-md-6 col-sm-2 text-center">Name</th>
    </tr>
      @foreach($courses as $c)
      <tr class="row">
        <td class="text-center">
          <a href="{!! route('room.index') !!}">
          {{$c->subject_code . $c->number}} </a>
        </td>
        <td class="text-center">
          {{$c->title}}
        </a>
        </td>
      </tr>
      @endforeach
  </table>
@stop
