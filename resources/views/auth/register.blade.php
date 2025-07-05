<x-layout>
    <x-slot:title>Registro</x-slot:title>

    <h1 class="mb-4">Crear una cuenta</h1>

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Registrarse</button>
    </form>

    <p class="mt-3">¿Ya tenés cuenta? <a href="{{ route('auth.login') }}">Iniciar sesión</a></p>
</x-layout>
