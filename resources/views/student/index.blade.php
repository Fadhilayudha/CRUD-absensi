@extends('layouts.dashboard')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Student</h1>
        </div>
    </section>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Students Data</h4>
                </div>
              <div class="card-body">
                @if (Auth::user()->role == 'user')
                    <a href="{{route('student.create')}}" class="btn btn-primary" style="margin-bottom: 30px">Add Attendance</a>
                @endif
                  <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr class="text-center">
                                <th>#</th>
                                <th>NIS</th>
                                <th>Name</th>
                                <th>Rayon</th>
                                <th>Rombel</th>
                                <th>Gender</th>
                                <th>Kehadiran</th>
                                @if (Auth::user()->role == 'admin')
                                    <th class="text-center">Action</th>
                                @endif
                            </tr>
                        @foreach($students  as $index => $i)
                            <tr class="text-center">
                                <td>{{ $index+1 }}.</td>
                                <td>{{ $i->nis }}</td>
                                <td>{{ $i->name }}</td>
                                <td>{{ $i->rayon }}</td>
                                <td>{{ optional ( $i->rombel )->nama}}</td>
                                <td>{{ $i->gender == 'P' ? 'Perempuan' : 'Laki-Laki' }}</td>
                                <td>{{ $i->kehadiran == 'H' ? 'Hadir' : 'Tidak Hadir' }}</td>
                                @if (Auth::user()->role == 'admin')
                                <td>
                                    <a href="{{route('student.edit',$i->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('student.destroy', $i->id) }}"  onclick="var id = '{{ $i->id }}' ; event.preventDefault();document.getElementById('delete_'+id).submit();" class="btn btn-danger">Delete</a>
                                    <form id="delete_{{$i->id}}" action="{{ route('student.destroy', $i->id) }}"
                                            method="POST" style="display: none; ">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>                                
                                @endif
                                
                            </tr>
                        @endforeach
                        </table>
                    </div>
                    </div>
            </div>
        </div>
    </div>

@endsection