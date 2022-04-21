<div>
    {{-- Do your work, then step back. --}}
    <livewire:components.medico.form-create-update :id="$id">


    <script>
        $(function(){
            Livewire.on('page.medico.update_showToast',(msg_toast) => {
                showToast(msg_toast.title, msg_toast.information, msg_toast.type, msg_toast.time);
            });
        });
    </script>
</div>
