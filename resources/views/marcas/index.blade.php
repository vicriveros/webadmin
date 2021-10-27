<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold"> Listado de Marcas </h2>
    </x-slot>

    <div class="card mb-3">
        <div class="card-header text-white bg-primary"> <h2> Header </h2></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>