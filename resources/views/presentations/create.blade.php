@extends('basePages.sac')

@section('title')
    Add Presentation
@stop

@section('content')
<div classs="fluid-container">
    <div class="row text-center">
        <h2>
            Create Presentation
        </h2>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" role="form" method="POST" 
            action="{{ route('presentation.store') }}">
                @include('presentations._form')
            </form>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    function addStudent(){
        var student = $(".new-student").last().clone();
        student.removeClass("hidden");
        student.find("input").prop('disabled', false);
        student.appendTo("#new-students");
    }
    $(document).ready(function(){

        $("#group-checkbox").click(function(){
            var checkbox = $("#group-checkbox");
            if($("#group-checkbox").is(":checked")){
                addStudent();
            }else{
                $("#new-students").empty();
            }
        });

    });
</script>
@stop