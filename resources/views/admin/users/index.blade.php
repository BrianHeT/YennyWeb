<x-layout>
    <x-slot:title>Usuarios</x-slot:title>

    <div class="container py-5">
        <h2>Listado de Usuarios</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>
                        <a href="{{ route('admin.users.editRole', $user->id) }}" class="btn btn-sm btn-primary">Editar Rol</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>