<x-layout>
<x-slot:title>Editar Perfil</x-slot:title>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">
                        <i class="fas fa-edit"></i> Editar Perfil
                    </h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡Error!</strong> Por favor corrige los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="mb-3">Información Personal</h5>
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">
                                        <i class="fas fa-user"></i> Nombre *
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', $user->name) }}" 
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold">
                                        <i class="fas fa-envelope"></i> Email *
                                    </label>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email', $user->email) }}" 
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <hr class="my-4">

                                <h5 class="mb-3">Cambiar Contraseña</h5>
                                <p class="text-muted small">Deja estos campos vacíos si no quieres cambiar tu contraseña.</p>

                                <div class="mb-3">
                                    <label for="current_password" class="form-label fw-bold">
                                        <i class="fas fa-lock"></i> Contraseña Actual
                                    </label>
                                    <input type="password" 
                                           class="form-control @error('current_password') is-invalid @enderror" 
                                           id="current_password" 
                                           name="current_password"
                                           placeholder="Solo si quieres cambiar tu contraseña">
                                    @error('current_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bold">
                                        <i class="fas fa-key"></i> Nueva Contraseña
                                    </label>
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password"
                                           placeholder="Mínimo 8 caracteres">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label fw-bold">
                                        <i class="fas fa-key"></i> Confirmar Nueva Contraseña
                                    </label>
                                    <input type="password" 
                                           class="form-control" 
                                           id="password_confirmation" 
                                           name="password_confirmation"
                                           placeholder="Repite la nueva contraseña">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('profile.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Información adicional -->
            <div class="card mt-4">
                <div class="card-body">
                    <h6 class="card-title">
                        <i class="fas fa-info-circle text-info"></i> Información Importante
                    </h6>
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-check text-success"></i> Tu email se usa para notificaciones importantes</li>
                        <li><i class="fas fa-check text-success"></i> Las contraseñas deben tener al menos 8 caracteres</li>
                        <li><i class="fas fa-check text-success"></i> Tus datos están protegidos y encriptados</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
        border: none;
    }

    .card-header {
        border-radius: 15px 15px 0 0 !important;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 0.75rem;
    }

    .form-control:focus {
        border-color:rgb(157, 0, 255);
        box-shadow: 0 0 0 0.2rem rgba(76, 0, 255, 0.25);
    }

    .btn {
        border-radius: 25px;
        padding: 0.5rem 1.5rem;
    }

    .alert {
        border-radius: 10px;
    }

    .invalid-feedback {
        font-size: 0.875rem;
    }

    .form-label {
        margin-bottom: 0.5rem;
        color: #333;
    }

    .form-label i {
        margin-right: 0.5rem;
    }
</style>
</x-layout>