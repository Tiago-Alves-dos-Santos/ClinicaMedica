<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table-default table-striped">
                    <thead>
                        <th>Médico</th>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th style="width: 20%">Tempo da consulta</th>
                        <th>Status</th>
                        <th>Consulta</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        @forelse ($consultas as $value)
                        <tr>
                            <td>{{$value->medico_nome}}</td>
                            <td>{{$value->cliente_nome}}</td>
                            <td>{{date('d/m/Y H:i', strtotime($value->data_consulta))}}</td>
                            <td>00:00</td>
                            <td>
                                @switch($value->status)
                                    @case('iniciada')
                                        <span class="badge rounded-pill bg-warning" style="cursor: pointer">INICIADA</span>
                                        @break
                                    @case('aguardando')
                                        <span class="badge rounded-pill bg-info" style="cursor: pointer">AGUARDANDO</span>
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
                            <td>
                                <a href="" class="btn btn-success">
                                    INICIAR
                                </a>
                            </td>
                            <td style="">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle hide-icon" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('img/more_options.png')}}" class="img-fluid" alt="Opções" style="width: 17px; height: 20px;">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa-solid fa-clipboard-user"></i>
                                                Ver consulta
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                Ver agendamento
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
</div>
