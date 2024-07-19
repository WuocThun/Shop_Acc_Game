
<nav class=" container navbar navbar-expand-sm bg-dark navbar-dark">

    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/home')}}">Dashborad </a>
        </li><li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">Trang chủ </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('category.index')}}">Danh mục game</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="#">Dịch vụ game</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="#">Nick game game</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Dropdown link
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Link 1</a>
                <a class="dropdown-item" href="#">Link 2</a>
                <a class="dropdown-item" href="#">Link 3</a>
            </div>
        </li>
    </ul>
</nav>
