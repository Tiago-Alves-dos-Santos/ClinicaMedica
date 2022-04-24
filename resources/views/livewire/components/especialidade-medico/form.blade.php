<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form wire:submit.prevent='vincular' method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <input type="search" class="form-control" id="search-especialidades" wire:model.lazy='search'>
            </div>
        </div>
        <div style="max-height: 1000px; overflow-y: auto; overflow-x: hidden">
            @forelse ($especialidades_not_inclusas as $value)
            <div class="row">
                <div class="col-md-12">
                    <div class="form-check" class="filter-especialidades">
                        <input class="form-check-input" type="checkbox" value="{{$value->id}}" id="{{$value->nome}}" name="especialidades[]" wire:model.lazy='especialidade'>
                        <label class="form-check-label" for="{{$value->nome}}" data-nome="{{$value->nome}}">
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
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                {{$especialidades_not_inclusas->links()}}
            </div>
        </div>
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
