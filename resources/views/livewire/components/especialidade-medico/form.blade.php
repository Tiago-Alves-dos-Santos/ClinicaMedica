<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form wire:submit.prevent='' method="POST">
        @csrf
        @forelse ($especialidades_not_inclusas as $value)
        <div class="row">
            <div class="col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$value->id}}" id="{{$value->nome}}" wire:model.defer='especialidade'>
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
                <button type="button" class="btn btn-primary">Vincular</button>
            </div>
        </div>
    </form>
</div>
