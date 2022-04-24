<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form wire:submit.prevent='vincular' method="POST">
        @csrf
        @forelse ($especialidades_not_inclusas as $value)
        <div class="row">
            <div class="col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$value->id}}" id="{{$value->nome}}" name="especialidades[]" wire:model.lazy='especialidade'>
                    <label class="form-check-label" for="{{$value->nome}}">
                      {{$value->nome}}
                    </label>
                  </div>
            </div>
        </div>
        @empty
            <div class="row">
                <div class="col-md-12">
                    <h5>N/A</h5>
                </div>
            </div>
        @endforelse

        <div class="row mt-4">
            <hr/>
            <div class="col-md-12 d-flex justify-content-end">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-right: 10px">Cancelar</button>
                <button type="submit" class="btn btn-primary">
                    Vincular
                    <div class="spinner-border text-warning spinner-border-sm" role="status" wire:loading wire:target='vincular'>
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>
            </div>
        </div>
    </form>
</div>
