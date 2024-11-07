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
                    Books
                </a>
                <a class="nav-link" href="{{ route('categories') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                    Book Categories
                </a>
                <a class="nav-link" href="{{ route('authors') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
                    Authors
                </a>
                <a class="nav-link" href="{{ route('publishers') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Publishers
                </a>
                <a class="nav-link" href="{{ route('admin.borrowings.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-hand-holding"></i></div>
                    Borrowings
                </a>
                <a class="nav-link" href="{{ route('settings') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Settings
                </a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-link">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>Logout
                    </button>
                </form>
            </div>
        </div>
        <div class="sb-sidenav-footer"> 
            @if(Auth::check())
                <strong>{{ Auth::user()->user_nama }}</strong>
                <small><span>(@</span>{{ Auth::user()->user_username }}<span>)</span></small>
                <br>
                {{ Auth::user()->user_level === 'admin' ? "Administrator" : "Student" }}
            @endif
        </div>
    </nav>
</div>
