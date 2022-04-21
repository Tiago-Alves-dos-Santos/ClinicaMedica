<div class="cliente-form-create-update">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    @if ($id_cliente <= 0)
        <form wire:submit.prevent='cadastrar' method="POST">
    @else
        <form wire:submit.prevent='atualizar' method="POST">
    @endif
        <div class="row">
            <div class="col-md-12 perfil">
                @if (!is_string($perfil_foto) && !is_null($perfil_foto))
                    <img src="{{ $perfil_foto->temporaryUrl() }}" class="img-fluid">
                @elseif(is_string($perfil_foto))
                    <img src="{{asset($perfil_foto)}}" alt="" class="img-fluid">
                @else
                    <img src="{{asset('img/perfil_anonimo.png')}}" alt="" class="img-fluid">
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="">Perfil</label>
                <input type="file" name="" id="" class="form-control" wire:model.lazy='perfil_foto'>
            </div>
            <div class="col-md-6">
                <label for="">Data Nascimento</label>
                <input type="date" class="form-control @error('data_nascimento') is-invalid @enderror" name="" id="" wire:model.defer='data_nascimento'>
                @error('data_nascimento')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Nome</label>
                <input type="text" name="" id="" class="form-control @error('nome') is-invalid @enderror" wire:model.defer='nome'>
                @error('nome')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="">CPF</label>
                <input type="text" name="" id="" class="form-control mask-cpf @error('cpf') is-invalid @enderror" wire:model.defer='cpf' wire:change='validateCpf'>
                @error('cpf')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="">RG</label>
                <input type="text" name="" id="" class="form-control @error('rg') is-invalid @enderror" wire:model.defer='rg' >
                @error('rg')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{route('view.clientes')}}" class="btn btn-pink" style="margin-right: 10px">Voltar</a>
                <button type="submit" class="btn btn-blue">
                    @if ($id_cliente <= 0)
                        Cadastrar
                    @else
                        Salvar
                    @endif
                    <div class="spinner-border text-warning spinner-border-sm" role="status" wire:loading>
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>
            </div>
        </div>
    </form>
</div>
