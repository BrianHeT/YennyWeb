<x-layout>
    <x-slot:title>Iniciar Sesion</x-slot:title>

    <h1 class="mb-3">Ingresar a tu cuenta</h1>

    <form action="{{ route('auth.authenticate') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck">
            <label class="custom-control-label" for="customCheck">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>

        <hr>
        <a href="#" class="btn btn-danger btn-block mb-2">
            <i class="fab fa-google me-2"></i> Iniciar con Google
        </a>
<hr>
        <a href="#" class="btn btn-primary btn-block">
            <i class="fab fa-facebook-f me-2"></i> Iniciar con Facebook
        </a>
    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="#">Olvidaste tu contraseña?</a>
    </div>
    <div class="text-center">
    <a class="small" href="{{ route('register') }}">Create una cuenta!</a>
</div>


    </form>

</x-layout>