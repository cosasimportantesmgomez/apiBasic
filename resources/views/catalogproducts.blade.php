@extends('layout.backoffice')
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="container" style="margin: 20px;">
                <form id="formularioProducto">
                    <input type="hidden" name="id" id="id" value="{{$product["id"] ?? ""}}">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre Producto</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre del producto" value="{{$product["nombre"] ?? ""}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Precio</label>
                        <input type="number" name="precio" class="form-control" id="precio" placeholder="precio del producto" value="{{$product["precio"] ?? ""}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Categoria</label>
                        <select name="categoria" id="categoria" class="form-select">
                            <option value="">Seleccione una opcion</option>
                            @foreach($listCategories as $categorie) 
                                <option value="{{$categorie['id']}}">{{$categorie['nombre']}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if(!empty($product))
                        <button type="button" class="btn btn-primary" id="aupdateProduct">Actualizar</button>
                    @else
                        <button type="button" class="btn btn-primary" id="crearProducto">Enviar</button>
                    @endif
                </form>
            </div>
        </div>
        <div class="col-6">
            <div class="container" style="margin: 20px;">
                <table class="table borderless">
                    <thead>
                    <tr>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listProducts as $product)
                        <tr>
                            <td>
                                <a href="{{url('backoffice/getProduct?idProduct=' . $product["id"])}}">
                                    <button type="button" class="btn btn-info">Editar</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{url('backoffice/deleteProduct?idProduct=' . $product["id"])}}">
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </a>
                            </td>
                            <td>{{$product["nombre"]}}</td>
                            <td>{{$product["precio"]}}</td>
                            <td>{{$product["categoria"]}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        const botonCrear = document.getElementById('crearProducto');
        const botonUpdate = document.getElementById('aupdateProduct');
        const formularioProducto = document.getElementById('formularioProducto');

        jQuery("#crearProducto").on("click", async function () {
            const formData = new FormData(formularioProducto);
            resp = await axios.post('api/products/create', formData);

            if (resp.data.error === "0") {
                Swal.fire({
                    title: "Exito",
                    text: resp.data.mensaje,
                    icon: "success"
                });

                setTimeout(() => {
                    location.reload();
                }, "1500");
            } else {
                Swal.fire({
                    title: "Algo salio mal",
                    text: resp.data.mensaje,
                    icon: "error"
                });
            }
        });

        jQuery("#aupdateProduct").on("click", async function () {
            const formData = new FormData(formularioProducto);
            resp = await axios.post('api/products/update', formData);

            if (resp.data.error === "0") {
                Swal.fire({
                    title: "Exito",
                    text: resp.data.mensaje,
                    icon: "success"
                });
                setTimeout(() => {
                    location.reload();
                }, "1500");
            } else {
                Swal.fire({
                    title: "Algo salio mal",
                    text: resp.data.mensaje,
                    icon: "error"
                });
            }
        })

        // botonUpdate.addEventListener('click', updateProduct);
        // botonCrear.addEventListener('click', createProduct);
    </script>
@endsection
