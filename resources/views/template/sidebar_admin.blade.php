<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('books') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Buku
                </a>
                <a class="nav-link" href="{{ route('categories') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Kategori Buku
                </a>
                <a class="nav-link" href="{{ route('authors') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>
                    Penulis
                </a>
                <a class="nav-link" href="{{ route('publishers') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                    Penerbit
                </a>
                <a class="nav-link" href="{{ route('admin.borrowings.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-hand"></i></div>
                    Peminjaman
                </a>
                <a class="nav-link" href="{{ route('settings') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                    Pengaturan
                </a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-link"><div class="sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>Logout</button>
                </form>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
                @if(Auth::check())
                    <p>{{ Auth::user()->user_nama }}</p>
                @endif
                @if (Auth::check())
    <p>User Level: {{ Auth::user()->user_level }}</p>
@endif
        </div>
    </nav>
</div>