<x-app-layout>
    <x-slot name="header"> </x-slot>
    <x-list-body : name='Productos' fields='nombre,codigo,precio,destacar,publicar'/>
</x-app-layout>

<script type="text/javascript">
    $(function () {
        var table = $('.datatable-id').DataTable({
            language: { url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/es-ar.json' },
            processing: true,
            serverSide: true,
            ajax: "{{ route('productos.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nombre',
                    name: 'nombre'
                },
                {
                    data: 'codigo',
                    name: 'codigo'
                },
                {
                    data: 'precio',
                    name: 'precio'
                },
                {
                    data: 'destacar',
                    name: 'destacar'
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