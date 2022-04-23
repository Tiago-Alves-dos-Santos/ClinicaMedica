<div>
    {{-- Do your work, then step back. --}}
    <livewire:components.medico.form-create-update :id="$id">

    <div class="row mt-4">
        <div class="col-md-12">
            <livewire:components.especialidade-medico.table>
        </div>
    </div>

    <script>
        $(function(){
            Livewire.on('page.medico.update_showToast',(msg_toast) => {
                showToast(msg_toast.title, msg_toast.information, msg_toast.type, msg_toast.time);
            });
        });
    </script>
</div>
