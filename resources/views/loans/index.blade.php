@extends('layouts.dashboard')
@section('nameModule', 'Prestamos')

@section('content')
    <div class="user-cards">
        @foreach ($loans as $loan)
            <div class="user-card">
                <div class="user-card-content">
                    <h3>Nombre usuario : {{ $loan->user->nombre_completo}}</h3>
                    <p>Nombre herramienta: {{ $loan->tool->nombre }}</p>
                    <p>Marca: {{ $loan->tool->marca }}</p>
                    <p>fecha prestamo: {{ $loan->fecha_prestamo}}</p>
                    <p>fecha devolucion: {{ $loan->fecha_devolucion }}</p>
                    <p>fecha fin: {{  $loan->fecha_fin}}</p>
                    <p>estado:@if ($loan->estado == "1") Prestado @else Devuelto @endif</p>
                    <p hidden>id: {{ $loan->id }}</p>
                </div>
                <div class="user-card-actions">
                    <button class="edit-btn">Editar</button>
                    <button class="delete-btn">Eliminar</button>
                    <form method="POST" action="{{ url('loans/' . $loan->id) }}" style="display: none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('formCreate')
    <form method="POST" id="crearForm" action="{{ route('loans.store') }}">
        @csrf

        <label for="user_id">Usuario:</label>
        <select id="user_id" name="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->nombre_completo }}</option>
            @endforeach
        </select>

        <label for="tool_id">Herramienta:</label>
        <select id="tool_id" name="tool_id" required>
            @foreach ($tools as $tool)
                <option value="{{ $tool->id }}">{{ $tool->nombre }}</option>
            @endforeach
        </select>

        <div>
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn">Guardar</button>
    </form>
@endsection

@section('formEdit')
    <form method="POST" id="editForm" action="" data-action-base="{{ url('loans/') }}">
        @csrf
        @method('PUT')

        <input type="hidden" id="id" name="id" value="">

        <label for="nombre_usuario">Nombre usuario:</label>
        <input type="text" id="nombre_usuario" readonly>

        <label for="nombre_herramienta">Nombre herramienta:</label>
        <input type="text" id="nombre_herramienta" readonly>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" readonly>

        <label for="fecha_prestamo">Fecha prestamo:</label>
        <input type="date" id="fecha_prestamo" readonly>

        <label for="fecha_devolucion">Fecha devolucion:</label>
        <input type="date" id="fecha_devolucion" readonly>

        <label for="fecha_fin">Fecha fin:</label>
        <input type="date" id="fecha_fin" readonly>

            <label for="estado">Estado:</label>
            <select id="edit_estado" name="estado" required>
                <option value="1">Prestado</option>
                <option value="0">Devuelto</option>
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

            $.post('loans/search', 
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
