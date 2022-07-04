<?php

use App\Http\Livewire\Page\Home;
use App\Http\Livewire\Page\Login;
use Illuminate\Support\Facades\Route;
/**Clietne */

use App\Http\Livewire\Page\Consultas\Atendimento;
use App\Http\Livewire\Page\Medico\Dashboard as Medico;
/**Medico */
use App\Http\Livewire\Page\Cliente\Dashboard as Cliente;
use App\Http\Livewire\Page\Medico\Create as MedicoCreate;
use App\Http\Livewire\Page\Medico\Update as MedicoUpdate;

/**Recepcionista */
use App\Http\Livewire\Page\Cliente\Create as ClienteCreate;
use App\Http\Livewire\Page\Cliente\Update as ClienteUpdate;
use App\Http\Livewire\Page\AgendarCliente\Dashboard as Agendamento;
use App\Http\Livewire\Page\Consultas\Dashboard as ConsultaDashboard;
/**Especialidade */
use App\Http\Livewire\Page\Especialidade\Dashboard as Especialidade;
use App\Http\Livewire\Page\Recepcionista\Dashboard as Recepcionista;
use App\Http\Livewire\Page\Recepcionista\Create as RecepcionistaCreate;
use App\Http\Livewire\Page\Recepcionista\Update as RecepcionistaUpdate;
use App\Http\Livewire\Page\AgendarCliente\FormAgendar as AgendamentoAgendar;
use App\Http\Livewire\Page\AgendarCliente\FormAgendarEdit as AgendamentoEditar;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',Login::class);
Route::get('/home',Home::class)->name('view.home');
//recepcionista
Route::get('/recepcionista/dashboard',Recepcionista::class)->name('view.recepcionista');
Route::get('/recepcionista/create',RecepcionistaCreate::class)->name('view.recepcionista.create');
Route::get('/recepcionista/update/{id}',RecepcionistaUpdate::class)->name('view.recepcionista.update');
//medico
Route::get('/medico/dashboard',Medico::class)->name('view.medicos');
Route::get('/medico/dashboard/create',MedicoCreate::class)->name('view.medicos.create');
Route::get('/medico/dashboard/update/{id}',MedicoUpdate::class)->name('view.medicos.update');
//especialidades
Route::get('/especialidades/dashboard',Especialidade::class)->name('view.especialidades');
//clientes
Route::get('/cliente/dashboard',Cliente::class)->name('view.clientes');
Route::get('/cliente/create',ClienteCreate::class)->name('view.clientes.create');
Route::get('/cliente/update/{id}',ClienteUpdate::class)->name('view.clientes.update');
//agendamento
Route::get('/agedamento/dashboard',Agendamento::class)->name('view.agendamento.dashboard');
Route::get('/agedamento/agendar/{medico_id?}/{data?}',AgendamentoAgendar::class)->name('view.agendamento.agendar');
Route::get('/agedamento/editar/{agendamento_id}',AgendamentoEditar::class)->name('view.agendamento.editar');

//consultas
Route::get('/consultas/dashboard', ConsultaDashboard::class)->name('view.consultas.dashboard');
Route::get('/consultas/atendimento/{consulta_id}/{status}', Atendimento::class)->name('view.consultas.atendimento');
// Route::get('/teste',function(){
//     return "teste";
// });

