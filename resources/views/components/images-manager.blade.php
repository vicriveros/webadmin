<div class="card border">
    <div class="card-body">
        <form action="{{ route('imagenes.store') }}" method="post">
        <div class="row mb-3">
            <div class="col-sm-12">
                <input type="file" class="filepond" name="img_file[]" multiple data-allow-reorder="true" data-max-file-size="5MB" data-max-files="5">
                <input type="hidden" name="relacion_tabla" value="{{ $relTabla }}">
                <input type="hidden" name="relacion_id" value="{{ $relId }}">
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

<script>
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