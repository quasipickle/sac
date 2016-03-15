<form action="{{ route('room.destroy', $code) }}" method="POST">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button type="submit" class="btn btn-link"
     aria-label="Delete Room" title="Delete Room">
     <i class="fa fa-trash-o"></i>
  </button>
</form>