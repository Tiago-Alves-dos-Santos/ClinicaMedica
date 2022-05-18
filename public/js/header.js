function showToast(title,information, type_number, time){
    type = ['success','info','warning','error'];
    $.toast({
        heading: title,
        text: information,
        icon: type[type_number],
        loader: true,        // Change it to false to disable loader
        loaderBg: '#d63384',  // To change the background
        showHideTransition: 'slide',
        hideAfter: time, //toast some ao exibir msg, false fica ate usuario clicar
        position: 'top-center'

    })
}

/**
 * [Description for showQuestion]
 *
 * @return [type]
 *
 */
function showQuestionYesNo(title,question_data, callback,color='dark'){
    $.confirm({
        title: title,
        content: question_data,
        type: color,
        typeAnimated: true,
        buttons: {
            Sim: {
                text: 'SIM',
                btnClass: 'btn-'+color,
                action: callback
            },
            Nao: {
                text: 'NÂO',
                action: function(){

                }
            },
        }
    });
}

function soletras(campo) {
    campo.value = campo.value.replace(/[^a-zA-Z ]/g,'');
}

function moneyRule(campo) {
    campo.value = campo.value.replace(/[^0-9 .,]/g,'');
}
