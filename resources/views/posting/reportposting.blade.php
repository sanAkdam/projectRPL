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
                <form action="{{ route('userReportPosting', ['post_id' => $post['id']]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea class="form-control" name="pesan" placeholder="Pesan" value="{{ old('deskripsi') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="blckbtn form-control">REPORT POSTING</button>
                    </div>
                </form>
            </article>
        <br/>
    </div>
@endsection