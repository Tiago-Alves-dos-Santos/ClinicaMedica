<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="row">
        <div class="col-md-12">
            <form wire:submit.prevent='agendar' method="post">
                @csrf
                <x-fieldset titulo='Dados médico'>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Médico</label>
                            <select name="" id="" class="form-select @error('medico_id') is-invalid @enderror" wire:model.defer='medico_id'>
                                <option value="">Selecione</option>
                                @forelse ($medicos as $value)
                                <option value="{{$value->id}}" @if((int)$medico_id === $value->id) selected @endif>{{$value->nome}}</option>
                                @empty

                                @endforelse
                            </select>
                            @error('medico_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                Data - Tempo consulta: <span class="text-danger">{{$tempo_consulta}}</span> minutos
                            </label>
                            <input type="datetime-local" class="form-control @error('data_consulta') is-invalid @enderror" wire:model.defer='data_consulta' step="{{$datetime_step}}">
                            @error('data_consulta')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-3 ">
                            <label for=""></label>
                            <button type="button" class="btn btn-purples w-100">
                                Disponibilidade
                            </button>
                        </div>
                        <div class="col-md-3 ">
                            <label for=""></label>
                            <h4 style="position: relative;top: 0px; text-align: center; padding:4px 0;" class="bg-success text-white">Resultado</h4>
                        </div>
                    </div>
                </x-fieldset>
                <x-fieldset titulo="Cliente" style="margin-top: 50px">
                    <div class="row">
                        <div class="col-md-6 col-xxl-4">
                            <label for="">Paciente</label>
                            <select name="" id="" class="form-select @error('cliente_id') is-invalid @enderror" wire:model.defer='cliente_id'>
                                <option value="">Selecione</option>
                                @forelse ($clientes as $value)
                                <option value="{{$value->id}}">{{$value->nome}}</option>
                                @empty

                                @endforelse
                            </select>
                            @error('cliente_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-xxl-4">
                            <label for="">Status Consulta</label>
                            <input type="text" class="form-control" value="AGENDADA" readonly>
                        </div>
                    </div>
                </x-fieldset>
                <div class="row mt-5">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-lg btn-blue">
                            Salvar
                            <div class="spinner-border text-warning spinner-border-sm" role="status" wire:loading>
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
