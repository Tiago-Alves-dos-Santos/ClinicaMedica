<div class="cliente-table">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="row">
        <div class="col-xl-10 col-sm-9">
            <input type="search" name="" id="" class="form-control" placeholder="Busca...">
        </div>
        <div class="col-xl-2 col-sm-3 d-flex justify-content-end">
            <a href="{{route('view.clientes.create')}}" class="btn btn-blue">
                <i class="fa-solid fa-plus"></i>
                Novo Registro
            </a>
        </div>
    </div>
    <div class="table-responsive mt-4">
        <table class="table-default table-striped">
            <thead>
                <th>Perfil</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Data Nascimento</th>
                <th>Idade</th>
                <th>Opções</th>
            </thead>
            <tbody>
                @forelse ($clientes as $value)
                <tr>
                    <td class="perfil" style="position: relative;">
                        @if (!is_null($value->perfil_foto))
                        <img src="{{asset($value->perfil_foto)}}" class="img-fluid" alt="">
                        @else
                        <img src="{{asset('img/perfil_anonimo.png')}}" class="img-fluid" alt="">
                        @endif
                    </td>
                    <td>{{$value->nome}}</td>
                    <td>{{$value->cpf}}</td>
                    <td>{{$value->rg}}</td>
                    <td>{{date('d/m/Y', strtotime($value->data_nascimento))}}</td>
                    <td>{{Configuracao::calcIdade($value->data_nascimento)}}</td>
                    <td style="">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle hide-icon" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('img/more_options.png')}}" class="img-fluid" alt="Opções" style="width: 17px; height: 20px;">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" href="{{route('view.clientes.update', [
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
