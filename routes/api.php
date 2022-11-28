<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// api routes that need auth

Route::middleware(['auth:api'])->group(function () {


/* routes for Agendamento Controller  */	
	Route::get('agendamento', 'AgendamentoController@index');
	Route::get('agendamento/index', 'AgendamentoController@index');
	Route::get('agendamento/index/{filter?}/{filtervalue?}', 'AgendamentoController@index');	
	Route::get('agendamento/view/{rec_id}', 'AgendamentoController@view');	
	Route::post('agendamento/add', 'AgendamentoController@add');	
	Route::any('agendamento/edit/{rec_id}', 'AgendamentoController@edit');	
	Route::any('agendamento/delete/{rec_id}', 'AgendamentoController@delete');	
	Route::get('agendamento/data_pedido', 'AgendamentoController@data_pedido');
	Route::get('agendamento/data_pedido/{filter?}/{filtervalue?}', 'AgendamentoController@data_pedido');	
	Route::get('agendamento/data_entrada', 'AgendamentoController@data_entrada');
	Route::get('agendamento/data_entrada/{filter?}/{filtervalue?}', 'AgendamentoController@data_entrada');	
	Route::get('agendamento/data_realizacao', 'AgendamentoController@data_realizacao');
	Route::get('agendamento/data_realizacao/{filter?}/{filtervalue?}', 'AgendamentoController@data_realizacao');	
	Route::get('agendamento/data_consulta', 'AgendamentoController@data_consulta');
	Route::get('agendamento/data_consulta/{filter?}/{filtervalue?}', 'AgendamentoController@data_consulta');

/* routes for Audits Controller  */	
	Route::get('audits', 'AuditsController@index');
	Route::get('audits/index', 'AuditsController@index');
	Route::get('audits/index/{filter?}/{filtervalue?}', 'AuditsController@index');	
	Route::get('audits/view/{rec_id}', 'AuditsController@view');

/* routes for Especialidades Controller  */	
	Route::get('especialidades', 'EspecialidadesController@index');
	Route::get('especialidades/index', 'EspecialidadesController@index');
	Route::get('especialidades/index/{filter?}/{filtervalue?}', 'EspecialidadesController@index');	
	Route::get('especialidades/view/{rec_id}', 'EspecialidadesController@view');	
	Route::post('especialidades/add', 'EspecialidadesController@add');	
	Route::any('especialidades/edit/{rec_id}', 'EspecialidadesController@edit');	
	Route::any('especialidades/delete/{rec_id}', 'EspecialidadesController@delete');

/* routes for Municipes Controller  */	
	Route::get('municipes', 'MunicipesController@index');
	Route::get('municipes/index', 'MunicipesController@index');
	Route::get('municipes/index/{filter?}/{filtervalue?}', 'MunicipesController@index');	
	Route::get('municipes/view/{rec_id}', 'MunicipesController@view');	
	Route::post('municipes/add', 'MunicipesController@add');	
	Route::any('municipes/edit/{rec_id}', 'MunicipesController@edit');	
	Route::any('municipes/delete/{rec_id}', 'MunicipesController@delete');

/* routes for Satisfacao Controller  */	
	Route::get('satisfacao', 'SatisfacaoController@index');
	Route::get('satisfacao/index', 'SatisfacaoController@index');
	Route::get('satisfacao/index/{filter?}/{filtervalue?}', 'SatisfacaoController@index');	
	Route::get('satisfacao/view/{rec_id}', 'SatisfacaoController@view');	
	Route::post('satisfacao/add', 'SatisfacaoController@add');	
	Route::any('satisfacao/edit/{rec_id}', 'SatisfacaoController@edit');	
	Route::any('satisfacao/delete/{rec_id}', 'SatisfacaoController@delete');	
	Route::post('satisfacao/add2', 'SatisfacaoController@add2');

/* routes for Status_Agendamento Controller  */	
	Route::get('status_agendamento', 'Status_AgendamentoController@index');
	Route::get('status_agendamento/index', 'Status_AgendamentoController@index');
	Route::get('status_agendamento/index/{filter?}/{filtervalue?}', 'Status_AgendamentoController@index');	
	Route::get('status_agendamento/view/{rec_id}', 'Status_AgendamentoController@view');	
	Route::post('status_agendamento/add', 'Status_AgendamentoController@add');	
	Route::any('status_agendamento/edit/{rec_id}', 'Status_AgendamentoController@edit');	
	Route::any('status_agendamento/delete/{rec_id}', 'Status_AgendamentoController@delete');

/* routes for Users Controller  */	
	Route::get('users', 'UsersController@index');
	Route::get('users/index', 'UsersController@index');
	Route::get('users/index/{filter?}/{filtervalue?}', 'UsersController@index');	
	Route::get('users/view/{rec_id}', 'UsersController@view');	
	Route::any('account/edit', 'AccountController@edit');	
	Route::get('account', 'AccountController@index');	
	Route::post('account/changepassword', 'AccountController@changepassword');	
	Route::get('account/currentuserdata', 'AccountController@currentuserdata');	
	Route::post('users/add', 'UsersController@add');	
	Route::any('users/edit/{rec_id}', 'UsersController@edit');	
	Route::any('users/delete/{rec_id}', 'UsersController@delete');

});

Route::get('home', 'HomeController@index');
	
	Route::post('auth/register', 'AuthController@register');	
	Route::post('auth/login', 'AuthController@login');
	Route::get('login', 'AuthController@login')->name('login');
		
	Route::post('auth/forgotpassword', 'AuthController@forgotpassword')->name('password.reset');	
	Route::post('auth/resetpassword', 'AuthController@resetpassword');
	
	Route::get('components_data/municipe_option_list/{arg1?}', 'Components_dataController@municipe_option_list');	
	Route::get('components_data/tipo_option_list/{arg1?}', 'Components_dataController@tipo_option_list');	
	Route::get('components_data/especialidade_option_list/{arg1?}', 'Components_dataController@especialidade_option_list');	
	Route::get('components_data/status_option_list/{arg1?}', 'Components_dataController@status_option_list');	
	Route::get('components_data/users_name_exist/{arg1?}', 'Components_dataController@users_name_exist');	
	Route::get('components_data/users_email_exist/{arg1?}', 'Components_dataController@users_email_exist');	
	Route::get('components_data/agendamento_especialidade_option_list/{arg1?}', 'Components_dataController@agendamento_especialidade_option_list');


/* routes for FileUpload Controller  */	
Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');