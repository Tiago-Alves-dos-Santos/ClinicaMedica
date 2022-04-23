<div class="especialidade-medico-table">
    {{-- Success is as dangerous as failure. --}}
    <div class="row">
        <div class="col-xl-10 col-sm-9">
            <input type="search" name="" id="" class="form-control" placeholder="Busca...">
        </div>
        <div class="col-xl-2 col-sm-3 d-flex justify-content-end">
            <button type="button" class="btn btn-blue" data-bs-toggle="modal" data-bs-target="#modalVincularEspecialidade">
                <i class="fa-solid fa-plus"></i>
                Vincular
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive mt-4">
                <table class="table-default table-striped">
                    <thead>
                        <th>Nome</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        {{-- @forelse ($clientes as $value) --}}
                        <tr>
                            <td style="width: 90%">TESTE</td>
                            <td style="width: 10%">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle hide-icon" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('img/more_options.png')}}" class="img-fluid" alt="Opções" style="width: 17px; height: 20px;">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa-solid fa-trash-can"></i>
                                                Desvincular
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
</div>

