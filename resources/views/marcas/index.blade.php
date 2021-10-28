<x-app-layout>
    <x-slot name="header"> </x-slot>
    <div class="card mb-3">
        <div class="card-header text-white bg-primary"> <h4> Listado de Marcas </h4></div>
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Marcas</li>
                </ol>
            </nav>
            <div class="table-responsive">
                <table class="table table-striped table-hover datatable-id" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Habilitar</th>
                            <th>Publicar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<script type="text/javascript">
    $(function () {
        var table = $('.datatable-id').DataTable({
            language: { url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/es-ar.json' },
            processing: true,
            serverSide: true,
            ajax: "{{ route('marcas.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nombre',
                    name: 'nombre'
                },
                {
                    data: 'habilitar',
                    name: 'habilitar'
                },
                {
                    data: 'publicar',
                    name: 'publicar'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });

    });
</script>

</x-app-layout>