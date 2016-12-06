@extends('layouts.app')

@section('title', 'Report Posting')

@section('content')
    <div class="panel">
        <header><h3></h3></header>
        <h3>Report Posting</h3>
        <article class="panel-primary">
            <div class="panel-footer">
                @if($post['foto'])
                    <img class="img-responsive" src="/posting/{{ $post['foto'] }}" alt="">
                @else
                    <p>No Photos</p>
                @endif

                <tr>
                    <h3 style="float: left">{{ $post['judulposting'] }} </h3>
                    <p style="float: right"><?php echo date('d M Y',strtotime($post['tanggal'])); ?></p>
                </tr>
                <br><br>
                <hr>
                <h4>{{ $post['deskripsi'] }}</h4>
            </div>
                <div class="form-group">
                    <a href="{{ route('admindeleteposting', ['post_id' => $post['id']]) }}" class="blckbtn btn form-control">DELETE POSTING</a>
                </div>

        </article>
        <br/>
    </div>
@endsection