
<li class="nav-item">
    <a href="{{ route('tipoequipos.index') }}" class="nav-link {{ Request::is('tipoequipos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tipoequipos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('equipos.index') }}" class="nav-link {{ Request::is('equipos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Equipos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('clientes.index') }}" class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Clientes</p>
    </a>
</li>
