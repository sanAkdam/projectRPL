@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3>LOGIN</h3>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('userLogin') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="sr-only" for="nim">NIM</label>
                    <input class="form-control" type="text" name="nim" placeholder="NIM" value="{{ old('nim') }}">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control blckbtn">
                        L O G I N
                    </button>
                </div>
                <input type="hidden" name="url" value="{{ URL::previous() }}">
            </form>
        </div>
    </div>
@endsection