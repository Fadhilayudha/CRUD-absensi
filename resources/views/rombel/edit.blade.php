@extends('layouts.dashboard')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Form Rombel</h1>
    </div>
        <div class="section-body">

            <form  method="POST" action="{{route('rombel.update', $rombel->id)}}" enctype="multipart/form-data">
                @csrf

                @method('put')
                @if (Session::get('successAdd'))
                    <div class="alert alert-success">
                        {{ Session::get('successAdd') }}
                    </div>
                @endif
                
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Form Edit Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6">
                                    <label>Name</label>
                                    <input type="text" name="nama" value="{{ $rombel->nama }}" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-left">
                                    <a href="{{route('rombel.index')}}" class="btn btn-danger">Back</a>
                                </div>
                                <div class="float-right">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>   
      </div>
</section>

@endsection