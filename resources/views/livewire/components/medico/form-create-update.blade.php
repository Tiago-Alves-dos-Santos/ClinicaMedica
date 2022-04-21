<div class="medico-form-create-update">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @if ($id_medico <= 0)
    <form wire:submit.prevent='cadastrar' method="POST" class="needs-validation">
    @else
    <form wire:submit.prevent='atualizar' method="POST" class="needs-validation">
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
            <div class="col-md-3">
                <label for="">Perfil</label>
                <input type="file" class="form-control" wire:model.lazy='perfil_foto'>
            </div>
            <div class="col-md-3">
                <label for="">Nome</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" wire:model.lazy='nome'>
                @error('nome')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="">CPF</label>
                <input type="text" class="form-control mask-cpf @error('cpf') is-invalid @enderror" wire:model='cpf' wire:change='validateCpf'>
                @error('cpf')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="">RG</label>
                <input type="text" class="form-control @error('rg') is-invalid @enderror" wire:model='rg'>
                @error('rg')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">CRM</label>
                <input type="text" class="form-control @error('crm') is-invalid @enderror" wire:model='crm'>
                @error('crm')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="">Senha</label>
                <input type="text" class="form-control @error('senha') is-invalid @enderror senha" wire:model.lazy='senha'>
                @error('senha')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            @if ($id_medico <= 0)
            <div class="col-md-4">
                <label for="">Situação</label>
                <input type="text" name="" id="" value="Empregado" readonly="" class="form-control @error('status_trabalho') is-invalid @enderror" wire:model.lazy='status_trabalho'>
                @error('status_trabalho')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            @else
            <div class="col-md-4">
                <label for="">Situação</label>
                <select name="" id="" class="form-select @error('status_trabalho') is-invalid @enderror"
                wire:model.lazy='status_trabalho'>
                    @foreach ($status_opcoes as $value)
                    <option value="{{$value}}">{{$value}}</option>
                    @endforeach
                </select>
                @error('status_trabalho')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Admição</label>
                <input type="date" class="form-control @error('data_admicao') is-invalid @enderror" wire:model.lazy='data_admicao'>
                @error('data_admicao')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="">Pagamento</label>
                <input type="date" class="form-control @error('data_pagamento') is-invalid @enderror" wire:model.lazy='data_pagamento'>
                @error('data_pagamento')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="">Nascimento</label>
                <input type="date" class="form-control @error('data_nascimento') is-invalid @enderror" wire:model.lazy='data_nascimento'>
                @error('data_nascimento')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{route('view.medicos')}}" class="btn btn-pink" style="margin-right: 10px">Voltar</a>
                <button type="submit" class="btn btn-blue">
                    @if ($id_medico <= 0)
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
