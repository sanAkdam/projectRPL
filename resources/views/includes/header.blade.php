<style>
    .navbar {
        background-color: #000000;
        height: 70px;
    }

    .navbar .container .navbar-collapse .navbar-left {
        padding-left: 0px;
    }
    .navbar .container .navbar-collapse .navbar-left,
    .navbar .container .navbar-collapse .navbar-right {
        padding-top: 10px;
    }

    .navbar .container .navbar-collapse .navbar-right .dropdown .dropdown-toggle:hover {
        background-color: #1a1a1a;
    }

    .navbar .container .navbar-collapse .navbar-right .link a:hover {
        background-color: #1a1a1a;
    }

    .navbar .container .navbar-collapse .navbar-right .dropdown .dropdown-toggle,
    .navbar .container .navbar-collapse .navbar-right .link a {
        font-size: 18px;
    }

    .navbar .container .navbar-header a {
        font-family: "Courier New";
        font-size: 30px;
    }

    .navbar .container .navbar-collapse .navbar-left .btn-primary:hover {
        background: #A4A4A4;
    }

    .navbar .container .navbar-header a,
    .navbar .container .navbar-collapse .navbar-right .dropdown .dropdown-toggle,
    .navbar .container .navbar-collapse .navbar-right .link a {
        color: white;
    }
</style>

<nav class="navbar navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('/') }}">HIP<i class="glyphicon glyphicon-search" style="font-size: 25px"></i>BA</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="link"><a href="{{ route('listBarangKetemu') }}">BARANG KETEMU</a></li>
                <li class="link"><a href="{{ route('listBarangHilang') }}">BARANG HILANG</a></li>

                @if(Auth::guest())
                    <li class="link"><a href="{{ url('/login') }}">LOGIN</a></li>
                    <li class="link"><a href="{{ url('/register') }}">REGISTER</a></li>
                @else
                    @if(Auth::user()->status == 'admin')
                        <li class="link"><a href="{{ route('listuser') }}">USERS</a></li>
                        <li class="link"><a href="{{ route('pesanreport') }}">REPORT</a></li>
                    @else
                        <li class="link"><a href="{{ route('posting') }}">POSTING BARANG</a></li>
                    @endif
                        <li class="link"><a href="{{ url('/logout') }}">LOGOUT</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>