<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\Vigilante;
use App\Models\entidadBancaria;
use App\Models\Caso;
use App\Models\vigilanteSucursal;
use App\Models\Delito;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CatalogosController extends Controller
{
    public function home(): View
    {
        return view('home', ["breadcrumbs" => []]);
    }

//----------------------- ENTIDADES BANCARIAs -----------------------------------------------------------------------
<<<<<<< HEAD
=======

//----------------------- ENTIDADES BANCARIAs -----------------------------------------------------------------------
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
    public function entidadBancariaGet(): View
    {
        $entidadBancaria = entidadBancaria::where('estado', 1)->get();
        return view('catalogos/entidadBancariaGet', [
            'entidadBancaria' => $entidadBancaria,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Entidades Bancarias" => url("/catalogos/entidadBancaria")
            ]
        ]);
    }

    public function entidadBancariaEliminar($idEntidadBancaria)
    {
        $entidadEliminar = entidadBancaria::findOrFail($idEntidadBancaria);
        $entidadEliminar -> estado = 0;
        $entidadEliminar -> save();

        $sucursales = Sucursal::where('fkIDEntidadBancaria', $idEntidadBancaria)->get();

        foreach($sucursales as $sucursal){
            	$sucursal -> estado = 0;
            	$sucursal -> save();

            	$contratos = vigilanteSucursal::where('fkIDSucursal', $sucursal->idSucursal)->whereNull('fechaFin')->get();
            	foreach($contratos as $contrato){
                	$contrato -> fechaFin = Carbon::now()->toDateString();
                	$contrato -> save();
            	}
        }

        return redirect()->back()->with('success', 'Entidad eliminada con éxito.');
    }

    public function entidadBancariaEliminada()
    {
        $entidadesInactivas = entidadBancaria::where('estado', 0)->get();
        return view('catalogos.entidadBancariaEliminada', [
            "entidadesInactivas" => $entidadesInactivas,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Entidades Bancarias" => url("/catalogos/entidadBancaria"),
<<<<<<< HEAD
                "Inactivas" => url("/catalogos/entidadBancaria/eliminada")
=======
                "Inactivas" => url("/catalogos/entidadBancaria/eliminada"),
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
            ]
        ]);
    }

    public function entidadBancariaActivar($idEntidadBancaria)
    {
        $entidadActivar = entidadBancaria::findOrFail($idEntidadBancaria);
        $entidadActivar -> estado = 1;
        $entidadActivar -> save();
        return redirect()->back()->with('success', 'Entidad reactivada con éxito.');
    }

    public function entidadBancariaAgregarGet(): View
    {
        $entidad=entidadBancaria::all();
        return view('catalogos/entidadBancariaAgregarGet', [
            "entidadBancaria"=>$entidad,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Entidades Bancarias" => url("/catalogos/entidadBancaria"),
                "Agregar" => url("/catalogos/entidadBancariaAgregarGet/agregar")
            ]
        ]);
    }

    public function entidadBancariaAgregarPost(Request $request)
    {
        $nombre = $request -> input("nombre");
        $calle= $request -> input("calle");
        $noExt= $request -> input("num_ext");
        $noInt= $request -> input("num_int");
        $colonia= $request -> input("colonia");
        $cp= $request -> input("cp");
        $ciudad= $request -> input("ciudad");
        $provincia= $request -> input("provincia");

        $entidad = new entidadBancaria([
            "nombre" => strtoupper($nombre),
            "calle" => $calle,
            "noExterior" => $noExt,
            "noInterior" => $noInt,
            "colonia" => strtoupper($colonia),
            "cp" => $cp,
            "ciudad" => strtoupper($ciudad),
            "provincia" => strtoupper($provincia),
        ]);  
        
        $entidad -> save();
        return redirect("/catalogos/entidadBancaria")->with('success', 'Entidad agregada correctamente.');
    }

    public function entidadBancariaModificarGet(Request $request, $idEntidadBancaria): view
    {
        $entidadBancaria = entidadBancaria::find($idEntidadBancaria);

        return view('/catalogos/entidadBancariaModificarGet',[
            "entidadBancaria" => $entidadBancaria,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Entidades Bancarias" => url("/catalogos/entidadBancaria"),
                "Modificar" => url("/entidadBancaria/{id}/modificar")
            ]
        ]);
    }

    public function entidadBancariaModificarPost(Request $request, $idEntidadBancaria)
    {
        $entidadBancaria = entidadBancaria::find($idEntidadBancaria);

        $entidadBancaria->nombre = $request->input("nombre");
        $entidadBancaria->calle = $request->input("calle");
        $entidadBancaria->noExterior = $request->input("noExterior");
        $entidadBancaria->noInterior = $request->input("noInterior");
        $entidadBancaria->colonia = $request->input("colonia");
        $entidadBancaria->cp = $request->input("cp");
        $entidadBancaria->ciudad = $request->input("ciudad");
        $entidadBancaria->provincia = $request->input("provincia");

        $entidadBancaria->save();

        return redirect("catalogos/entidadBancaria");
    }
    
//-------------------- SUCURSALES ----------------------------------------------------------
<<<<<<< HEAD
=======
    
//-------------------- SUCURSALES ----------------------------------------------------------
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
    public function sucursalGet(): View
    {
        $sucursal = Sucursal::where('estado', 1)->get();
        return view('catalogos/sucursalGet', [
            'sucursal' => $sucursal,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Sucursal" => url("/catalogos/sucursal")
            ]
        ]);
    }
    public function sucursalAgregarGet(): View
    {
        $entidadesBancarias = entidadBancaria::all();
        return view('catalogos/sucursalAgregarGet', [
            "entidad"=>$entidadesBancarias,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Sucursal" => url("/catalogos/sucursal"),
                "Agregar" => url("/catalogos/sucursal/agregar")
            ]
        ]);
    }
    
    public function sucursalAgregarPost(Request $request)
    {
        $nombre= $request -> input("nombre");
        $calle= $request -> input("calle");
        $noExt= $request -> input("noExt");
        $noInt= $request -> input("noInt");
        $colonia= $request -> input("colonia");
        $cp= $request -> input("cp");
        $ciudad= $request -> input("ciudad");
        $provincia= $request -> input("provincia");
        $noEmp= $request -> input("noEmpleados");
        $entidad= $request -> input("entidad");

        $sucursal = new Sucursal([
            "nombre" => strtoupper($nombre),
            "calle" => strtoupper($calle),
            "noExterior" => $noExt,
            "noInterior" => $noInt,
            "colonia" => strtoupper($colonia),
            "cp" => $cp,
            "ciudad" => strtoupper($ciudad),
            "provincia" => strtoupper($provincia),
            "noEmpleados" => $noEmp,
            "fkIDEntidadBancaria" => $entidad
        ]);
        $sucursal -> save();
        return redirect("/catalogos/sucursal")->with('success', 'Sucursal agregada correctamente.');
    }

    public function sucursalEliminar($idSucursal)
    {
        $sucursalEliminar = Sucursal::findOrFail($idSucursal);
        $sucursalEliminar -> estado = 0;
        $sucursalEliminar -> save();

        $contratos = vigilanteSucursal::where('fkIDSucursal', $idSucursal)->whereNull('fechaFin')->get();
        foreach($contratos as $contrato){
            $contrato -> fechaFin = Carbon::now()->toDateString();
            $contrato -> save();
        }

        return redirect()->back()->with('success', 'Sucursal eliminada con éxito.');
    }

    public function sucursalEliminada(): View
    {
        $sucursalesInactivas = Sucursal::where('estado', 0)->get();

        return view('catalogos.sucursalEliminada', [
            "sucursalesInactivas" => $sucursalesInactivas,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Sucursales" => url("/catalogos/sucursal"),
<<<<<<< HEAD
                "Inactivas" => url("/catalogos/sucursal/eliminada")
=======
                "Inactivas" => url("/catalogos/sucursal/eliminada"),
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
            ]
        ]);
    }

    public function sucursalActivar($idSucursal)
    {
        $sucursalActivar = Sucursal::findOrFail($idSucursal);
        $sucursalActivar -> estado = 1;
        $sucursalActivar -> save();
        
        return redirect()->back()->with('success', 'Sucursal reactivada con éxito.');
    }

    public function sucursalModificarGet(Request $request, $idSucursal)
    {
        // Obtener la sucursal
        $sucursal = Sucursal::find($idSucursal);
    
        // Obtener todas las entidades bancarias
        $entidad = EntidadBancaria::all(); // Suponiendo que tu modelo se llame EntidadBancaria
    
        // Pasar las variables a la vista
        return view("catalogos/sucursalModificarGet", [
            "sucursal" => $sucursal,
            "entidad" => $entidad, // Pasar la variable $entidades a la vista
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Sucursal" => url("/catalogos/sucursal"),
                "Modificar" => url("/sucursal/{id}/modificar")
            ]
        ]);
    }
    
    public function sucursalModificarPost(Request $request, $idSucursal)
    {
        
        $sucursal=Sucursal::find($idSucursal);
        $sucursal->nombre=$request->input("nombre");              
        $sucursal->calle=$request->input("calle");
        $sucursal->noExterior=$request->input("noExterior");
        $sucursal->noInterior=$request->input("noInterior");
        $sucursal->colonia=$request->input("colonia");
        $sucursal->cp=$request->input("cp");
        $sucursal->ciudad=$request->input("ciudad");
        $sucursal->provincia=$request->input("provincia");
        $sucursal->noEmpleados=$request->input("noEmpleados");
        $sucursal->fkIDEntidadBancaria=$request->input("fkIDEntidadBancaria");
        $sucursal->save();

        return redirect('/catalogos/sucursal')->with('success', 'Sucursal modificada correctamente.');
    }

//------------------- VIGILANTES -------------------------------------------------------------------------
    public function vigilanteGet(): View
    {
        $vigilante = Vigilante::where('estado', 1)->get();
        return view('catalogos/vigilanteGet', [
            'vigilante' => $vigilante,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Vigilantes" => url("/catalogos/vigilante")
            ]
        ]);
    }

    public function vigilanteEliminar($idVigilante)
    {
        $vigilanteEliminar = Vigilante::findOrFail($idVigilante);
        $vigilanteEliminar -> estado = 0;
        $vigilanteEliminar->save();

        $contratos = vigilanteSucursal::where('fkIDVigilante', $idVigilante)->whereNull('fechaFin')->get();
        foreach($contratos as $contrato){
            $contrato -> fechaFin = Carbon::now()->toDateString();
            $contrato -> save();
        }
        
        return redirect()->back()->with('success', 'Vigilante desactivado con éxito.');
    } 

    public function vigilanteEliminado(): View
    {
        $vigilantesInactivos = Vigilante::where('estado', 0)->get();

        return view('catalogos.vigilanteEliminado', [
            "vigilantesInactivos" => $vigilantesInactivos,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Vigilantes" => url("/catalogos/vigilante"),
                "Inactivos" => url("/catalogos/vigilante/eliminado")
            ]
        ]);
    }

    public function vigilanteActivar($idVigilante)
    {
        $vigilanteActivar = Vigilante::findOrFail($idVigilante);
        $vigilanteActivar -> estado = 1;
        $vigilanteActivar -> save();
  
        return redirect()->back()->with('success', 'Vigilante reactivado con éxito.');
    }

    public function vigilanteAgregarGet(): View
    {
        $sucursales = Sucursal::where('estado', 1)->get();
        return view('catalogos/vigilanteAgregarGet', [
            "sucursales" => $sucursales,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Vigilantes" => url("/catalogos/vigilante"),
                "Agregar" => url("/catalogos/vigilante/agregar")
            ]
        ]);
    }
    
    public function vigilanteAgregarPost(Request $request)
    {
        $vigilante = new Vigilante([
            "nombre" => strtoupper($request -> input("nombre")),
            "primerApellido" => strtoupper($request -> input("primerApellido")),
            "segundoApellido" => strtoupper($request -> input("segundoApellido")),
            "fechaNacimiento" => $request -> input("fechaNacimiento"),
            "telefono" => $request -> input("telefono")
        ]);  
        $vigilante -> save();

        return redirect("/catalogos/vigilante")->with('success', 'Vigilante agregado correctamente.');
    }

    public function vigilanteModificarGet($idVigilante): View
    {
        $vigilante = Vigilante::find($idVigilante);

        return view('/catalogos/vigilanteModificarGet',[
            "vigilante" => $vigilante,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Vigilantes" => url("/catalogos/vigilante"),
                "Modificar" => url("/catalogos/vigilante/{id}/modificar")
            ]
        ]);
    }

    public function vigilanteModificarPost(Request $request, $idVigilante)
    {
        $vigilante = Vigilante::findOrFail($idVigilante);

        $vigilante->nombre = $request->nombre;
        $vigilante->primerApellido = $request->primerApellido;
        $vigilante->segundoApellido = $request->segundoApellido;
        $vigilante->fechaNacimiento = $request->fechaNacimiento;
        $vigilante->telefono = $request->telefono;

        $vigilante->save();

        return redirect("catalogos/vigilante")->with('success', 'Vigilante modificado correctamente.');
    }

    public function vigilanteSucursalesGet(Request $request, $idVigilante)
    {
        $vigilante = Vigilante::findOrFail($idVigilante);
        $sucursales = vigilanteSucursal::where('fkIDVigilante', $idVigilante)->get();

        return view('/catalogos/vigilanteSucursalesGet',[
            "vigilante" => $vigilante,
            "sucursales" => $sucursales,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Vigilante" => url("catalogos/vigilante"),
                "Sucursales" => url("catalogos/vigilante/{id}/Sucursales")
            ]
        ]);
    }

    public function vigilanteSucursalesAgregar(Request $request, $idVigilante)
    {
        $vigilantes = Vigilante::findOrFail($idVigilante);
        $sucursales = Sucursal::all();

        return view('/catalogos/vigilanteSucursalesAgregar',[
            "vigilantes" => $vigilantes,
            "sucursales" => $sucursales,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Vigilante" => url("catalogos/vigilante"),
                "Sucursales" => url("catalogos/vigilante/{id}/sucursales"),
                "Agregar" => url("catalogos/vigilante/{id}/sucursales/agregar")
            ]
        ]);
    }

    public function vigilanteSucursalesAgregado(Request $request, $idVigilante)
    {
        $validator = Validator::make($request->all(), [
            'fkIDSucursal' => 'required',
            'armado' => 'required',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'nullable|date|after_or_equal:fechaInicio',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $nuevaSucursal = new vigilanteSucursal();
        $nuevaSucursal->fkIDSucursal = $request->input('fkIDSucursal');
        $nuevaSucursal->fkIDVigilante = $idVigilante;
        $nuevaSucursal->armado = $request->input('armado');
        $nuevaSucursal->fechaInicio = $request->input('fechaInicio');
        $nuevaSucursal->fechaFin = $request->input('fechaFin');

        $nuevaSucursal->save();

        return redirect()->route('vigilante.sucursales', ['id' => $idVigilante])->with('success', 'Sucursal agregada correctamente.');
    } 

//-------------------- DELITOS ------------------------------------------------------------

    public function delitosGet(): View
    {
        $delitos = Delito::where('estado', 1)->get();
        return view('catalogos/delitos/delitosGet', [
            'delitos' => $delitos,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Delitos" => url("/catalogos/delitos")
            ]
        ]);
    }

    public function delitoAgregarGet(): View
    {
        return view('catalogos/delitos/delitoAgregarGet', [
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Delitos" => url("/catalogos/delitos"),
                "Agregar" => url("/catalogos/delitos/agregar")
            ]
        ]);
    }
    
    public function delitoAgregarPost(Request $request)
    {
        $delito = new Delito([
            "nombre" => $request -> input("nombre")
        ]);
        $delito -> save();

        return redirect("/catalogos/delitos")->with('success', 'Delito agregado correctamente.');
    }

    public function delitoModificarGet($idDelito): View
    {
        $delito = Delito::find($idDelito);

        return view('/catalogos/delitos/delitoModificarGet',[
            "delito" => $delito,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Delitos" => url("/catalogos/delitos"),
                "Modificar" => url("/catalogos/delitos/{id}/modificar")
            ]
        ]);
    }

    public function delitoModificarPost(Request $request, $idDelito)
    {
        $delito = Delito::findOrFail($idDelito);

        $delito->nombre = $request->input('nombre');

        $delito->save();

        return redirect("catalogos/delitos")->with('success', 'Delito modificado correctamente.');
    }

    public function delitoDesactivar($idDelito)
    {
        $delito = Delito::findOrFail($idDelito);
        $delito -> estado = 0;
        $delito -> save();

        return redirect()->back()->with('success', 'Delito desactivado con éxito.');
    }

    public function delitosInactivos(): View
    {
        $delitos = Delito::where('estado', 0)->get();

        return view('/catalogos/delitos/delitosInactivosGet', [
            "delitos" => $delitos,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Delitos" => url("/catalogos/delitos"),
                "Inactivos" => url("/catalogos/delitos/inactivos")
            ]
        ]);
    }

    public function delitoActivar($idDelito)
    {
        $delito = Delito::findOrFail($idDelito);
        $delito -> estado = 1;
        $delito -> save();
        
        return redirect()->back()->with('success', 'Delito reactivado con éxito.');
    }


//-------------------- CONTRATOS ---------------------------------------------------------

    public function contratosGet(): View
    {
        $contratos = vigilanteSucursal::whereNull('fechaFin')->get();

        return view('catalogos/contratos/contratosGet', [
            'contratos' => $contratos,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Contratos" => url("/catalogos/contratos")
            ]
        ]);
    }

    public function contratoAgregarGet(): View
    {
        $sucursales = Sucursal::where('estado', 1)->get();

        $vigilantes = Vigilante::where('estado', 1)->get();

        return view('catalogos/contratos/contratoAgregarGet', [
            "sucursales" => $sucursales,
            "vigilantes" => $vigilantes,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Contratos" => url("/catalogos/contratos"),
                "Agregar" => url("/catalogos/contratos/agregar")
            ]
        ]);
    }

    public function contratoAgregarPost(Request $request)
    {
        $contrato = new vigilanteSucursal([
            "fkIDSucursal" => $request -> input("idSucursal"),
            "fkIDVigilante"=> $request -> input("idVigilante"),
            "armado" => $request -> input("armado"),
            "fechaInicio" => $request -> input("fechaInicio")
        ]);
        $contrato -> save();

        return redirect("/catalogos/contratos")->with('success', 'Contrato agregado correctamente.');
    }

    public function contratoModificarGet($idVigilanteSucursal): View
    {
        $contrato = vigilanteSucursal::find($idVigilanteSucursal);

        return view('/catalogos/contratos/contratoModificarGet',[
            "contrato" => $contrato,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Contratos" => url("/catalogos/contratos"),
                "Modificar" => url("/catalogos/contratos/{id}/modificar")
            ]
        ]);
    }

    public function contratoModificarPost(Request $request, $idVigilanteSucursal)
    {
        $contrato = vigilanteSucursal::findOrFail($idVigilanteSucursal);

        $contrato->armado = $request->armado;

        $contrato->save();

        return redirect("catalogos/contratos")->with('success', 'Contrato modificado correctamente.');
    }

    public function contratoFinalizarGet($idVigilanteSucursal)
    {
        $contrato = vigilanteSucursal::findOrFail($idVigilanteSucursal);
        $fechaActual = Carbon::now();
        $contrato->fechaFin = $fechaActual;

        $contrato->save();

        return redirect("catalogos/contratos")->with('success', 'Contrato finalizado correctamente.');
    }

    public function contratosFinalizadosGet(): View
    {
        $contratos = vigilanteSucursal::whereNotNull('fechaFin')->get();

        return view('catalogos/contratos/contratosFinalizadosGet', [
            'contratos' => $contratos,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Contratos" => url("/catalogos/contratos"),
                "Finalizados" => url("/catalogos/contratos/finalizados")
            ]
        ]);
    }

//-------------------- CASOS ------------------------------------------------------------
    public function casoGet(): View
    {
        $casos = Caso::all();
        return view('catalogos/casoGet', [
            'casos' => $casos,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Casos" => url("/catalogos/caso")
            ]
        ]);
    }

    public function casoAgregarGet(): View
    {
        $delitos = Delito::where('estado', 1)->get();
        $sucursales = Sucursal::where('estado', 1)->get();
        return view('catalogos/casoAgregarGet', [
            "sucursales"=>$sucursales,
            "delitos"=>$delitos,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Casos" => url("/catalogos/caso"),
                "Agregar" => url("/catalogos/caso/agregar")
            ]
        ]);
    }

    public function casoAgregarPost(Request $request)
    {
        $delito = $request->input("delito");
        $descripcion = $request->input("descripcion");
        $fecha = $request->input("fecha");
        $sucursal = $request->input("sucursal");
        $caso = new Caso([
            "fkIDDelito" => $delito,
            "descripcion" => $descripcion,
            "fecha" => $fecha,
            "fkIDSucursal" => $sucursal
        ]);
        $caso->save();
        return redirect("/catalogos/caso")->with('success', 'Caso agregado correctamente.'); //Redirige al listado de casos
    }

    public function casoDetallesGet($idCaso): View
    {
        $caso = Caso::findOrFail($idCaso);

        return view('/catalogos/casoDetallesGet',[
            "caso" => $caso,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Caso" => url("/catalogos/caso"),
                "Detalles" => url("/catalogos/caso/{id}/detalles")
            ]
        ]);
    }

    public function casoModificarGet($idCaso): View
    {
        $caso = Caso::findOrFail($idCaso);

        $delitos = Delito::where('estado', 1)->get();

        return view('/catalogos/casoModificarGet',[
            "caso" => $caso,
            "delitos" => $delitos,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Caso" => url("/catalogos/caso"),
                "Modificar" => url("/catalogos/caso/{id}/modificar")
            ]
        ]);
    }

    public function casoModificarPost(Request $request, $idCaso)
    {
        $caso = Caso::findOrFail($idCaso);

        $caso->fkIDDelito = $request->input("delito");
        $caso->descripcion = $request->input("descripcion");

        $caso->save();

        return redirect("catalogos/caso");
    }

    }