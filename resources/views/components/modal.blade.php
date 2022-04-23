<div class="modal fade" id="{{$id}}" tabindex="-1" aria-labelledby="titulo-{{$id}}" aria-hidden="true" {{ $attributes }}>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titulo-{{$id}}">{{$titulo}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{$slot}}
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
