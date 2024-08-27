@extends('layouts.dashboard')
@section('nameModule', 'Herramientas')

@section('content')
    <div class="user-cards">
        @foreach ($tools as $tool)
            <div class="user-card">
                <div class="user-card-content">
                    <h3>Nombre: {{ $tool->nombre }}</h3>
                    <p>Marca: {{ $tool->marca }}</p>
                    <p>Cantidad: {{ $tool->cantidad }}</p>
                    <p>Precio: {{ $tool->precio }}</p>
                    <p>Estado: {{ ucfirst(strtolower($tool->estado)) }}</p>
                    <p hidden>id: {{ $tool->id }}</p>
                </div>
                <div class="user-card-actions">
                    <button class="edit-btn">Editar</button>
                    <button class="delete-btn">Eliminar</button>
                    <form method="POST" action="{{ url('tools/' . $tool->id) }}" style="display: none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('formCreate')
    <form method="POST" id="crearForm" action="{{ route('tools.store') }}">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required>

        <div>
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn">Guardar</button>
    </form>
@endsection

@section('formEdit')
    <form method="POST" id="editForm" action="" data-action-base="{{ url('tools/') }}">
        @csrf
        @method('PUT')

        <input type="hidden" id="edit_id" name="id" value="">

        <label for="nombre">Nombre:</label>
        <input type="text" id="edit_nombre" name="nombre" required>

        <label for="marca">Marca:</label>
        <input type="text" id="edit_marca" name="marca" required>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="edit_cantidad" name="cantidad" required>

        <label for="precio">Precio:</label>
        <input type="number" id="edit_precio" name="precio" required>


            <label for="estado">Estado:</label>
            <select id="edit_estado" name="estado" required>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>


        <div class="modal-actions">
            <button type="submit" class="save-btn">Actualizar</button>
            <button type="button" class="cancel-btn">Cancelar</button>
        </div>
    </form>
@endsection

@section('js')

    <script>
        $('div').on('click', '.delete-btn', function() {
            $nombre = $(this).parent().parent().find('h3').text().split(":").pop().trim();

            Swal.fire({
                title: "¿Realmente quiere eliminar a " + $nombre + "?",
                text: "¡Este proceso es irrevercible!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminalo!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).next().submit();
                }
            });
        });

        // reconocer el cambio de tecla de búsqueda
        $('#qsearch').on('keyup', function(e) {
            e.preventDefault();
            $query = $(this).val();
            $token = $('input[name=_token]').val();

            $.post('tools/search', 
                {
                    q: $query,
                    _token: $token
                },
                function(data) {
                    $('.content').empty().append(data);
                }
            )
        });
    </script>

@endsection
