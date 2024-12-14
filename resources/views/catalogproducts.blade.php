@extends('layout.backoffice')
@section('content')
<div class="row" style="margin: 10px;">
    <div class="col-6">
        <form id="formularioProducto">
            <section class="card">
                <div class="card-header" style="display: flex; justify-content: space-between;">
                    @if(!empty($product))
                    <h3>Actualizar Producto</h3>
                    <a href="{{asset('/')}}"><button type="button" class="btn btn-primary">Crear Producto</button></a>
                    @else
                    <h3>Crear Producto</h3>
                    @endif
                </div>
                <div class="card-body">
                    <div class="container">
                        <input type="hidden" name="id" id="id" value="{{$product['id'] ?? ''}}">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre Producto</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre del producto" value="{{$product['nombre'] ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Precio</label>
                            <input type="number" name="precio" class="form-control" id="precio" placeholder="precio del producto" value="{{$product['precio'] ?? ''}}">
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
                    </div>
                </div>
                <div class="card-footer">
                    @if(!empty($product))
                    <button type="button" class="btn btn-primary" id="aupdateProduct">Actualizar</button>
                    @else
                    <button type="button" class="btn btn-primary" id="crearProducto">Enviar</button>
                    @endif
                </div>
            </section>
        </form>
    </div>
    <div class="col-6">
        <section class="card">
            <div class="card-header">
                <h3>Productos Actuales</h3>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table borderless table-hover table-striped">
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
                                    <a href="{{url('backoffice/getProduct?idProduct=' . $product['id'])}}">
                                        <button type="button" class="btn btn-success">Editar</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{url('backoffice/deleteProduct?idProduct=' . $product['id'])}}">
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
        </section>
    </div>
</div>


<script>
    const botonCrear = document.getElementById('crearProducto');
    const botonUpdate = document.getElementById('aupdateProduct');
    const formularioProducto = document.getElementById('formularioProducto');

    jQuery("#crearProducto").on("click", async function() {
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

    jQuery("#aupdateProduct").on("click", async function() {
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
</script>
@endsection