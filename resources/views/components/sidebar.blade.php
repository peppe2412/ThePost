<button class="button-sidebar" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
    aria-controls="offcanvasExample">
    <i class="bi bi-layout-sidebar fs-4"></i>
</button>

<div class="offcanvas offcanvas-start sidebar-container" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title fs-2" id="offcanvasExampleLabel">Dasboard</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="{{ route('home') }}"><i
                            class="bi bi-house-door"></i> Home</a>
                </li>
                @if (Auth::user()->is_writer)
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="{{ route('create-article') }}"><i class="bi bi-file-earmark-arrow-up"></i> Inserisci articolo</a>
                    </li>
                @endif
                @if (Auth::user()->is_admin)
                    <li class="dropdown">
                        <button class="dropdown-toggle button-dropdown fs-5 p-0" type="button" data-bs-toggle="dropdown">
                           <i class="bi bi-person-gear"></i> Richieste
                        </button>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#admin-request">Richieste Admin</a></li>
                            <li><a class="dropdown-item" href="#revisor-request">Richieste Revisor</a></li>
                            <li><a class="dropdown-item" href="#writer-request">Richieste Writer</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
