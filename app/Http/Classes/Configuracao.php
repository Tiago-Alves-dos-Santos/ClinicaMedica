<?php
namespace App\Http\Classes;

define('PRODUCAO', false);
//VALOR EM PX - INTERVERTION CONVERSÃO DE TAMANHO
define('PERFIL_WIDTH', 200);
define('PERFIL_HEIGHT', 200);


//VALORES ABAIXO USADO PARA CAMINHO DA BIBLIOTECA ITENVERTION, DIFERENTE DE USAR STORAGE AS
//LOCAL DE SALVAR O UPLOAD, ´SO VALE PARA REGISTROS A CADASTRAR, CADASTRADOS NÃO SOFREM MUDANÇAS
define('PATH_PERFIL_CLIENTE', public_path()."/storage/cliente/");
define('PATH_PERFIL_RECEPECIONISTA', public_path()."/storage/recepcao/");
define('PATH_PERFIL_MEDICO', public_path()."/storage/medico/");

//tempo de desaparecimento do toast, false = permanente
define('TIME_TOAST',5000);
//tempo de limite de uma consulta em minutos
define('TIME_CONSULTA',30);
if(PRODUCAO){
    /******pasta - arquivos storage - StoraGe(SG)******/
    define('PATH_PERFIL_CLIENTE_SG', "cliente/");
}else{
    /******pasta - arquivos storage - StoraGe(SG)******/
    define('PATH_PERFIL_CLIENTE_SG', "public/cliente/");
    define('PATH_PERFIL_RECEPECIONISTA_SG', "public/recepcao/");
    define('PATH_PERFIL_MEDICO_SG', "public/medico/");
}
class Configuracao
{
    public static $LIMITE_PAGINA = 10;
    /**
     * [Description for isProduction]
     *
     * @return [type]
     *
     */
    public static function isProduction()
    {
        return PRODUCAO;
    }

    /**
     * [Description for getPathCliente]
     *
     * @param mixed $path
     *
     * @return [type]
     *
     */
    public static function getPathCliente($path)
    {
        switch($path){
            case 'perfil':
                return 'storage/cliente/';
            break;
            default:

            break;
        }
    }

    public static function getPathMedico($path)
    {
        switch($path){
            case 'perfil':
                return 'storage/medico/';
            break;
            default:

            break;
        }
    }

    public static function getPathRecepcao($path)
    {
        switch($path){
            case 'perfil':
                return 'storage/recepcao/';
            break;
            default:

            break;
        }
    }

    //usado em conjunto com jquery mask com formato money
    //formato ',' para deciamais '.' para centenas, milhares etc
    public static function convertToMoney($money)
    {
        $source = array('.', ',');
        $replace = array('', '.');
        return str_replace($source ,$replace,$money);
    }

    //ao pegar valor do banco ele pode vir meio bugado em um campo com jquewry mask
    //configurado para money
    public static function getDbMoney($money)
    {
        return number_format($money, 2 ,',','.');
    }

    public static function validarCPF($cpf)
    {
        // Verifica se um número foi informado
        if(empty($cpf)) {
            return false;
        }

        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
            return false;
        // Calcula os digitos verificadores para verificar se o
        // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return false;
                }
            }

            return true;
        }
    }

    public static function calcIdade($data_nascimento)
    {

        $date = $data_nascimento;
    	$time = strtotime($date);
    	if($time === false){
            return 0;
        }
        $year_diff = '';
        $date = date('Y-m-d', $time);
        list($year,$month,$day) = explode('-',$date);
        $year_diff = date('Y') - $year;
        $month_diff = date('m') - $month;
        $day_diff = (date('d') - $day) * -1;
        if ($month_diff < 0 || ($month == date('m') && $day > date('d')) ){
            $year_diff--;

        }
        return $year_diff;
        //echo $year_diff." ".$month_diff." ".$day_diff;
    }

    /**
     * [Description for getOpcoesStatusAgendamento]
     * Opçoes de status agendamento de consulta
     * @return [type]
     *
     */
    public static function getOpcoesStatusAgendamento()
    {
        $status_agendamento_opcoes =  [
            'agendada' => 'AGENDADA',
             'cancelada' => 'CANCELADA',
             'confirmada' => 'CONFIRMADA',
             'realizada' => 'REALIZADA',
             'a_confirmar' => 'A CONFIRMAR'
        ];
        sort($status_agendamento_opcoes);
        return $status_agendamento_opcoes;
    }
}
