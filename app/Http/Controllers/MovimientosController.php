<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\Vigilante;
use App\Models\entidadBancaria;
use App\Models\Caso;
use App\Models\vigilanteSucursal;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class MovimientosController extends Controller
{
    public function vigilanteSucursalesGet(Request $request, $idVigilante)
    {
        $vigilante = Vigilante::findOrFail($idVigilante);
        $sucursales = vigilanteSucursal::where('fkIDVigilante', $idVigilante)->get();
        $infoSucursales = Sucursal::all();

        return view('movimientos/vigilanteSucursalesGet',[
            "vigilante" => $vigilante,
            "sucursales" => $sucursales,
            "infoSucursales" => $infoSucursales,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Vigilantes" => url("catalogos/vigilante"),
                "Sucursales" => url("movimientos/vigilante/{id}/Sucursales")
            ]
        ]);
    }

    public function vigilanteSucursalesAgregar($idVigilante): View
    {
        $vigilantes = Vigilante::findOrFail($idVigilante);
        $sucursales = Sucursal::where('estado', 1)->get();

        return view('movimientos/vigilanteSucursalesAgregar',[
            "vigilantes" => $vigilantes,
            "sucursales" => $sucursales,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Vigilantes" => url("catalogos/vigilante"),
                "Sucursales" => url("movimientos/vigilante/{$idVigilante}/sucursales"),
                "Agregar" => url("movimientos/vigilante/{id}/sucursales/agregar")
            ]
        ]);
    }

    public function vigilanteSucursalesAgregado(Request $request, $idVigilante)
    {
        $validator = Validator::make($request->all(), [
            'fkIDSucursal' => 'required',
            'armado' => 'required',
            'fechaInicio' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $nuevaSucursal = new vigilanteSucursal();
        $nuevaSucursal->fkIDSucursal = $request->input('fkIDSucursal');
        $nuevaSucursal->fkIDVigilante = $idVigilante;
        $nuevaSucursal->armado = $request->input('armado');
        $nuevaSucursal->fechaInicio = $request->input('fechaInicio');

        $nuevaSucursal->save();

        return redirect()->route('vigilante.sucursales', ['id' => $idVigilante])->with('success', 'Sucursal agregada correctamente.');
    }

    public function vigilanteSucursalesFechaFin($idVigilanteSucursal)
    {
        $sucursalFinalizar = vigilanteSucursal::findOrFail($idVigilanteSucursal);
        $fechaActual = Carbon::now();
        $sucursalFinalizar->fechaFin = $fechaActual;

        $sucursalFinalizar->save();

        return redirect()->route('vigilante.sucursales', ['id' => $sucursalFinalizar->fkIDVigilante])->with('success', 'Contrato finalizado correctamente.');
    }
}
