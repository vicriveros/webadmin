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
            
            <div class="container-fluid">
                
                <div class="row justify-content-center">
                    <div class="col-md-8">
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

                    <div class="col-md-4">
                        <div class="card border">

                            <div class="card-body">
                                <form action="{{ route('imagenes.store') }}" method="post">
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <input type="file" class="filepond" name="img_file[]" multiple data-allow-reorder="true" data-max-file-size="5MB" data-max-files="5">
                                        <input type="hidden" name="relacion_tabla" value="marcas">
                                        <input type="hidden" name="relacion_id" value="{{ $marca->id}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        @csrf
                                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                                    </div>
                                </div>
                                </form>

                                <div class="row">
                                @foreach($imgs as $img)
                                    <div class="card col-lg-6 mb-2">
                                        <img src=" {{ url('storage/'.$img->url) }} " class="card-img-top" alt="...">
                                        <div class="row mt-1">
                                            <div class="col justify-content-center">
                                                <form action="{{ route('imagenes.update', $img->id) }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="order" value="up">
                                                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-arrow-left"></i> </button>
                                                </form>
                                            </div>
                                            <div class="col justify-content-center">
                                                <form action="{{ route('imagenes.destroy', $img->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirma la eliminacion de este item?')"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                            <div class="col justify-content-center">
                                                <form action="{{ route('imagenes.update', $img->id) }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="order" value="down">
                                                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-arrow-right"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>    
                                @endforeach
                                </div>
                            </div> <!-- card body -->
                        </div>
                    </div> <!-- col-4 -->

                </div><!-- container -->
                
            </div>
            
        </div>
    </div>

    <script>
        tinymce.init({
            selector: 'textarea',
            menubar: false,
        });

        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            server: {
                url: '/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token(); }}'
                }
            }
        });
    </script>
</x-app-layout>