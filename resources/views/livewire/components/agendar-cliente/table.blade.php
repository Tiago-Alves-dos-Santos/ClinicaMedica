<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-dark" data-bs-toggle="collapse" href="#formBusca" role="button" aria-expanded="false" aria-controls="collapseExample">
                Busca Avançada
            </a>
            <a class="btn btn-primary" href="{{route('view.agendamento.agendar')}}">
                <i class="fa-solid fa-plus"></i>
                Novo Agendamento
            </a>
        </div>
    </div>
    {{-- Formulario de busca avançada --}}
    <div class="row collapse mt-4" id="formBusca">
        <div class="col-md-12">
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Teste campo</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Teste campo</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Fim Formulario de busca avançada --}}

    {{-- TABELA DE AGENDAMENTOS --}}
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table-default table-striped">
                    <thead>
                        <th>Cliente</th>
                        <th>Médico</th>
                        <th>Data Consulta</th>
                        <th>Agendado dia</th>
                        <th>Agendado por</th>
                        <th>Status agendamento</th>
                        <th>Opções</th>
                    </thead>
                    <tbody>
                        @forelse ($agendamentos as $value)
                        <tr>
                            <td>{{$value->cliente_nome}}</td>
                            <td>{{$value->medico_nome}}</td>
                            <td>{{date('d/m/Y H:i', strtotime($value->data_consulta))}}</td>
                            <td>{{date('d/m/Y', strtotime($value->updated_at))}}</td>
                            <td>-</td>
                            <td>
                                @switch($value->status_agendamento)
                                    @case('agendada')
                                        <span class="badge rounded-pill bg-info" style="cursor: pointer" wire:click='openModalEditStatus({{$value->agedamento_id}})'>AGENDADA</span>
                                        @break
                                    @case('a_confirmar')
                                        <span class="badge rounded-pill bg-warning" style="cursor: pointer" wire:click='openModalEditStatus({{$value->agedamento_id}})'>A CONFIRMAR</span>
                                        @break
                                    @case('cancelada')
                                        <span class="badge rounded-pill bg-danger">CANCELADA</span>
                                        @break
                                    @case('confirmada')
                                        <span class="badge rounded-pill bg-success" style="cursor: pointer" wire:click='openModalEditStatus({{$value->agedamento_id}})'>CONFIRMADA</span>
                                        @break
                                    @case('realizada')
                                        <span class="badge rounded-pill bg-success">REALIZADA</span>
                                        @break
                                    @case('nao-realizada')
                                        <span class="badge rounded-pill bg-danger">NÃO REALIZADA</span>
                                        @break

                                    @default
                                        <span class="badge rounded-pill bg-success">Teste</span>
                                @endswitch
                            </td>
                            <td style="">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle hide-icon" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('img/more_options.png')}}" class="img-fluid" alt="Opções" style="width: 17px; height: 20px;">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item" href="">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                               Reajustar agedamento
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- FIM TABELA DE AGENDAMENTOS --}}
    <x-modal id="md-atualizar-status-agendamento" titulo="Atualizar status">
        <form wire:submit.prevent='showQuestionYesNo' method="POST">
            <div class="row">
                <div class="col-md-12">
                    <select name="" id="" class="form-select" wire:model.defer='status_agendamento'>
                        @php
                            $status = App\Http\Classes\Configuracao::getOpcoesStatusAgendamento();
                        @endphp
                        @foreach ($status as $key => $value)
                            @if ($status_agendamento == 'a_confirmar' && $key != 'agendada')
                                <option value="{{$key}}" @if($status_agendamento == $key) selected @endif>{{$value}}</option>
                            @elseif($status_agendamento == 'confirmada' && ($key != 'agendada' && $key != 'a_confirmar'))
                                <option value="{{$key}}" @if($status_agendamento == $key) selected @endif>{{$value}}</option>
                            @elseif($status_agendamento == 'agendada')
                                <option value="{{$key}}" @if($status_agendamento == $key) selected @endif>{{$value}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 d-flex justify-content-end mt-3 mb-3">
                    <button type="submit" class="btn btn-blue">
                        Salvar
                        <div class="spinner-border text-warning spinner-border-sm" role="status" wire:loading>
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>
            </div>

        </form>
    </x-modal>
    @push('scripts')
        <script>
            $(function(){
                // showQuestionYesNo('Atenção!!!','teste', ())
                var myModal = new bootstrap.Modal(document.getElementById('md-atualizar-status-agendamento'), {
                    //keyboard: false
                })
                Livewire.on('components.agendar-cliente.table_openModal', () => {
                    myModal.show();
                });
                Livewire.on('components.agendar-cliente.table_closeModal', () => {
                    myModal.hide();
                });

                Livewire.on('components.agendar-cliente.table_showQuestionYesNo', (question_data) => {
                    function editStatus(){
                        Livewire.emit('editStatus');
                    }
                    showQuestionYesNo('Atenção!!!',question_data, editStatus)
                });
            });
        </script>
    @endpush
</div>
