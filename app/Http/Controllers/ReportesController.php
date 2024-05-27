<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\EntidadBancaria;
use App\Models\Sucursal;
use App\Models\Vigilante;
use App\Models\vigilanteSucursal;
use App\Models\Delito;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Dompdf\Dompdf;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    public function indexGet(Request $request){
        return view("reportes.indexGet",[
            "breadcrumbs" => [
                "Inicio" =>url("/"),
                "Reportes" =>url("/Inicio/reportes")
            ]
        ]);
    }

    public function casosPeriodoGet(Request $request)
    {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');
        $casos = Caso::whereBetween('fecha', [$fechaInicio, $fechaFin])->get();
        
        foreach ($casos as $caso) {
            $sucursal = Sucursal::find($caso->fkIDSucursal);
            $caso->nombreSucursal = $sucursal ? $sucursal->nombre : 'Sin nombre';
        }

        return view('reportes/casosPeriodo', [
            'casos' => $casos,
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin,
            "breadcrumbs" =>[
                "Inicio"=>url("/"),
                "Reportes"=>url("/reportes"),
                "Casos Periodo" =>url("reportes/casosPeriodo")
            ]
        ]);
    }

    public function graficaCasosPeriodo(Request $request)
    {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');
    
        $breadcrumbs = [
            'Inicio' => url('/'),
            'Reportes' => url('/reportes'),
            'Gráfica' => url('/reportes/grafica-casos-periodo')
        ]; 
    
        // Obtener los casos por mes
        $casosPorMes = Caso::selectRaw('YEAR(fecha) as year, MONTH(fecha) as month, COUNT(*) as cantidad')
                            ->whereBetween('fecha', [$fechaInicio, $fechaFin])
                            ->groupBy('year', 'month')
                            ->orderBy('year')
                            ->orderBy('month')
                            ->get();
    
        return view('reportes.grafica-casos-periodo', compact('casosPorMes', 'breadcrumbs'));
    }
    

    public function casosPeriodoPDF(Request $request)
    {
        Carbon::setLocale('es');

        $fechaInicio = Carbon::parse($request->input('fechaInicio'));
        $fechaFin = Carbon::parse($request->input('fechaFin'));
        $fechaInicioF = $fechaInicio->isoFormat('MMMM D, YYYY');
        $fechaFinF = $fechaFin->isoFormat('MMMM D, YYYY');

        $casos = Caso::whereBetween('fecha', [$fechaInicio, $fechaFin])->get();
        
        $fechaActual = Carbon::now()->isoFormat('MMMM D, YYYY');
        
        // Convertir imagen a base64
        $path = public_path('images/LOGO_POLICIAL.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    
        $datos = [
            'casos' => $casos,
            'fechaInicio' => $fechaInicioF,
            'fechaFin' => $fechaFinF,
            'fechaActual' => $fechaActual,
            'logoDataUri' => $base64 // Añade esta línea
        ];
        
        $html = view('reportes.casosPeriodoPDF', $datos)->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        return $dompdf->stream('CasosEnElPeriodo.pdf');
    }
    
    
    public function visualizarPdfCasos(Request $request)
    {
        Carbon::setLocale('es');

        $fechaInicio = Carbon::parse($request->input('fechaInicio'));
        $fechaFin = Carbon::parse($request->input('fechaFin'));
        $fechaInicioF = $fechaInicio->isoFormat('MMMM D, YYYY');
        $fechaFinF = $fechaFin->isoFormat('MMMM D, YYYY');

        $casos = Caso::whereBetween('fecha', [$fechaInicio, $fechaFin])->get();
        
        $fechaActual = Carbon::now()->isoFormat('MMMM D, YYYY');
        
        // Convertir imagen a base64
        $path = public_path('images/LOGO_POLICIAL.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    
        // Opciones de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
    
        $datos = [
            'casos' => $casos,
            'fechaInicio' => $fechaInicioF,
            'fechaFin' => $fechaFinF,
            'fechaActual' => $fechaActual,
            'logoDataUri' => $base64 // Añade esta línea
        ];
        
        $html = view('reportes.casosPeriodoPDF', $datos)->render();
        $dompdf = new Dompdf($options); // Pasar opciones al constructor
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        return response()->make($dompdf->output(), 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="reporte_casos_periodo.pdf"');
    }

    public function infoEntidadGet(Request $request)
    {
        $entidadesBancarias = entidadBancaria::where('estado', 1)->get();
    
        $idEntidadBancaria = $request->input('idEntidadBancaria');
        $sucursales = Sucursal::where('fkIDEntidadBancaria', $idEntidadBancaria)->where('estado', 1)->get();

        $idsSucursales = $sucursales->pluck('idSucursal');
        $contratos = vigilanteSucursal::whereIn('fkIDSucursal', $idsSucursales)->whereNull('fechaFin')->get();

        $idsVigilantes = $contratos->pluck('fkIDVigilante');
        $vigilantes = Vigilante::whereIn('idVigilante', $idsVigilantes)->where('estado', 1)->get();

        return view('reportes/infoEntidad', [
            'entidadesBancarias' => $entidadesBancarias,
            'sucursales' => $sucursales,
            'contratos' => $contratos,
            'vigilantes' => $vigilantes,
            'idEntidadBancaria' => $idEntidadBancaria,
            "breadcrumbs" =>[
                "Inicio"=>url("/"),
                "Reportes"=>url("/reportes"),
                "Info EB" =>url("reportes/infoEntidad")
            ]
        ]);
    }


    public function graficaInfoEntidad(Request $request) 
    {
        $idEntidadBancaria = $request->input('idEntidadBancaria');
        $sucursales = Sucursal::select('calle', 'noEmpleados')
                            ->where('fkIDEntidadBancaria', $idEntidadBancaria)
                            ->get();
        
        $breadcrumbs = [
            'Inicio' => url('/'),
            'Reportes' => url('/reportes'),
            'Gráfica' => url('/reportes/graficaInfoEntidad')
        ];                            
        // Pasar los datos a la vista
        return view('reportes.graficaInfoEntidad', [
            'sucursales' => $sucursales,
            'breadcrumbs' => $breadcrumbs // Pasas la variable aquí
        ]);
    }

    public function infoEntidadPDF(Request $request)
    {
        $idEntidadBancaria = $request->input('idEntidadBancaria');
        $entidadBancaria = entidadBancaria::findOrFail($idEntidadBancaria);
        $sucursales = Sucursal::where('fkIDEntidadBancaria', $idEntidadBancaria)->where('estado', 1)->get();

        $idsSucursales = $sucursales->pluck('idSucursal');
        $contratos = vigilanteSucursal::whereIn('fkIDSucursal', $idsSucursales)->whereNull('fechaFin')->get();

        $idsVigilantes = $contratos->pluck('fkIDVigilante');
        $vigilantes = Vigilante::whereIn('idVigilante', $idsVigilantes)->where('estado', 1)->get();
        
        Carbon::setLocale('es');
        $fechaActual = Carbon::now()->isoFormat('MMMM D, YYYY');
    
        // Ruta al archivo de imagen en tu sistema de archivos.
        $path = public_path('images/LOGO_POLICIAL.png');
    
        // Asegúrate de que el archivo exista.
        $base64 = '';
        if (file_exists($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
    
        // Pasar la cadena DataURI a la vista, junto con los demás datos.
        $datos = [
            'sucursales' => $sucursales,
            'entidadBancaria' => $entidadBancaria,
            'contratos' => $contratos,
            'vigilantes' => $vigilantes,
            'fechaActual' => $fechaActual,
            'logoDataUri' => $base64 // Añade esta línea
        ];
    
        $html = view('reportes.infoEntidadPDF', $datos)->render();
    
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        return $dompdf->stream('infoEntidad.pdf');
    }

    //Función para visualizar el PDF en linea de Información Entidad Bancaria
    public function infoEntidadVisualizarPdf(Request $request)
    {
        $idEntidadBancaria = $request->input('idEntidadBancaria');
        $entidadBancaria = entidadBancaria::findOrFail($idEntidadBancaria);
        $sucursales = Sucursal::where('fkIDEntidadBancaria', $idEntidadBancaria)->where('estado', 1)->get();

        $idsSucursales = $sucursales->pluck('idSucursal');
        $contratos = vigilanteSucursal::whereIn('fkIDSucursal', $idsSucursales)->whereNull('fechaFin')->get();

        $idsVigilantes = $contratos->pluck('fkIDVigilante');
        $vigilantes = Vigilante::whereIn('idVigilante', $idsVigilantes)->where('estado', 1)->get();
        
        Carbon::setLocale('es');
        $fechaActual = Carbon::now()->isoFormat('MMMM D, YYYY');
    
        // Ruta al archivo de imagen en tu sistema de archivos.
        $path = public_path('images/LOGO_POLICIAL.png');
    
        // Asegúrate de que el archivo exista.
        $base64 = '';
        if (file_exists($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
    
        // Pasar la cadena DataURI a la vista, junto con los demás datos.
        $datos = [
            'sucursales' => $sucursales,
            'contratos' => $contratos,
            'vigilantes' => $vigilantes,
            'entidadBancaria' => $entidadBancaria,
            'fechaActual' => $fechaActual,
            'logoDataUri' => $base64 // Añade esta línea
        ];
    
        $html = view('reportes.infoEntidadPDF', $datos)->render();
    
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        return response()->make($dompdf->output(), 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="reporte_info_entidad.pdf"');
    }

    public function contratosSucursalGet(Request $request)
    {
        $entidadesBancarias = entidadBancaria::where('estado', 1)->get();

        $idEntidadBancaria = $request->input('idEntidadBancaria');
        $sucursales = collect(); // Inicializa una colección vacía de sucursales

        if ($idEntidadBancaria) {
            $sucursales = Sucursal::where('fkIDEntidadBancaria', $idEntidadBancaria)
                ->where('estado', 1)
                ->get();
        }

        $idSucursal = $request->input('idSucursal');
        $contratos = collect(); // Inicializa una colección vacía de contratos

        if ($idSucursal) {
            // Convierte la cadena en un array si es necesario
            $idSucursalArray = is_array($idSucursal) ? $idSucursal : explode(',', $idSucursal);
            $contratos = vigilanteSucursal::whereIn('fkIDSucursal', $idSucursalArray)->get();
        }

        $idsVigilantes = $contratos->pluck('fkIDVigilante');
        $vigilantes = Vigilante::whereIn('idVigilante', $idsVigilantes)->get();

        return view('reportes/contratosSucursal', [
            'entidadesBancarias' => $entidadesBancarias,
            'sucursales' => $sucursales,
            'contratos' => $contratos,
            'vigilantes' => $vigilantes,
            'idEntidadBancaria' => $idEntidadBancaria,
            'idSucursal' => $idSucursal,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Reportes" => url("/reportes"),
                "Contratos Sucursal" => url("reportes/contratosSucursal")
            ]
        ]);
    }
    public function delitosPorPeriodoGet(): View
    {
        return view('reportes/delitosPorPeriodo', [
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Reportes" => url("/reportes"),
                "Delitos por Periodo" => url("/reportes/delitosPorPeriodo")
            ]
        ]);
    }
    
    public function delitosPorPeriodoPost(Request $request): View
    {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');
    
        $delitos = Caso::whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->selectRaw('delito.nombre, COUNT(*) as total')
            ->join('delito', 'caso.fkIDDelito', '=', 'delito.idDelito')
            ->groupBy('delito.nombre')
            ->orderByDesc('total')
            ->get();
    
        return view('reportes/delitosPorPeriodo', [
            'delitos' => $delitos,
            "breadcrumbs" => [
                "Inicio" => url("/"),
                "Reportes" => url("/reportes"),
                "Delitos por Periodo" => url("/reportes/delitosPorPeriodo")
            ],
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin
        ]);
    }

    public function delitosPorPeriodoPDF(Request $request)
    {
        Carbon::setLocale('es');
        
        $fechaInicio = Carbon::parse($request->input('fechaInicio'));
        $fechaFin = Carbon::parse($request->input('fechaFin'));
        $fechaInicioF = $fechaInicio->isoFormat('MMMM D, YYYY');
        $fechaFinF = $fechaFin->isoFormat('MMMM D, YYYY');
    
        // Realizar la consulta en la tabla 'caso' y unirse a 'delito'
        $delitos = DB::table('caso')
            ->join('delito', 'caso.fkIDDelito', '=', 'delito.idDelito')
            ->whereBetween('caso.fecha', [$fechaInicio, $fechaFin])
            ->select('delito.nombre', DB::raw('COUNT(*) as total'))
            ->groupBy('delito.nombre')
            ->orderByDesc('total')
            ->get();
    
        
        $fechaActual = Carbon::now()->isoFormat('MMMM D, YYYY');

        // Convertir imagen a base64
        $path = public_path('images/LOGO_POLICIAL.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    
        $datos = [
            'delitos' => $delitos,
            'fechaInicio' => $fechaInicioF,
            'fechaFin' => $fechaFinF,
            'fechaActual' => $fechaActual,
            'logoDataUri' => $base64
        ];
    
        $html = view('reportes.delitosPorPeriodoPDF', $datos)->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        return $dompdf->stream('DelitosEnElPeriodo.pdf');
    }

    public function visualizarPdfDelitos(Request $request)
    {
        Carbon::setLocale('es');
        
        $fechaInicio = Carbon::parse($request->input('fechaInicio'));
        $fechaFin = Carbon::parse($request->input('fechaFin'));
        $fechaInicioF = $fechaInicio->isoFormat('MMMM D, YYYY');
        $fechaFinF = $fechaFin->isoFormat('MMMM D, YYYY');

        // Realizar la consulta en la tabla 'caso' y unirse a 'delito'
        $delitos = DB::table('caso')
            ->join('delito', 'caso.fkIDDelito', '=', 'delito.idDelito')
            ->whereBetween('caso.fecha', [$fechaInicio, $fechaFin])
            ->select('delito.nombre', DB::raw('COUNT(*) as total'))
            ->groupBy('delito.nombre')
            ->orderByDesc('total')
            ->get();

        
        $fechaActual = Carbon::now()->isoFormat('MMMM D, YYYY');

        // Convertir imagen a base64
        $path = public_path('images/LOGO_POLICIAL.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        // Opciones de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $datos = [
            'delitos' => $delitos,
            'fechaInicio' => $fechaInicioF,
            'fechaFin' => $fechaFinF,
            'fechaActual' => $fechaActual,
            'logoDataUri' => $base64
        ];

        $html = view('reportes.delitosPorPeriodoPDF', $datos)->render();
        $dompdf = new Dompdf($options); // Pasar opciones al constructor
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return response()->make($dompdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="reporte_delitos_periodo.pdf"');
    }
    public function mostrarFormulario()
    {
        $sucursales = Sucursal::all();
        $breadcrumbs = [
            'Inicio' => url('/'),
            'Reportes' => url('/reportes'),
            'Delitos más Ocurridos en Sucursal' => route('reportes.delitos_mas_ocurridos')
        ];

        return view('reportes.seleccionar_sucursal', compact('sucursales', 'breadcrumbs'));
    }

    // Procesar la solicitud y mostrar los resultados
    public function procesarSolicitud(Request $request)
        {
            $sucursalId = $request->input('sucursal_id');
            $sucursal = Sucursal::find($sucursalId);
            $entidadBancaria = $sucursal->entidadBancaria; // Asegúrate de que esta relación esté definida

            $resultados = Caso::select('fkIDDelito', \DB::raw('count(*) as total'))
                ->where('fkIDSucursal', $sucursalId)
                ->with('delito')
                ->groupBy('fkIDDelito')
                ->orderByDesc('total')
                ->take(5)
                ->get();

            $sucursales = Sucursal::all();
            $breadcrumbs = [
                'Inicio' => url('/'),
                'Reportes' => url('/reportes'),
                'Delitos más Ocurridos en Sucursal' => route('reportes.delitos_mas_ocurridos')
            ];

            return view('reportes.delitos_mas_ocurridos', compact('resultados', 'sucursal', 'entidadBancaria', 'sucursales', 'breadcrumbs'));
        }

}
    
