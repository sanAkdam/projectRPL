@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3>REGISTER</h3>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('userRegister') }}" method="post">
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
                        R E G I S T E R
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection