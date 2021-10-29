<x-app-layout>
    <x-slot name="header"> </x-slot>
    <x-list-body : name='Marcas' fields='nombre,habilitar,publicar'/>
</x-app-layout>

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