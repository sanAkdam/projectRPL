@extends('layouts.app')

@section('title', 'Post Barang')

@section('content')
    <div class="panel">
        <div class="panel-body">
            {{ Auth::check()? "Login" : "Logout" }}
            <h3>POSTING BARANG</h3>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('userPosting') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="sr-only" for="judulposting">Judul Posting</label>
                    <input type="text" class="form-control" name="judulposting" placeholder="Judul Posting" value="{{ old('judulposting') }}">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="foto">Foto (only.jpg)</label>
                    <input type="file" name="foto" class="form-control" id="foto" value="{{ old('foto') }}">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="image-preview">Show Image</label>
                    <img src="" id="image-preview" class="img-thumbnail" style="display: none;">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="tanggal">Tanggal</label>
                    <input class="form-control" type="date" name="tanggal" placeholder="Tanggal" value="{{ old('tanggal') }}">
                </div>
                <div class="form-group">
                    <label><input type="radio" name="jenisposting" value="{{ 1 }}">BARANG HILANG</label>
                    <label><input type="radio" name="jenisposting" value="{{ 2 }}">BARANG DITEMUKAN</label>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" value="{{ old('deskripsi') }}"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="blckbtn form-control">POSTING BARANG</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function(){
            function readImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image-preview').show();
                        $('#image-preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#foto").on('change', function(){
                readImage(this);
            });
        });
    </script>
@endsection