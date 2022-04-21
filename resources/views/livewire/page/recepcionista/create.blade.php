<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <div class="col-md-12">
            <livewire:components.recepcionista.create>
        </div>
    </div>

    <script>
        $(function(){
            Livewire.on('page.recepcionista.create_showToast',(msg_toast) => {
                showToast(msg_toast.title, msg_toast.information, msg_toast.type, msg_toast.time);
            });
        });
    </script>
</div>
