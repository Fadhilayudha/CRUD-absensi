@extends('layouts.dashboard')

@section('content')



    <section class="section">
        <div class="section-header">
        <h1>{{ auth()->user()->role }}</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ auth()->user()->name }}</h2>
            <p class="section-lead">Welcome!!</p>

            @if (Session::get('notAllowed'))
                <div class="alert alert-danger">
                    {{ Session::get('notAllowed')}}
                </div>  
            @endif
        </div>
    </section>

@endsection