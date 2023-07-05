@extends('layouts.dashboard')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Rombel</h1>
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
                    <h4>Rombel</h4>
                </div>
              <div class="card-body">
                <a href="{{route('rombel.create')}}" class="btn btn-primary" style="margin-bottom: 30px">Add Attendance</a>
                  <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        @foreach($rombels  as $index => $i)
                            <tr class="text-center">
                                <td>{{ $index+1 }}.</td>
                                <td>{{ $i->nama }}</td>
                                <td>
                                    <a href="{{route('rombel.edit',$i->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('rombel.destroy', $i->id) }}"  onclick="var id = '{{ $i->id }}' ; event.preventDefault();document.getElementById('delete_'+id).submit();" class="btn btn-danger">Delete</a>
                                    <form id="delete_{{$i->id}}" action="{{ route('rombel.destroy', $i->id) }}"
                                        method="POST" style="display: none; ">
                                    @csrf
                                    @method('delete')
                                </form>
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                    </div>
            </div>
        </div>
    </div>

@endsection