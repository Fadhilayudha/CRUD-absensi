@extends('layouts.auth')

@section('content')

    <div class="container col-md-4 offset-4" >

        @if(Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>  
        @endif
        @if (Session::get('notAllowed'))
            <div class="alert alert-danger">
                {{ Session::get('notAllowed')}}
            </div>  
        @endif

        <form method="POST" action="{{route('register.input')}}">
        @csrf
        <div class="row text-center">
            <h2 class="mt-2">Register</h2>
        </div>
            <div class="row">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value=""  autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" name="email" class="form-control" value=""  autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value=""  autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control"  value=""  autocomplete="off">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block btn-sm btn-login" style="text-decoration:none;">Sign Up</button>
        </form>     
    </div>

@endsection