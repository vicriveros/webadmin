<x-app-layout>
    <x-slot name="header"> </x-slot>
    <div class="card mb-3">
        <div class="card-header text-white bg-primary"> <h4> Editar Marca </h4></div>
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Marcas </li>
                </ol>
            </nav>
            
            <div class="container">
                
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card border">

                            <div class="card-body">
                                <div class="row mb-3 justify-content-center">
                                    <div class="form-group col-2 me-4">    
                                        <form action="{{ route('marcas.destroy', $marca) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Confirma la eliminacion de este item?')"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                        </form>
                                    </div>
                                    <div class="form-group col-2">
                                    <form action="{{ route('marcas.update', $marca) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                                    </div>
                                </div>

                                <x-input-text name="nombre" :model=$marca/>
                                <x-input-textarea name="texto" :model=$marca/>
                                <x-input-radio-sino name="habilitar" :model=$marca/>
                                <x-input-radio-sino name="publicar" :model=$marca/>

                            </form>
                            </div> <!-- card body -->
                        </div>
                    </div> <!-- col-8 -->
                </div><!-- container -->
                
            </div>
            
        </div>
    </div>

    <script>
        tinymce.init({
            selector: 'textarea',
            menubar: false,
        });
    </script>
</x-app-layout>