<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/hs') }}">LAB 7</a>

    <div class="navbar-nav mr-3">
        <a class="nav-item nav-link {{ request()->is('hs') ? 'active font-weight-bold' : '' }}" href="{{ url('/hs') }}">/hs</a>
        <a class="nav-item nav-link {{ request()->is('sv') ? 'active font-weight-bold' : '' }}" href="{{ url('/sv') }}">/sv</a>
        <a class="nav-item nav-link {{ request()->is('guimail') ? 'active font-weight-bold' : '' }}" href="{{ url('/guimail') }}">/guimail</a>
    </div>

    <span class="navbar-text text-light ml-auto">
        Đường dẫn hiện tại: /{{ request()->path() }}
    </span>
</nav>