<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="row">
        <div class="col-md-12">
            <form wire:submit.prevent='agendar' method="post">
                @csrf
                <x-fieldset titulo='Dados medico'>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Médico</label>
                            <select name="" id="" class="form-select" wire:model.defer='medico_id'>
                                <option value="">Selecione</option>
                                @forelse ($medicos as $value)
                                <option value="{{$value->id}}" @if((int)$medico_id === $value->id) selected @endif>{{$value->nome}}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                Data
                            </label>
                            <input type="datetime-local" class="form-control" wire:model.defer='data_consulta'>
                        </div>
                        <div class="col-md-3 align-self-end">
                            <button type="button" class="btn btn-purples w-100">
                                Disponibilidade
                            </button>
                        </div>
                        <div class="col-md-3 align-self-end d-flex justify-content-center align-items-end align-content-end bg-success text-white">
                            <h4 style="position: relative;top: 3px">Resultado</h4>
                        </div>
                    </div>
                </x-fieldset>
                <x-fieldset titulo="Cliente" style="margin-top: 50px">
                    <div class="row">
                        <div class="col-md-6 col-xxl-4">
                            <label for="">Paciente</label>
                            <select name="" id="" class="form-select" wire:model.defer='cliente_id'>
                                <option value="">Selecione</option>
                                @forelse ($clientes as $value)
                                <option value="{{$value->id}}">{{$value->nome}}</option>
                                @empty

                                @endforelse
                            </select>
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
