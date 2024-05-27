@extends("components.layout")
@section("content")
    @component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
    @endcomponent
    <style>
        .table-container {
            max-height: 500px;
            overflow-y: auto;
        }
        .btn-sm {
            margin-right: 5px;
        }
    </style>
    <div class="row my-4">
        <div class="col">
            <h1>Contratos finalizados</h1>
        </div>
    </div>

    <div class="table-container">
        <table class="table table-striped" id="maintable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">SUCURSAL</th>
                    <th scope="col">VIGILANTE</th>
                    <th scope="col">ARMADO</th>
                    <th scope="col">FECHA INICIO</th>
                    <th scope="col">FECHA FIN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contratos as $contrato)
                <tr>
                    <td class="text-center">{{$contrato->idVigilanteSucursal}}</td>
                    <td>
                        @php 
                            $sucursal = \App\Models\Sucursal::find($contrato->fkIDSucursal);
                        @endphp
                        {{ $sucursal->nombre }}
                    </td>
                    <td>
                        @php 
                            $vigilante = \App\Models\Vigilante::find($contrato->fkIDVigilante);
                        @endphp
                        {{ $vigilante->nombre }}
                    </td>
                    <td class="text-center">{{$contrato->armado ? 'SI' : 'NO'}}</td>
                    <td class="text-center">{{$contrato->fechaInicio}}</td>
                    <td class="text-center">{{$contrato->fechaFin}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <script>
        $(document).ready(function(){
            $('#maintable').DataTable({
                paging: true,
                searching: true
            });
        });
    </script>

@endsection