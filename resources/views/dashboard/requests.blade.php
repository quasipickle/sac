@extends('user.admin.basepage')

@section('admin_content')
<div class="contents">
<div class=row>
  <div class='col-md-8'>
    <h1> Requests </h1>
  </div>
</div>

  <div class="table-responsive">
    <table class="table">
      <tr class="row">
        <th class="col-lg-1 col-md-6 col-sm-2 text-center">Name</th>
        <th class="col-lg-1 col-md-6 col-sm-2 text-center">Email address</th>
      </tr>
        @foreach($users as $u)
        <tr class="row">
          <td class="text-center">
            {{$u->name}}
          </td>
          <td class="text-center">
            {{$u->email}}
          </td>
          <td class="text-center">
            <a href="{{ route('approve_request', $u->id) }}" 
              class="btn btn-default"> Approve </a>
          </td>
          <td class="text-center">
            <a href="{{ route('decline_request', $u->id) }}" 
              class="btn btn-default"> Decline </a>
        </tr>
        @endforeach
    </table>
  </div>
</div>

@stop
