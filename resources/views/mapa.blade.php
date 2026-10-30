@extends ('layouts.layout')

@section('content')
    <div class="container">
        <div class="col" style="margin-top: 1rem;">
            <button id="btn_del">Delegaciones</button>
            <button id="btn_sec">Sectores</button>
            <button id="btn_cts">Cuadrantes</button>
            <button id="btn_todos">Mostrar Todos</button>
            <button id="btn_seleccion">Activar Selección</button>
            <button id="btn_limpiar">Limpiar Selección</button>
        </div>
        <div class="row">
            <div class="row" id="map"></div>
        </div>
        <div class="row">
            <table class="table-responsive m-4" id="tablaSeleccion" border="1">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Nombre</th>
                        <th>Lat</th>
                        <th>Lon</th>
                        <th>accion</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
<script type="text/javascript">
    $(document).ready(function() {
        //Buttons examples
        console.log("OK");
        var table = $('#tablaSeleccion').DataTable({
            lengthChange: true,
            keys: true,
            "order": [0, 'desc'],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            responsive: !0,
        });
    });
</script>
