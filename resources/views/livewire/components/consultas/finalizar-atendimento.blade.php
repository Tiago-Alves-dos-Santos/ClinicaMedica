<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <button type="button" class="btn btn-success d-block w-100" wire:click='finalizar'>
        Finalizar Consulta
        <div class="spinner-border text-warning spinner-border-sm" role="status" wire:loading wire:target='finalizar'>
            <span class="visually-hidden">Loading...</span>
        </div>
    </button>

</div>
