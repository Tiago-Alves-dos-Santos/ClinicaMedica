<div>
    {{-- The whole world belongs to you. --}}
    <div class="row">
        <div class="col-md-8">
            <input type="text" name="" id="" class="form-control" placeholder="" wire:model.defer='nome'>
        </div>
        <div class="col-md-4" style="display: flex; justify-content: space-between">
                <a wire:click.prevent='search' class="btn btn-success" style="margin-left: 20px">
                    Buscar
                </a>
                <a wire:click.prevent='verifyActionButton' class="btn btn-blue" style="margin-left: 20px">
                    <i class="{{$itemAction}}"></i>
                    {{$textAction}}
                </a>
                <a wire:click.prevent='cancelAction' class="btn btn-danger" style="margin-left: 20px">
                    <i class="fa-solid fa-xmark"></i>
                    Cancelar
                </a>
            </div>
    </div>
    <div class="table-responsive">
        <table class="table-hoverEffect-dark">
            <thead>
                <th>Especialidade</th>
            </thead>
            <tbody>
                @forelse ($especialidades as $value)
                    <tr wire:click="clickRowTable({{$value->id}})" id="{{$value->id}}">
                        <td>{{$value->nome}}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td>N/A</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        $(function(){
            Livewire.on('components.especialidade.table_clickRowTable', (id, active_line) => {
                if(active_line){
                    $("tr#"+id).addClass('active');
                }else{
                    $("tr#"+id).removeClass('active');
                }
            });
        });
    </script>
</div>
