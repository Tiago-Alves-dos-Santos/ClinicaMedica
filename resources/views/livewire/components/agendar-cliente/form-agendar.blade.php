<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                @csrf
                <x-fieldset titulo='Dados medico'>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Médico</label>
                            <select name="" id="" class="form-select">
                                <option value="">Médico 1</option>
                                <option value="">Médico 2</option>
                                <option value="">Médico 3</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">
                                Data
                            </label>
                            <input type="datetime-local" class="form-control">
                        </div>
                        <div class="col-md-3 align-self-end">
                            <button type="button" class="btn btn-info w-100">
                                Disponibilidade
                            </button>
                        </div>
                        <div class="col-md-3 align-self-end d-flex justify-content-center">
                            <h4>Resultado</h4>
                        </div>
                    </div>
                </x-fieldset>
            </form>
        </div>
    </div>
</div>
