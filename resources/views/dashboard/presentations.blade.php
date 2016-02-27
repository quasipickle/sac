@extends('dashboard.adminbase')

@section('text')
<div class="table-responsive">
  <table class="table">
    <tr class="row">
      <th class="col-lg-1 col-md-6 col-sm-2 text-center">Title</th>
      <th class="col-lg-1 col-md-6 col-sm-2 text-center">Student Name</th>
      <th class="col-lg-1 col-md-6 col-sm-2 text-center">OUR Nominee</th>
    </tr>
      @foreach($presentations as $p)
      <tr class="row">
        <td class="text-center">
          {{$p->title}}
        </td>
        <td class="text-center">
          {{$p->student_name}}
        </td>
        <td class="text-center">
          @if($p->our_nominee==0)
            NO
          @else
            YES
          @endif
        </td>
      </tr>
      @endforeach
  </table>
</div>


@stop
