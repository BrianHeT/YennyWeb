<x-layout>
  <x-slot:title>Panel de Administración</x-slot:title>

  <h1 class="title is-2 my-4 has-text-centered">Usuarios Registrados</h1>

  <table class="table mt-6 is-fullwidth">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Administrador</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if($user->is_admin)
            <span class="tag is-success">Sí</span>
          @else
            <span class="tag is-dark">No</span>
          @endif
        </td>
        <td>
          <div class="buttons">
            <a href="/" class="button is-primary is-small">Ver</a>
            <a href="/" class="button is-dark is-small">Editar</a>
            <form action="/" method="POST" style="display:inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="button is-danger is-small" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</x-layout>