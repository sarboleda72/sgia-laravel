<div class="user-cards">
    @foreach ($tools as $tool)
        <div class="user-card">
            <div class="user-card-content">
                <h3>Nombre: {{ $tool->nombre }}</h3>
                <p>Marca: {{ $tool->marca }}</p>
                <p>Cantidad: {{ $tool->cantidad }}</p>
                <p>Precio: {{ $tool->precio }}</p>
                <p>Estado: {{ $tool->estado }}</p>
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