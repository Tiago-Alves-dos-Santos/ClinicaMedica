var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});

$(function(){
    /**Mascaras */
    $('.mask-cpf').mask('000.000.000-00');
    //mascar money de milhoes
    $('.mask-money').mask('000.000.000,00', {reverse:true});
    /** Fim mascaras */

    //livewire globals
    Livewire.on('showToast',(msg_toast) => {
        showToast(msg_toast.title, msg_toast.information, msg_toast.type, msg_toast.time);
    });


});

