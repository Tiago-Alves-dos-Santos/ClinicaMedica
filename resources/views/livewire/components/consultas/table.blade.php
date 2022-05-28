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
                        <tr>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
                            <td>teste</td>
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
                                            <a class="dropdown-item" href="">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                Editar
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa-solid fa-trash-can"></i>
                                                Deletar
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa-solid fa-trash-can"></i>
                                                Ver agendamento
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
