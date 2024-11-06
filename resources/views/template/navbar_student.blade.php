<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="#">Student Dashboard</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    @if(Auth::user()->user_level === 'admin')
        <a class="navbar-brand ps-3" href="{{ route('dashboard')}}">Switch to Admin mode</a>
    @endif
</nav>