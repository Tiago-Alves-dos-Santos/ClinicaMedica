<div class="recepcionista-form-create">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @if ($id_recepcionista <= 0)
    <form wire:submit.prevent='cadastrar' method="POST" class="needs-validation">
    @else
    <form wire:submit.prevent='atualizar' method="POST" class="needs-validation">
    @endif
        {{-- Foto perfil --}}
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
        {{-- Fim Foto perfil --}}
        {{-- Login  e senha  --}}
        <div class="row">
            <div class="col-md-4">
                <label for="">Foto</label>
                <input type="file" name="" id="" class="form-control" accept="image/png, image/jpeg, image/jpg" wire:model.lazy='perfil_foto'>
            </div>
            <div class="col-md-4">
                <label for="">Login</label>
                <input type="text" wire:model.lazy='login' class="form-control @error('login') is-invalid @enderror" >
                @error('login')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="">Senha</label>
                <input type="text" wire:model.lazy='senha' class="form-control @error('senha') is-invalid @enderror senha">
                @error('senha')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        {{-- Fim login e senha --}}
        {{-- Nome CPF e Rg --}}
        <div class="row">
            <div class="col-md-4">
                <label for="">Nome</label>
                <input type="text" wire:model.lazy='nome' name="" id="" class="form-control @error('nome') is-invalid @enderror">
                @error('nome')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror

            </div>
            <div class="col-md-4">
                <label for="">CPF</label>
                <input type="text" name="" id="" class="form-control mask-cpf @error('cpf') is-invalid @enderror" wire:model.lazy='cpf' wire:change='validateCpf'>
                @error('cpf')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="">RG</label>
                <input type="text" name="" id="" class="form-control @error('rg') is-invalid @enderror" wire:model.lazy='rg'>
                @error('rg')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        {{-- Fim nome cpf rg --}}
        {{-- salario fixo e status trbalho --}}
        <div class="row">
            <div class="col-md-6">
                <label for="">Salário</label>
                <input type="text" name="" id="" class="form-control @error('salario_fixo') is-invalid @enderror mask-money" wire:model.lazy='salario_fixo'">
                @error('salario_fixo')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            @if($id_recepcionista <= 0)
            <div class="col-md-6">
                <label for="">Situação</label>
                <input type="text" name="" id="" value="Admição" readonly="" class="form-control @error('status_trabalho') is-invalid @enderror"
                wire:model.lazy='status_trabalho'>
                @error('status_trabalho')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            @else
            <div class="col-md-6">
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
        {{-- Fim salario fixo e status trbalho --}}
        {{-- data Admissão, data pagamento, data nascimento --}}
        <div class="row">
            <div class="col-md-4">
                <label for="">Admissão</label>
                <input type="date" class="form-control  @error('data_admicao') is-invalid @enderror" wire:model.lazy='data_admicao'>
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
        {{-- Fim data Admissão, data pagamento, data nascimento --}}

        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{route('view.recepcionista')}}" class="btn btn-pink" style="margin-right: 10px">Voltar</a>
                <button type="submit" class="btn btn-blue">
                    @if ($id_recepcionista <= 0)
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
    <script>

    </script>
</div>
