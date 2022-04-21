<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <livewire:components.cliente.form-create-update>

    <script>
        $(function(){
            Livewire.on('page.cliente.createUpdate_showToast',(msg_toast) => {
                showToast(msg_toast.title, msg_toast.information, msg_toast.type, msg_toast.time);
            });
        });
    </script>
</div>
