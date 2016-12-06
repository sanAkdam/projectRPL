@extends('layouts.app')

@section('title', 'Find or Give')
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                <h2>HILANG POST BARANG</h2>
            </div>

            <form action="{{ route('cariposting') }}" class="navbar-form" role="search" method="get">
                <div class="form-group">
                    <input type="text" name="judulposting" id="judulposting" class="form-control" placeholder="Judul Posting">
                </div>
                <button type="submit" style="font-family: 'Courier New'" class="btn blckbtn">CARI</button>
            </form>
        </div>
    </div>
@endsection
