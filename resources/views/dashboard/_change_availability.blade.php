<form action="{{ route('changeAvailability', $id) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('PUT') }}

  @if($room['available'])
    <button type="submit" class="btn btn-success"
    aria-label="Change Availability" title="Change Availability">Available</button>
  @else
    <button type="submit" class="btn btn-default"
    aria-label="Change Availability" title="Change Availability">Not Available</button>
  @endif


</form>
