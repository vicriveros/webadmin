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

                                <x-input-text name='nombre'/>
                                <x-input-textarea name='texto'/>
                                <x-input-radio-sino name='habilitar'/>
                                <x-input-radio-sino name='publicar'/>
                                
                                
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