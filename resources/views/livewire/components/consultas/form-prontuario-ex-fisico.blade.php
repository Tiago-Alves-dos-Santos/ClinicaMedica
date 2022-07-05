<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="row">
        <div class="col-md-12">
            <form method="POST" wire:submit.prevent='updateProntuario'>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">HDA</label>
                        <textarea name="" id="" rows="10" class="form-control" wire:model.lazy='hda'></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Historico Familiar</label>
                        <textarea name="" id="" rows="10" class="form-control" wire:model.lazy='historico_familiar'></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">HPP</label>
                        <textarea name="" id="" rows="10" class="form-control" wire:model.lazy='hpp'></textarea>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-end">
                        <button type="submit" class="btn btn-primary">
                            SALVAR
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3>Exame Fisíco</h3>
        </div>
    </div>

    <div class="row">
        <form method="POST" wire:submit.prevent='updateExameFisico'>
            <div class="row">
                <div class="col-md-4">
                    {{-- Peso --}}
                    <label for="">P</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" wire:model.lazy='peso'>
                        <span class="input-group-text" id="basic-addon2">Kg</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Height</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2" wire:model.lazy='altura' wire:change='calcIMC'>
                        <span class="input-group-text" id="basic-addon2">M</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">IMC - {{$imc}}</label>
                    @if($imc < 18.5 && $imc > 0)
                    <span>Abaixo do peso</span>
                    @elseif($imc >= 18.5 && $imc < 24.9)
                    <span>Peso normal</span>
                    @elseif($imc >= 25 && $imc < 29.9)
                    <span>Sobrepeso</span>
                    @elseif($imc >= 30 && $imc < 34.9)
                    <span>Obesidade grau 1</span>
                    @elseif($imc >= 35 && $imc < 39.9)
                    <span>Obesidade grau 2</span>
                    @elseif($imc >= 40)
                    <span>Obesidade grau 3</span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="">PA</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" wire:model.lazy='pa'>
                        <span class="input-group-text" id="basic-addon2">mm/Hg</span>
                    </div>
                </div>
                <div class="col-md-4">
                    {{-- Frequencia cardiaca --}}
                    <label for="">FC</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2" wire:model.lazy='frequencia_cardiaca'>
                        <span class="input-group-text" id="basic-addon2">Bpm</span>
                    </div>
                </div>
                <div class="col-md-4">
                    {{-- Frequencia respiratoria --}}
                    <label for="">FR</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2" wire:model.lazy='frequencia_respiratoria'>
                        <span class="input-group-text" id="basic-addon2">Mpm</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    {{-- Saturação de oxigenio --}}
                    <label for="">SAT O2</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" wire:model.lazy='saturacao_oxigenio'>
                        <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                </div>
                <div class="col-md-4">
                    {{-- Frequencia cardiaca --}}
                    <label for="">Glicemia</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2" wire:model.lazy='glicemia'>
                        <span class="input-group-text" id="basic-addon2">mg/dl</span>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-end  align-items-end">
                    <button type="submit" class="btn btn-primary">
                        SALVAR
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
