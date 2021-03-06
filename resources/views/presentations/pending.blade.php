@extends('user.admin.basepage')

@section('admin_content')
<h1> Presentations </h1>
<div class="table-responsive">
  <table class="table">
    <tr class="row">
      <th class="col-lg-1 col-md-6 col-sm-2 text-center">Title</th>
      <th class="col-lg-1 col-md-6 col-sm-2 text-center">Student Name</th>
      <th class="col-lg-1 col-md-6 col-sm-2 text-center"></th>
      <th class="col-lg-1 col-md-6 col-sm-2 text-center"></th>

    </tr>
      @foreach($presentations as $p)
      <tr class="row">
        <td class="text-center">
          <a href="{!! route('presentation.edit', $p->id) !!}">
          {{$p->title}} </a>
        </td>
        <td class="text-center">
          {{$p->student_name}}
        </td>
        <td class="text-center">

          <form action="{{ route('presentation.approve', $p->id)}}" role='form' method="POST">
            {{ csrf_field() }}
          	{{ method_field('PATCH') }}
            <div class="form-group">
                  <button type="submit" class="btn btn-default">
                     <i class="fa fa-thumbs-up"></i>Approve
                  </button>
            </div>
          </form>
            <!-- <a href="{!! route('presentation.approve', $p->id) !!}" class="btn btn-default">
                                                Approve </a> -->
        </td>
        <td class="text-center">
          <form action="{{ route('presentation.decline', $p->id)}}" role='form' method="POST">
            {{ csrf_field() }}
          	{{ method_field('PATCH') }}
            <div class="form-group">
                  <button type="submit" class="btn btn-default">
                       <i class="fa fa-thumbs-down"></i>Decline
                  </button>
            </div>
          </form>
          <!-- <a href="{!! route('presentation.decline', $p->id) !!}" class="btn btn-default">
           Decline</a> -->
        </td>
      </tr>
      @endforeach
  </table>
</div>


@stop
