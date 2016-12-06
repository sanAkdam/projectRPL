@extends('layouts.app')

@section('title', 'List Barang Cari')

@section('content')
    <div class="panel">
        <header><h3></h3></header>
        @foreach($postings as $posting)
            <article class="panel-primary">
                <div class="panel-footer">
                    @if($posting->foto)
                        <img class="img-responsive" src="/posting/{{ $posting->foto }}" alt="">
                    @else
                        <p>No Photos</p>
                    @endif

                    <tr>
                        <h3 style="float: left">{{ $posting->judulposting }} </h3>
                        <p style="float: right"><?php echo date('d M Y',strtotime($posting->tanggal)); ?></p>
                    </tr>
                    <br><br>
                    <hr>
                    <h4 id="post-body-{{ $posting->id }}">{{ $posting->deskripsi }}</h4>
                </div>
                <table class="table">
                    <thead>
                    @if(Auth::user())
                        @if(auth()->user()->nim == $posting->user_id || auth()->user()->status == 'admin')
                            <th>
                                <a class="form-control blckbtn" href="{{ route('update', ['id' => $posting->id]) }}">U P D A T E</a>
                            </th>
                            <th>
                                <a class="form-control blckbtn" href="{{ route('delete', ['id' => $posting->id]) }}">D E L E T E</a>
                            </th>
                        @else
                            <th>
                                <a class="form-control blckbtn" href="{{ route('reportPosting', ['id' => $posting->id]) }}">R E P O R T</a>
                            </th>
                        @endif
                    @else
                        <th>
                            <a class="form-control blckbtn" href="{{ route('reportPosting', ['id' => $posting->id]) }}">R E P O R T</a>
                        </th>
                    @endif
                    </thead>
                </table>
            </article>
        @endforeach
    </div>
@endsection
