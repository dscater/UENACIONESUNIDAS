<li class="nav-item">
    <a href="{{ route('administrativos.index') }}"
        class="nav-link {{ request()->is('administrativos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Administrativos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('estudiantes.index') }}" class="nav-link {{ request()->is('estudiantes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Estudiantes</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('profesors.index') }}" class="nav-link {{ request()->is('profesors*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Profesores</p>
    </a>
</li>

<li class="nav-item @if (request()->is('horarios*') || request()->is('horas*')) )menu-is-opening menu-open active @endif">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-calendar-alt"></i>
        <p>Horarios <i class="fas fa-angle-left right"></i></p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('horarios.index') }}" class="nav-link @if (request()->is('horarios*')) active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Horarios</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('horas.index') }}" class="nav-link @if (request()->is('horas*')) active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Horas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('profesor_colors.index') }}" class="nav-link @if (request()->is('profesor_colors*')) active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Profesor Color</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item @if (request()->is('materias*') ||
        request()->is('areas*') ||
        request()->is('campos*') ||
        request()->is('nivels*') ||
        request()->is('grados*')) menu-is-opening menu-open active @endif">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-list-alt"></i>
        <p>Materias <i class="fas fa-angle-left right"></i></p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('materias.index') }}" class="nav-link @if (request()->is('materias*')) active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Materias</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('areas.index') }}" class="nav-link @if (request()->is('areas*')) active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Áreas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('campos.index') }}" class="nav-link @if (request()->is('campos*')) active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Campos</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item @if (request()->is('inscripcions*') || request()->is('paralelos*')) menu-is-opening menu-open active @endif">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-list-alt"></i>
        <p>Inscripcions <i class="fas fa-angle-left right"></i></p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('inscripcions.index') }}"
                class="nav-link @if (request()->is('inscripcions*')) active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Inscripcions</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('paralelos.index') }}" class="nav-link @if (request()->is('paralelos*')) active @endif">
                <i class="nav-icon far fa-circle"></i>
                <p>Paralelos</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('reportes.index') }}" class="nav-link {{ request()->is('reportes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>Reportes</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('razon_social.index') }}" class="nav-link {{ request()->is('razon_social*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-hospital"></i>
        <p>Razón social</p>
    </a>
</li>
