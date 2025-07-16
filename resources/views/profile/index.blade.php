<x-layout>
<x-slot:title>Mi Perfil</x-slot:title>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">
                        <i class="fas fa-user"></i> Mi Perfil
                    </h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <div class="profile-avatar">
                                <i class="fas fa-user-circle fa-5x text-primary"></i>
                            </div>
                            <h4 class="mt-3">{{ $user->name }}</h4>
                            <p class="text-muted">Cliente</p>
                        </div>
                        <div class="col-md-8">
                            <h5 class="mb-3">Información Personal</h5>
                            
                            <div class="info-item mb-3">
                                <label class="form-label fw-bold">Nombre:</label>
                                <p class="form-control-plaintext">{{ $user->name }}</p>
                            </div>

                            <div class="info-item mb-3">
                                <label class="form-label fw-bold">Email:</label>
                                <p class="form-control-plaintext">{{ $user->email }}</p>
                            </div>

                            <div class="info-item mb-3">
                                <label class="form-label fw-bold">Fecha de registro:</label>
                                <p class="form-control-plaintext">{{ $user->created_at->format('d/m/Y H:i') }}</p>
                            </div>

                            <div class="info-item mb-3">
                                <label class="form-label fw-bold">Última actualización:</label>
                                <p class="form-control-plaintext">{{ $user->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver a la Tienda
                        </a>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar Perfil
                        </a>
                    </div>
                </div>
            </div>

            <!-- Estadísticas del usuario -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-shopping-cart fa-2x text-success mb-2"></i>
                            <h5>Carrito</h5>
                            <p class="text-muted">Revisar items pendientes</p>
                            <a href="{{ route('cart.index') }}" class="btn btn-outline-success btn-sm">Ver Carrito</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-history fa-2x text-info mb-2"></i>
                            <h5>Historial</h5>
                            <p class="text-muted">Próximamente</p>
                            <button class="btn btn-outline-info btn-sm" disabled>Ver Historial</button>
                        </div>
                    </div>
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

    .profile-avatar {
        margin-bottom: 1rem;
    }

    .info-item {
        padding: 0.5rem 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .form-control-plaintext {
        margin-bottom: 0;
        padding: 0.375rem 0;
    }

    .btn {
        border-radius: 25px;
    }

    .alert {
        border-radius: 10px;
    }
</style>
</x-layout>