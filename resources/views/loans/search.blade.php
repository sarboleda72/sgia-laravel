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
                <p>estado: {{ $loan->estado }}</p>
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