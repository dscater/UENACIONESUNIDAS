<?php

use App\Estudiante;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Hash;

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

Auth::routes();

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'Proceso realizado';
});

Route::get('/reasignar_estudiantes', function () {
    $estudiantes = Estudiante::all();
    $nro_codigo = 500001;
    foreach ($estudiantes as $key => $item) {
        $nombre_estudiante = UserController::nombreUsuario($item->nombre, $item->paterno, $item->materno);
        $item->user->name = $nombre_estudiante . $nro_codigo;
        $item->user->password = Hash::make($item->nro_doc);
        $item->user->save();
        $nro_codigo++;
    }

    return 'Proceso realizado';
});

Route::get('/', function () {
    return view('auth.login');
})->name('inicio');

Route::get('home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    // ADMINISTRATIVOS
    Route::get('administrativos', 'AdministrativoController@index')->name('administrativos.index');

    Route::get('administrativos/create', 'AdministrativoController@create')->name('administrativos.create');

    Route::post('administrativos/store', 'AdministrativoController@store')->name('administrativos.store');

    Route::get('administrativos/edit/{usuario}', 'AdministrativoController@edit')->name('administrativos.edit');

    Route::put('administrativos/update/{usuario}', 'AdministrativoController@update')->name('administrativos.update');

    Route::delete('administrativos/destroy/{usuario}', 'AdministrativoController@destroy')->name('administrativos.destroy');

    // Configuración de cuenta
    Route::GET('users/configurar/cuenta/{user}', 'UserController@config')->name('users.config');

    // contraseña
    Route::PUT('users/configurar/cuenta/update/{user}', 'UserController@cuenta_update')->name('users.config_update');

    // foto de perfil
    Route::POST('users/configurar/cuenta/update/foto/{user}', 'UserController@cuenta_update_foto')->name('users.config_update_foto');

    // PROFESORES
    Route::get('profesors', 'ProfesorController@index')->name('profesors.index');

    Route::get('profesors/create', 'ProfesorController@create')->name('profesors.create');

    Route::post('profesors/store', 'ProfesorController@store')->name('profesors.store');

    Route::get('profesors/edit/{usuario}', 'ProfesorController@edit')->name('profesors.edit');

    Route::put('profesors/update/{usuario}', 'ProfesorController@update')->name('profesors.update');

    Route::delete('profesors/destroy/{usuario}', 'ProfesorController@destroy')->name('profesors.destroy');

    Route::get('profesors/asistencias/{profesor}', 'ProfesorController@asistencias')->name('profesors.asistencias');

    // PROFESORES-MATERIAS
    Route::get('profesor_materias/{profesor}', 'ProfesorMateriaController@index')->name('profesor_materias.index');

    Route::get('profesor_materias/byGestion/getProfesorMateriasGestion', 'ProfesorMateriaController@getProfesorMateriasGestion')->name('profesor_materias.getProfesorMateriasGestion');

    Route::get('profesor_materias/create/{profesor}', 'ProfesorMateriaController@create')->name('profesor_materias.create');

    Route::post('profesor_materias/store/{profesor}', 'ProfesorMateriaController@store')->name('profesor_materias.store');

    Route::get('profesor_materias/edit/{profesor_materia}', 'ProfesorMateriaController@edit')->name('profesor_materias.edit');

    Route::put('profesor_materias/update/{profesor_materia}', 'ProfesorMateriaController@update')->name('profesor_materias.update');

    Route::delete('profesor_materias/destroy/{profesor}', 'ProfesorMateriaController@destroy')->name('profesor_materias.destroy');

    Route::get('profesor_materias/carga_materias/getMateriasDisponibles', 'ProfesorMateriaController@getMateriasDisponibles')->name('profesor_materias.getMateriasDisponibles');

    Route::get('profesor_materias/materias_asignadas/{profesor}', 'ProfesorMateriaController@materias_asignadas')->name('profesor_materias.materias_asignadas');

    Route::get('profesor_materias/getInfoMateriasAsignadas/{profesor}', 'ProfesorMateriaController@getInfoMateriasAsignadas')->name('profesor_materias.getInfoMateriasAsignadas');

    // ESTUDIANTES
    Route::get('estudiantes', 'EstudianteController@index')->name('estudiantes.index');

    Route::get('estudiantes/create', 'EstudianteController@create')->name('estudiantes.create');

    Route::post('estudiantes/store', 'EstudianteController@store')->name('estudiantes.store');

    Route::get('estudiantes/edit/{usuario}', 'EstudianteController@edit')->name('estudiantes.edit');

    Route::get('estudiantes/formulario/{usuario}', 'EstudianteController@formulario')->name('estudiantes.formulario');

    Route::put('estudiantes/update/{usuario}', 'EstudianteController@update')->name('estudiantes.update');

    Route::delete('estudiantes/destroy/{usuario}', 'EstudianteController@destroy')->name('estudiantes.destroy');

    Route::get('estudiantes/getInfoPadreTutor', 'EstudianteController@getInfoPadreTutor')->name('estudiantes.getInfoPadreTutor');

    Route::get('estudiantes/asistencias/{estudiante}', 'EstudianteController@asistencias')->name('estudiantes.asistencias');

    // CAMPOS
    Route::get('campos', 'CampoController@index')->name('campos.index');

    Route::get('campos/create', 'CampoController@create')->name('campos.create');

    Route::post('campos/store', 'CampoController@store')->name('campos.store');

    Route::get('campos/edit/{campo}', 'CampoController@edit')->name('campos.edit');

    Route::put('campos/update/{campo}', 'CampoController@update')->name('campos.update');

    Route::delete('campos/destroy/{campo}', 'CampoController@destroy')->name('campos.destroy');

    // AREAS
    Route::get('areas', 'AreaController@index')->name('areas.index');

    Route::get('areas/create', 'AreaController@create')->name('areas.create');

    Route::post('areas/store', 'AreaController@store')->name('areas.store');

    Route::get('areas/edit/{area}', 'AreaController@edit')->name('areas.edit');

    Route::put('areas/update/{area}', 'AreaController@update')->name('areas.update');

    Route::delete('areas/destroy/{area}', 'AreaController@destroy')->name('areas.destroy');

    // MATERIAS
    Route::get('materias', 'MateriaController@index')->name('materias.index');

    Route::get('materias/create', 'MateriaController@create')->name('materias.create');

    Route::post('materias/store', 'MateriaController@store')->name('materias.store');

    Route::get('materias/edit/{materia}', 'MateriaController@edit')->name('materias.edit');

    Route::get('materias/show', 'MateriaController@show')->name('materias.show');

    Route::put('materias/update/{materia}', 'MateriaController@update')->name('materias.update');

    Route::delete('materias/destroy/{materia}', 'MateriaController@destroy')->name('materias.destroy');

    Route::get('materias/getMaterias/materiasCalificacions', 'MateriaController@materiasCalificacions')->name('materias.materiasCalificacions');

    // PARALELOS
    Route::get('paralelos', 'ParaleloController@index')->name('paralelos.index');

    Route::get('paralelos/create', 'ParaleloController@create')->name('paralelos.create');

    Route::post('paralelos/store', 'ParaleloController@store')->name('paralelos.store');

    Route::get('paralelos/edit/{paralelo}', 'ParaleloController@edit')->name('paralelos.edit');

    Route::put('paralelos/update/{paralelo}', 'ParaleloController@update')->name('paralelos.update');

    Route::delete('paralelos/destroy/{paralelo}', 'ParaleloController@destroy')->name('paralelos.destroy');

    // INSCRIPCIONES
    Route::get('inscripcions', 'InscripcionController@index')->name('inscripcions.index');

    Route::get('inscripcions/getInscripcionsByProfesorMateria', 'InscripcionController@getInscripcionsByProfesorMateria')->name('inscripcions.getInscripcionsByProfesorMateria');

    Route::get('inscripcions/create', 'InscripcionController@create')->name('inscripcions.create');

    Route::post('inscripcions/store', 'InscripcionController@store')->name('inscripcions.store');

    Route::get('inscripcions/edit/{inscripcion}', 'InscripcionController@edit')->name('inscripcions.edit');

    Route::put('inscripcions/update/{inscripcion}', 'InscripcionController@update')->name('inscripcions.update');

    Route::delete('inscripcions/destroy/{inscripcion}', 'InscripcionController@destroy')->name('inscripcions.destroy');

    Route::get('inscripcions/getInfo/cantidad_estudiantes', 'InscripcionController@cantidad_estudiantes')->name('inscripcions.cantidad_estudiantes');

    Route::get('inscripcions/formulario/{inscripcion}', 'InscripcionController@formulario')->name('inscripcions.formulario');

    // CALIFICACIONES
    Route::get('calificacions/{profesor}', 'CalificacionController@index')->name('calificacions.index');

    Route::post('calificacions/store', 'CalificacionController@store')->name('calificacions.store');

    Route::get('calificacions/getEstudiantes/Calificacions', 'CalificacionController@getEstudiantesCalificacions')->name('calificacions.getEstudiantesCalificacions');

    Route::get('calificacions/estudiante/{estudiante}', 'CalificacionController@calificacion_estudiante')->name('calificacions.calificacion_estudiante');

    Route::get('calificacions/notas/{estudiante}', 'CalificacionController@notas_estudiante')->name('calificacions.notas_estudiante');

    Route::get('calificacions/boleta/boleta_estudiante/{estudiante}', 'CalificacionController@boleta_estudiante')->name('boleta.boleta_estudiante');

    Route::get('calificacions/historial/historial_academico/{estudiante}', 'CalificacionController@historial_academico')->name('calificacions.historial_academico');

    // KARDEX DESEMPEÑO ACADEMICO
    Route::get('kardex_desempenos', 'KardexDesempenoController@index')->name('kardex_desempenos.index');

    Route::get('kardex_desempenos/estudiante', 'KardexDesempenoController@estudiante')->name('kardex_desempenos.estudiante');
    Route::get('kardex_desempenos/estudiante/desempeno_pdf', 'KardexDesempenoController@desempeno_pdf')->name('kardex_desempenos.desempeno_pdf');

    Route::get('kardex_desempenos/show/{profesor_materia}/{inscripcion}', 'KardexDesempenoController@show')->name('kardex_desempenos.show');

    Route::get('kardex_desempenos/getInscripcionsKardex', 'KardexDesempenoController@getInscripcionsKardex')->name('kardex_desempenos.getInscripcionsKardex');

    Route::get('kardex_desempenos/create/{profesor_materia}/{inscripcion}', 'KardexDesempenoController@create')->name('kardex_desempenos.create');

    Route::post('kardex_desempenos/store/{profesor_materia}/{inscripcion}', 'KardexDesempenoController@store')->name('kardex_desempenos.store');

    Route::get('kardex_desempenos/edit/{kardex_desempeno}', 'KardexDesempenoController@edit')->name('kardex_desempenos.edit');

    Route::put('kardex_desempenos/update/{kardex_desempeno}', 'KardexDesempenoController@update')->name('kardex_desempenos.update');

    Route::delete('kardex_desempenos/destroy/{kardex_desempeno}', 'KardexDesempenoController@destroy')->name('kardex_desempenos.destroy');

    // PROFESOR COLORS
    Route::get('profesor_colors', 'ProfesorColorController@index')->name('profesor_colors.index');

    Route::get('profesor_colors/create', 'ProfesorColorController@create')->name('profesor_colors.create');

    Route::post('profesor_colors/store', 'ProfesorColorController@store')->name('profesor_colors.store');

    Route::get('profesor_colors/edit/{profesor_color}', 'ProfesorColorController@edit')->name('profesor_colors.edit');

    Route::put('profesor_colors/update/{profesor_color}', 'ProfesorColorController@update')->name('profesor_colors.update');

    Route::delete('profesor_colors/destroy/{profesor_color}', 'ProfesorColorController@destroy')->name('profesor_colors.destroy');

    // HORAS
    Route::get('horas', 'HoraController@index')->name('horas.index');

    Route::get('horas/create', 'HoraController@create')->name('horas.create');

    Route::post('horas/store', 'HoraController@store')->name('horas.store');

    Route::get('horas/edit/{hora}', 'HoraController@edit')->name('horas.edit');

    Route::put('horas/update/{hora}', 'HoraController@update')->name('horas.update');

    Route::delete('horas/destroy/{hora}', 'HoraController@destroy')->name('horas.destroy');

    // HORARIOS
    Route::get('horarios', 'HorarioController@index')->name('horarios.index');

    Route::get('horarios/estudiante_info', 'HorarioController@estudiante_info')->name('horarios.estudiante_info');
    Route::get('horarios/estudiante', 'HorarioController@estudiante')->name('horarios.estudiante');

    Route::get('horarios/profesor_info', 'HorarioController@profesor_info')->name('horarios.profesor_info');
    Route::get('horarios/profesor', 'HorarioController@profesor')->name('horarios.profesor');

    Route::get('horarios/create', 'HorarioController@create')->name('horarios.create');

    Route::post('horarios/store', 'HorarioController@store')->name('horarios.store');

    Route::get('horarios/edit/{horario}', 'HorarioController@edit')->name('horarios.edit');

    Route::put('horarios/update/{horario}', 'HorarioController@update')->name('horarios.update');

    Route::delete('horarios/destroy/{horario}', 'HorarioController@destroy')->name('horarios.destroy');

    // NOTIFICACION ESTUDIANTES
    Route::get('notificacion_estudiantes', 'NotificacionEstudianteController@index')->name('notificacion_estudiantes.index');

    Route::get('notificacion_estudiantes/byEstudiante', 'NotificacionEstudianteController@byEstudiante')->name('notificacion_estudiantes.byEstudiante');

    Route::get('notificacion_estudiantes/show/{notificacion_estudiante}', 'NotificacionEstudianteController@show')->name('notificacion_estudiantes.show');

    // RAZON SOCIAL
    Route::get('razon_social/index', 'RazonSocialController@index')->name('razon_social.index');

    Route::get('razon_social/edit/{razon_social}', 'RazonSocialController@edit')->name('razon_social.edit');

    Route::put('razon_social/update/{razon_social}', 'RazonSocialController@update')->name('razon_social.update');

    // REPORTES
    Route::get('reportes', 'ReporteController@index')->name('reportes.index');

    Route::get('reportes/usuarios', 'ReporteController@usuarios')->name('reportes.usuarios');

    Route::get('reportes/personal', 'ReporteController@personal')->name('reportes.personal');

    Route::get('reportes/kardex_personal', 'ReporteController@kardex_personal')->name('reportes.kardex_personal');

    Route::get('reportes/boleta_calificaciones', 'ReporteController@boleta_calificaciones')->name('reportes.boleta_calificaciones');

    Route::get('reportes/centralizador_calificacions', 'ReporteController@centralizador_calificacions')->name('reportes.centralizador_calificacions');

    Route::get('reportes/historial_academico', 'ReporteController@historial_academico')->name('reportes.historial_academico');

    Route::get('reportes/asignacion_materias', 'ReporteController@asignacion_materias')->name('reportes.asignacion_materias');

    Route::get('reportes/horarios', 'ReporteController@horarios')->name('reportes.horarios');

    Route::get('reportes/estadistica_estudiantes', 'ReporteController@estadistica_estudiantes')->name('reportes.estadistica_estudiantes');

    Route::get('reportes/filiacion_padres', 'ReporteController@filiacion_padres')->name('reportes.filiacion_padres');

    Route::get('reportes/kardex_desempenos', 'ReporteController@kardex_desempenos')->name('reportes.kardex_desempenos');
});
