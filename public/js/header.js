/****************************************FUNÇÕES********************************************************/
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

/*****************************************FULLSCREEN*******************************************/
function GoInFullscreen() {
    var element = document.documentElement;
    if(element.requestFullscreen)
        element.requestFullscreen();
    else if(element.mozRequestFullScreen)
        element.mozRequestFullScreen();
    else if(element.webkitRequestFullscreen)
        element.webkitRequestFullscreen();
    else if(element.msRequestFullscreen)
        element.msRequestFullscreen();
}

/* Get out of full screen */
function GoOutFullscreen() {
    if(document.exitFullscreen)
        document.exitFullscreen();
    else if(document.mozCancelFullScreen)
        document.mozCancelFullScreen();
    else if(document.webkitExitFullscreen)
        document.webkitExitFullscreen();
    else if(document.msExitFullscreen)
        document.msExitFullscreen();
}

/* Is currently in full screen or not */
function IsFullScreenCurrently() {
    var full_screen_element = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || null;

    // If no element is in full-screen
    if(full_screen_element === null)
        return false;
    else
        return true;
}

function toogleFullScreen(){
    if(IsFullScreenCurrently()){
        GoOutFullscreen();
    }else{
        GoInFullscreen();
    }
}

