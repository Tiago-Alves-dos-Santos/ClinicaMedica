<div>
    {{-- Stop trying to control. --}}
    <div class="row">
        <div class="col-xl-10 col-sm-9">
            <input type="search" name="" id="" class="form-control" placeholder="Busca...">
        </div>
        <div class="col-xl-2 col-sm-3 d-flex justify-content-end">
            <a href="{{route('view.medicos.create')}}" class="btn btn-blue">
                <i class="fa-solid fa-plus"></i>
                Novo Registro
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>Nome</th>
                <th>CRM</th>
                <th>Data Admição</th>
                <th>Data Pagamento</th>
                <th>Data Nascimento</th>
                <th>Situação</th>
                <th>Opções</th>
            </thead>
            <tbody>
               @forelse ($medicos as $value)
               <tr>
                    <td>{{$value->nome}}</td>
                    <td>{{$value->crm}}</td>
                    <td>{{date('d/m/Y', strtotime($value->data_admicao))}}</td>
                    <td>{{date('d/m/Y', strtotime($value->data_pagamento))}}</td>
                    <td>{{date('d/m/Y', strtotime($value->data_nascimento))}}</td>
                    @if ($value->status_trabalho === "empregado")
                    <td>
                        <span class="badge rounded-pill bg-success">Empregado</span>
                    </td>
                    @else
                    <td>
                        <span class="badge rounded-pill bg-danger">Demitido</span>
                    </td>
                    @endif
                    <td class="d-flex justify-content-center">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle hide-icon" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('img/more_options.png')}}" class="img-fluid" alt="Opções" style="width: 17px; height: 20px;">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-list"></i>
                                        Detalhes
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('view.medicos.update',[
                                        'id' => $value->id
                                    ])}}">
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
