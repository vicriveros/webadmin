@php
    $fields_array = explode(",", $fields);
@endphp   
    <div class="card mb-3">
        <div class="card-header text-white bg-primary"> <h4> Listado de {{ $name }} </h4></div>
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $name }} </li>
                </ol>
            </nav>
            <div class="row justify-content-center"> 
                <div class="col-4 mb-2 text-center"> 
                    <a href="{{ route('marcas.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Agregar</a>
                </div>
            </div>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            
            <div class="table-responsive">
                <table class="table table-striped table-hover datatable-id" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            @foreach($fields_array as $item)
                                <th> {{ ucfirst($item) }} </th>
                            @endforeach
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>