<x-layout>
    <x-slot:title>Editar Rol de Usuario</x-slot:title>

    <div class="container py-5">
        <h2>Editar rol de: {{ $user->name }}</h2>
        <form method="POST" action="{{ route('admin.users.updateRole', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="role" class="form-label">Rol</label>
                <select name="role" id="role" class="form-select">
                    <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Cliente</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Rol</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</x-layout>