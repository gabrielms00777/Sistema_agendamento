<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3"
        data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                    y="0px" viewBox="0 0 120 120" xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Painel</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100 @if (request()->route()->getName() == 'dashboard') active @endif">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item w-100 @if (request()->route()->getName() == 'schedule.index') active @endif">
                <a class="nav-link" href="{{ route('schedule.index') }}">
                    <i class="fe fe-book fe-16"></i>
                    <span class="ml-3 item-text">Agendamentos</span>
                </a>
            </li>
            <li class="nav-item w-100 @if (request()->route()->getName() == 'schedule.create') active @endif">
                <a class="nav-link" href="{{ route('schedule.create') }}">
                    <i class="fe fe-calendar fe-16"></i>
                    <span class="ml-3 item-text">Agendar Consulta</span>
                </a>
            </li>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Listagem</span>
            </p>
            <li class="nav-item w-100 @if (request()->route()->getName() == 'service.index') active @endif">
                <a class="nav-link" href="{{ route('service.index') }}">
                    <i class="fe fe-tool fe-16"></i>
                    <span class="ml-3 item-text">Todos os Serviços</span>
                </a>
            </li>
            <li class="nav-item w-100 @if (request()->route()->getName() == 'professional.index') active @endif">
                <a class="nav-link" href="{{ route('professional.index') }}">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Todos os Profissionais</span>
                </a>
            </li>
            <li class="nav-item w-100 @if (request()->route()->getName() == 'category.index') active @endif">
                <a class="nav-link" href="{{ route('category.index') }}">
                    <i class="fe fe-tag fe-16"></i>
                    <span class="ml-3 item-text">Todas as Categorias</span>
                </a>
            </li>
            <li class="nav-item w-100 @if (request()->route()->getName() == 'client.index') active @endif">
                <a class="nav-link" href="{{ route('client.index') }}">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Todos os Clientes</span>
                </a>
            </li>

            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Cadastar</span>
            </p>
            <li class="nav-item w-100 @if (request()->route()->getName() == 'service.create') active @endif">
                <a class="nav-link" href="{{ route('service.create') }}">
                    <i class="fe fe-tool fe-16"></i>
                    <span class="ml-3 item-text">Serviços</span>
                </a>
            </li>
            <li class="nav-item w-100 @if (request()->route()->getName() == 'professional.create') active @endif">
                <a class="nav-link" href="{{ route('professional.create') }}">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Profissionais</span>
                </a>
            </li>
            <li class="nav-item w-100 @if (request()->route()->getName() == 'category.create') active @endif">
                <a class="nav-link" href="{{ route('category.create') }}">
                    <i class="fe fe-tag fe-16"></i>
                    <span class="ml-3 item-text">Categorias</span>
                </a>
            </li>
            <li class="nav-item w-100 @if (request()->route()->getName() == 'client.create') active @endif">
                <a class="nav-link" href="{{ route('client.create') }}">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Clientes</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>