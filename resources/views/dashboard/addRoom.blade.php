@extends('dashboard.adminbase')

@section('text')
<label for="code">Room Id</label>
   <input type="text" name="code">                                                                                                                                       

<label for="description">Room Building</label>
  <input type="text" name="description">                                                                                                                                       



 <a href="{{ route('store') }}" class="btn btn-default"> Add Room </a>                                                                                  

@stop
