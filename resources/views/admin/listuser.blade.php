@extends('layouts.app')

@section('title', 'List User')

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3>ALL USERS</h3>
            <hr>
            <table class="table">
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <h4>{{ $user->nim }}</h4>
                        </td>
                        <td>
                            <button type="submit" class="form-control blckbtn">DELETE</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection