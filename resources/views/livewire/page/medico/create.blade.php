<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="row">
        <div class="col-md-12">
            <livewire:components.medico.form-create-update>
        </div>
    </div>

    <script>
        $(function(){
            Livewire.on('page.medico.create_showToast',(msg_toast) => {
                showToast(msg_toast.title, msg_toast.information, msg_toast.type, msg_toast.time);
            });
        });
    </script>
</div>
