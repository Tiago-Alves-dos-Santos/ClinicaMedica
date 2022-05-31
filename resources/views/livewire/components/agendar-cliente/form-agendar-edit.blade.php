<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <div class="col-md-12">
            <form wire:submit.prevent='reAgendar' method="post">
                @csrf
                <x-fieldset titulo='Dados médico' style="margin-top: 30px">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Médico</label>
                            <select name="" id="" class="form-select @error('medico_id') is-invalid @enderror" wire:model.defer='medico_id'>
                                <option value="">Selecione</option>
                                @forelse ($medicos as $value)
                                <option value="{{$value->id}}" >{{$value->nome}}</option>
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
                            <input type="datetime-local" min="{{date('Y-m-d\TH:i', ceil(time() / $datetime_step) * $datetime_step)}}" step="{{$datetime_step}}" class="form-control @error('data_consulta') is-invalid @enderror" wire:model.defer='data_consulta'  >
                            @error('data_consulta')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-3 ">
                            <label for=""></label>
                            <button type="button" class="btn btn-purples w-100" wire:click='disponibilidade'>
                                Disponibilidade

                                <div class="spinner-border text-warning spinner-border-sm" role="status" wire:loading wire:target='disponibilidade'>
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-3 ">
                            <label for=""></label>
                            @if (!empty($medico_disponivel) && $medico_disponivel)
                                <h4 style="position: relative;top: 0px; text-align: center; padding:4px 0;" class="bg-success text-white">DISPONÍVEL</h4>
                            @elseif(!is_null($medico_disponivel) && !$medico_disponivel)
                                <h4 style="position: relative;top: 0px; text-align: center; padding:4px 0;" class="bg-danger text-white">INDISPONÍVEL</h4>
                            @endif
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
                                <option value="{{$value->id}}" @if($agendamento->cliente_id == $value->id) selected @endif>{{$value->nome}}</option>
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
                            <label for="">Status Agendamento</label>
                            <input type="text" class="form-control" readonly wire:model.defer='status_agendamento'>
                        </div>
                    </div>
                </x-fieldset>
                <div class="row mt-5">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-lg btn-blue">
                            Salvar
                            <div class="spinner-border text-warning spinner-border-sm" role="status" wire:loading wire:target='reAgendar'>
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
