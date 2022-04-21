<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="row">
        <div class="col-md-12">
            <livewire:components.recepcionista.create :id="$id_recepcionista">
        </div>
    </div>

    <script>
        $(function(){
            Livewire.on('page.recepcionista.update_showToast',(msg_toast) => {
                showToast(msg_toast.title, msg_toast.information, msg_toast.type, msg_toast.time);
            });
        });
    </script>
</div>
