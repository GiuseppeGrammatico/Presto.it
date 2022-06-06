<form action="{{route('locale', $lang)}}" method="POST" class="n">
    @csrf
    <button type="submit" class=" button-flag-custom">
      <span class="flag-icon flag-icon-{{$nation}} me-2 ms-1"></span>

    </button>
</form>