<div>
    {{-- The Master doesn't talk, he acts. --}}
    <a class="btn btn-primary" data-bs-toggle="collapse" href="#formBusca" role="button" aria-expanded="false" aria-controls="collapseExample">
        Busca Avançada
    </a>
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
                        {{-- @forelse ($clientes as $value) --}}
                        <tr>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>
                                <span class="badge rounded-pill bg-success">Teste</span>
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
                                                Opção 1
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa-solid fa-trash-can"></i>
                                                Opção 2
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                        {{-- @empty

                        @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- FIM TABELA DE AGENDAMENTOS --}}
</div>
