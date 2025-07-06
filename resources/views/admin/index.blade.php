<x-layout>
    <x-slot:title>Panel de Administración</x-slot:title>

    <div class="container py-5">
        <h1 class="mb-4">Dashboard Admin</h1>


        <!-- Sección Usuarios -->
        <h2>Usuarios</h2>
        <table class="table table-bordered">
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
                        <a href="{{ route('users.editRole', $user->id) }}" class="btn btn-sm btn-primary">Editar Rol</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
