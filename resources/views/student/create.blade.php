@extends('layouts.dashboard')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Form Absensi</h1>
    </div>
        <div class="section-body">

            <form  method="POST" action="{{route('student.store')}}" enctype="multipart/form-data">
                @csrf

                @if (Session::get('successAdd'))
                    <div class="alert alert-success">
                        {{ Session::get('successAdd') }}
                    </div>
                @endif
                
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Form Create Absensi</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4 col-lg-4">
                                    <label>NIS</label>
                                    <input type="text" name="nis" class="form-control">
                                </div>
                                <div class="form-group col-md-4 col-lg-4">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group col-md-4 col-lg-4">
                                    <label>Rayon</label>
                                    <input type="text" name="rayon" id="nominal" class="form-control">
                                </div>
                                <div class="form-group col-md-4 col-lg-4">
                                    <label>Rombel</label>
                                    <select name="rombel_id" class="form-control" required>
                                        <option value="" selected="true" disabled="disabled">Silahkan Pilih</option>
                                        @foreach($rombel as $data)
                                            <option value="{{ $data->id }}" >{{$data->nama}}</option>
                                        @endforeach
                                    </select>                        
                                </div>
                                <div class="form-group col-md-4 col-lg-4">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="" selected="true" disabled="disabled">Silahkan Pilih</option>
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki Laki</option>
                                    </select>                        
                                </div>
                                <div class="form-group col-md-4 col-lg-4">
                                    <label>Kehadiran</label>
                                    <select name="kehadiran" class="form-control" required>
                                        <option value="" selected="true" disabled="disabled">Silahkan Pilih</option>
                                        <option value="H">Hadir</option>
                                        <option value="A">Tidak Hadir</option>
                                    </select>                        
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>   
      </div>
</section>

@endsection