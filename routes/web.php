<?php

use App\Http\Livewire\Page\Home;
use App\Http\Livewire\Page\Login;
use Illuminate\Support\Facades\Route;
/**Clietne */

use App\Http\Livewire\Page\Medico\Dashboard as Medico;
use App\Http\Livewire\Page\Cliente\Dashboard as Cliente;
/**Medico */
use App\Http\Livewire\Page\Medico\Create as MedicoCreate;
use App\Http\Livewire\Page\Medico\Update as MedicoUpdate;
use App\Http\Livewire\Page\Cliente\Create as ClienteCreate;

/**Recepcionista */
use App\Http\Livewire\Page\Cliente\Update as ClienteUpdate;
use App\Http\Livewire\Page\Recepcionista\Dashboard as Recepcionista;
use App\Http\Livewire\Page\Recepcionista\Create as RecepcionistaCreate;
use App\Http\Livewire\Page\Recepcionista\Update as RecepcionistaUpdate;
/**Especialidade */
use App\Http\Livewire\Page\Especialidade\Dashboard as Especialidade;
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
// Route::get('/teste',function(){
//     return "teste";
// });

