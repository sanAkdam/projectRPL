@extends('layouts.app')

@section('title', 'List Report')

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3>ALL REPORT</h3>
            <hr>
            <table class="table">
                <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td>
                            <h4>{{ $report->user_id }}</h4>
                            <h4>{{ $report->pesan }}</h4>
                        </td>
                        <td>
                            <a type="submit" class="form-control btn blckbtn" href="{{ route('lihatposting', ['posting_id' => $report->posting_id]) }}">LIHAT POSTING</a>
                        </td>
                        <td>
                            <a type="submit" class="form-control btn blckbtn" href="{{ route('deletereport', ['id' => $report->id]) }}">HAPUS REPORT</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection