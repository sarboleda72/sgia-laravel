<div class="user-cards">
    @forelse ($users as $user)
        <div class="user-card">
            <div class="user-card-content">
                <h3>Nombre completo: {{ $user->nombre_completo }} </h3>
                <p>Tipo de documento: {{ $user->tipo_documento }}</p>
                <p>Documento: {{ $user->documento }}</p>
                <p>Ficha ID: {{ $user->ficha_id }}</p>
                <p>Rol: {{ ucfirst(strtolower($user->rol)) }}</p>
                <p>Estado: {{ ucfirst(strtolower($user->estado)) }}</p>
                <p>Email: {{ $user->email }}</p>
                <p hidden>id: {{ $user->id }}</p>
            </div>
            <div class="user-card-actions">
                <button class="edit-btn">Editar</button>
                <button class="delete-btn">Eliminar</button>
                <form method="POST" action="{{ url('users/' . $user->id) }}" style="display: none">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    @empty
        <div class="user-card">
            <div class="user-card-content">
                <h3>No se encontraron usuarios.</h3>
            </div>
        </div>
    @endforelse
</div>