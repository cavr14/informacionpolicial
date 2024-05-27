<?php
use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\MovimientosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/catalogos', function () {
    return view('home',["breadcrumbs"=>["Inicio" =>url("/")]]);
});

//--------------------- ENTIDADES BANCARIAS ---------------------------------------------------------
Route::get ("/catalogos/entidadBancaria",[CatalogosController::class, "entidadBancariaGet"]);
Route::get ("/catalogos/entidadBancaria/{id}/eliminar",[CatalogosController::class, "entidadBancariaEliminar"])->where("id","[0-9]+");
Route::get ("/catalogos/entidadBancaria/{id}/activar",[CatalogosController::class, "entidadBancariaActivar"])->where("id","[0-9]+");
Route::get("/catalogos/entidadBancaria/eliminada", [CatalogosController::class, 'entidadBancariaEliminada']);
<<<<<<< HEAD
=======

Route::get("/catalogos/entidadBancaria/agregar",[CatalogosController::class, "entidadBancariaAgregarGet"]);
Route::post("/catalogos/entidadBancaria/agregar",[CatalogosController::class, "entidadBancariaAgregarPost"]);

Route::get("catalogos/delitos/{id}/modificar",[CatalogosController::class, "delitoModificarGet"])->where("id","[0-9]+");
Route::post("catalogos/delitos/{id}/modificar",[CatalogosController::class, "delitoModificarPost"])->where("id","[0-9]+");

//--------------------- SUCURSALES ---------------------------------------------------------------
Route::get ("/catalogos/sucursal",[CatalogosController::class, "sucursalGet"]);

//--------------------- CONTRATOS ---------------------------------------------------------
Route::get ("/catalogos/contratos",[CatalogosController::class, "contratosGet"])->name('contratosGet');

Route::get ("/catalogos/sucursal/{id}/eliminar",[CatalogosController::class, "sucursalEliminar"])->where("id","[0-9]+");
Route::get("/catalogos/sucursal/eliminada", [CatalogosController::class, 'sucursalEliminada']);
Route::get ("/catalogos/sucursal/{id}/activar",[CatalogosController::class, "sucursalActivar"])->where("id","[0-9]+");

Route::get("/sucursal/{id}/modificar",[CatalogosController::class, "sucursalModificarGet"])->where("id","[0-9]+");
Route::post("/sucursal/{id}/modificar",[CatalogosController::class, "sucursalModificarPost"])->where("id","[0-9]+");

//--------------------- VIGILANTES ---------------------------------------------------------
Route::get ("/catalogos/vigilante",[CatalogosController::class, "vigilanteGet"])->name('vigilanteGet');

Route::get ("/catalogos/vigilante/{id}/eliminar",[CatalogosController::class, "vigilanteEliminar"])->where("id","[0-9]+");
Route::get ("/catalogos/vigilante/{id}/activar",[CatalogosController::class, "vigilanteActivar"])->where("id","[0-9]+");
Route::get("/catalogos/vigilante/eliminado", [CatalogosController::class, 'vigilanteEliminado']);

Route::get("/catalogos/vigilante/agregar",[CatalogosController::class, "vigilanteAgregarGet"]);
Route::post("/catalogos/vigilante/agregar",[CatalogosController::class, "vigilanteAgregarPost"]);

Route::get("/catalogos/vigilante/{id}/modificar",[CatalogosController::class, "vigilanteModificarGet"])->where("id","[0-9]+");
Route::post("/catalogos/vigilante/{id}/modificar",[CatalogosController::class, "vigilanteModificarPost"])->where("id","[0-9]+");

Route::get('/movimientos/vigilante/{id}/sucursales', [MovimientosController::class, 'vigilanteSucursalesGet'])->name('vigilante.sucursales')->where("id","[0-9]+");
Route::get('/movimientos/vigilante/{id}/sucursales/agregar', [MovimientosController::class, 'vigilanteSucursalesAgregar'])->name('vigilante.sucursales.agregar')->where("id","[0-9]+");
Route::post('/movimientos/vigilante/{id}/sucursales/agregar', [MovimientosController::class, 'vigilanteSucursalesAgregado'])->name('vigilante.sucursales.agregado')->where("id","[0-9]+");
Route::get('/movimientos/vigilante/{id}/sucursales/fechaFin', [MovimientosController::class, 'vigilanteSucursalesFechaFin'])->name('vigilante.sucursales.fechaFin')->where("id","[0-9]+");

Route::get('/catalogos/vigilante/data', 'CatalogosController@data');
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747

//--------------------- DELITOS ---------------------------------------------------------
Route::get ("/catalogos/delitos",[CatalogosController::class, "delitosGet"])->name('delitosGet');

Route::get("/catalogos/delitos/agregar",[CatalogosController::class, "delitoAgregarGet"]);
Route::post("/catalogos/delitos/agregar",[CatalogosController::class, "delitoAgregarPost"]);

<<<<<<< HEAD
//--------------------- SUCURSALES ---------------------------------------------------------------
Route::get ("/catalogos/sucursal",[CatalogosController::class, "sucursalGet"]);
=======
Route::get("catalogos/delitos/{id}/modificar",[CatalogosController::class, "delitoModificarGet"])->where("id","[0-9]+");
Route::post("catalogos/delitos/{id}/modificar",[CatalogosController::class, "delitoModificarPost"])->where("id","[0-9]+");
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747

Route::get ("/catalogos/delitos/{id}/desactivar",[CatalogosController::class, "delitoDesactivar"])->where("id","[0-9]+");
Route::get("/catalogos/delitos/inactivos", [CatalogosController::class, "delitosInactivos"]);
Route::get ("/catalogos/delitos/{id}/activar",[CatalogosController::class, "delitoActivar"])->where("id","[0-9]+");

<<<<<<< HEAD
Route::get ("/catalogos/sucursal/{id}/eliminar",[CatalogosController::class, "sucursalEliminar"])->where("id","[0-9]+");
Route::get("/catalogos/sucursal/eliminada", [CatalogosController::class, 'sucursalEliminada']);
Route::get ("/catalogos/sucursal/{id}/activar",[CatalogosController::class, "sucursalActivar"])->where("id","[0-9]+");
=======
Route::get('/reportes/delitosPorPeriodo', [ReportesController::class, 'delitosPorPeriodoGet']);
Route::post('/reportes/delitosPorPeriodo', [ReportesController::class, 'delitosPorPeriodoPost']);
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747

//--------------------- CONTRATOS ---------------------------------------------------------
Route::get ("/catalogos/contratos",[CatalogosController::class, "contratosGet"])->name('contratosGet');

Route::get("/catalogos/contratos/agregar",[CatalogosController::class, "contratoAgregarGet"]);
Route::post("/catalogos/contratos/agregar",[CatalogosController::class, "contratoAgregarPost"]);

Route::get("catalogos/contratos/{id}/modificar",[CatalogosController::class, "contratoModificarGet"])->where("id","[0-9]+");
Route::post("catalogos/contratos/{id}/modificar",[CatalogosController::class, "contratoModificarPost"])->where("id","[0-9]+");

Route::get("catalogos/contratos/{id}/finalizar",[CatalogosController::class, "contratoFinalizarGet"])->where("id","[0-9]+");
Route::get("/catalogos/contratos/finalizados",[CatalogosController::class, "contratosFinalizadosGet"]);

//--------------------- CASOS ---------------------------------------------------------
Route::get ("/catalogos/caso",[CatalogosController::class, "casoGet"]);

Route::get("/catalogos/caso/agregar",[CatalogosController::class, "casoAgregarGet"]);
Route::post ("/catalogos/caso/agregar",[CatalogosController::class, "casoAgregarPost"]);

Route::get("/catalogos/caso/{id}/detalles",[CatalogosController::class, "casoDetallesGet"])->where("id","[0-9]+");

Route::get("/catalogos/caso/{id}/modificar",[CatalogosController::class, "casoModificarGet"])->where("id","[0-9]+");
Route::post("/catalogos/caso/{id}/modificar",[CatalogosController::class, "casoModificarPost"])->where("id","[0-9]+");

//--------------------- VIGILANTES ---------------------------------------------------------
Route::get ("/catalogos/vigilante",[CatalogosController::class, "vigilanteGet"])->name('vigilanteGet');

Route::get ("/catalogos/vigilante/{id}/eliminar",[CatalogosController::class, "vigilanteEliminar"])->where("id","[0-9]+");
Route::get ("/catalogos/vigilante/{id}/activar",[CatalogosController::class, "vigilanteActivar"])->where("id","[0-9]+");
Route::get("/catalogos/vigilante/eliminado", [CatalogosController::class, 'vigilanteEliminado']);

Route::get("/catalogos/vigilante/agregar",[CatalogosController::class, "vigilanteAgregarGet"]);
Route::post("/catalogos/vigilante/agregar",[CatalogosController::class, "vigilanteAgregarPost"]);

Route::get("/catalogos/vigilante/{id}/modificar",[CatalogosController::class, "vigilanteModificarGet"])->where("id","[0-9]+");
Route::post("/catalogos/vigilante/{id}/modificar",[CatalogosController::class, "vigilanteModificarPost"])->where("id","[0-9]+");

Route::get('/movimientos/vigilante/{id}/sucursales', [MovimientosController::class, 'vigilanteSucursalesGet'])->name('vigilante.sucursales')->where("id","[0-9]+");
Route::get('/movimientos/vigilante/{id}/sucursales/agregar', [MovimientosController::class, 'vigilanteSucursalesAgregar'])->name('vigilante.sucursales.agregar')->where("id","[0-9]+");
Route::post('/movimientos/vigilante/{id}/sucursales/agregar', [MovimientosController::class, 'vigilanteSucursalesAgregado'])->name('vigilante.sucursales.agregado')->where("id","[0-9]+");
Route::get('/movimientos/vigilante/{id}/sucursales/fechaFin', [MovimientosController::class, 'vigilanteSucursalesFechaFin'])->name('vigilante.sucursales.fechaFin')->where("id","[0-9]+");

Route::get('/catalogos/vigilante/data', 'CatalogosController@data');

//--------------------- DELITOS ---------------------------------------------------------
Route::get ("/catalogos/delitos",[CatalogosController::class, "delitosGet"])->name('delitosGet');

Route::get("/catalogos/delitos/agregar",[CatalogosController::class, "delitoAgregarGet"]);
Route::post("/catalogos/delitos/agregar",[CatalogosController::class, "delitoAgregarPost"]);

Route::get("catalogos/delitos/{id}/modificar",[CatalogosController::class, "delitoModificarGet"])->where("id","[0-9]+");
Route::post("catalogos/delitos/{id}/modificar",[CatalogosController::class, "delitoModificarPost"])->where("id","[0-9]+");

Route::get ("/catalogos/delitos/{id}/desactivar",[CatalogosController::class, "delitoDesactivar"])->where("id","[0-9]+");
Route::get("/catalogos/delitos/inactivos", [CatalogosController::class, "delitosInactivos"]);
Route::get ("/catalogos/delitos/{id}/activar",[CatalogosController::class, "delitoActivar"])->where("id","[0-9]+");

Route::get('/reportes/delitosPorPeriodo', [ReportesController::class, 'delitosPorPeriodoGet']);
Route::post('/reportes/delitosPorPeriodo', [ReportesController::class, 'delitosPorPeriodoPost']);

//--------------------- CONTRATOS ---------------------------------------------------------
Route::get ("/catalogos/contratos",[CatalogosController::class, "contratosGet"])->name('contratosGet');

Route::get("/catalogos/contratos/agregar",[CatalogosController::class, "contratoAgregarGet"]);
Route::post("/catalogos/contratos/agregar",[CatalogosController::class, "contratoAgregarPost"]);

Route::get("catalogos/contratos/{id}/modificar",[CatalogosController::class, "contratoModificarGet"])->where("id","[0-9]+");
Route::post("catalogos/contratos/{id}/modificar",[CatalogosController::class, "contratoModificarPost"])->where("id","[0-9]+");

Route::get("catalogos/contratos/{id}/finalizar",[CatalogosController::class, "contratoFinalizarGet"])->where("id","[0-9]+");
Route::get("/catalogos/contratos/finalizados",[CatalogosController::class, "contratosFinalizadosGet"]);

//--------------------- CASOS ---------------------------------------------------------
Route::get ("/catalogos/caso",[CatalogosController::class, "casoGet"]);

Route::get("/catalogos/caso/agregar",[CatalogosController::class, "casoAgregarGet"]);
Route::post ("/catalogos/caso/agregar",[CatalogosController::class, "casoAgregarPost"]);

Route::get("/catalogos/caso/{id}/detalles",[CatalogosController::class, "casoDetallesGet"])->where("id","[0-9]+");

Route::get("/catalogos/caso/{id}/modificar",[CatalogosController::class, "casoModificarGet"])->where("id","[0-9]+");
Route::post("/catalogos/caso/{id}/modificar",[CatalogosController::class, "casoModificarPost"])->where("id","[0-9]+");

//-------------------- REPORTES ---------------------------------------------------------------
Route::get ("/reportes",[ReportesController::class, "indexGet"]);

Route::get ("/reportes/casosPeriodo",[ReportesController::class, "casosPeriodoGet"]);
Route::get('/reportes/grafica-casos-periodo', [ReportesController::class, 'graficaCasosPeriodo'])->name('grafica-casos-periodo');

Route::get ("/reportes/contratosSucursal",[ReportesController::class, "contratosSucursalGet"]);

Route::get ("/reportes/infoEntidad",[ReportesController::class, "infoEntidadGet"]);
Route::get('/reportes/graficaInfoEntidad', [ReportesController::class, 'graficaInfoEntidad']);
Route::get('/reportes/graficaInfoEntidad', [ReportesController::class, 'graficaInfoEntidad'])->name('graficaInfoEntidad');

Route::get('/reportes/casosPeriodoPDF', [ReportesController::class, "casosPeriodoPDF"])->name('casosPeriodoPDF');
Route::get('/reportes/infoEntidadPDF', [ReportesController::class, "infoEntidadPDF"])->name('infoEntidadPDF');

Route::get('/reportes/delitosPorPeriodoPDF', [ReportesController::class, "delitosPorPeriodoPDF"])->name('delitosPorPeriodoPDF');
Route::get('/reportes/visualizarPdfDelitos', [ReportesController::class, 'visualizarPdfDelitos'])->name('visualizarPdfDelitos');

Route::get('/reportes/delitos_mas_ocurridos', [ReportesController::class, 'mostrarFormulario'])->name('reportes.delitos_mas_ocurridos');
Route::post('/reportes/delitos_mas_ocurridos', [ReportesController::class, 'procesarSolicitud'])->name('reportes.delitos_mas_ocurridos.resultados');


//VISUALIZAR PDF
Route::get('/reportes/casosPeriodoVisualizarPdf', [ReportesController::class, 'visualizarPdfCasos'])->name('visualizarPDF');

Route::get('/reportes/infoEntidadVisualizarPdf', [ReportesController::class, 'infoEntidadVisualizarPdf'])->name('visualizarPDFEntidad');


//Iniciar sesión
Route::get('/', [LoginController::class, 'showLoginForm'])->name('root');
//Cerrar sesión
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

