<x-app-layout>
    <x-slot name="header"> </x-slot>
    <div class="card mb-3">
        <div class="card-header text-white bg-primary"> <h4> Crear Marca </h4></div>
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
                                    
                                    <div class="form-group col-2">
                                    <form action="{{ route('marcas.store') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label fw-bold">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nombre" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label fw-bold">Texto</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="texto" rows="3"> </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label fw-bold">Habilitar</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="habilitar" value="Si" checked>
                                            <label class="form-check-label" for="inlineRadio1">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="habilitar" value="No">
                                            <label class="form-check-label" for="inlineRadio1">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label fw-bold">Publicar</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="publicar" value="Si" checked>
                                            <label class="form-check-label">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="publicar" value="No">
                                            <label class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
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