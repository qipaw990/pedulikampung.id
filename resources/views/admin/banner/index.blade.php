@extends('templates_backend.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('banner.create') }}" class="btn btn-primary btn-flat">
                        <i class="fas fa-plus"></i> Tambah Banner
                    </a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead class="bg-dark">
                            <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">Judul Banner</th>
                                <th class="text-white">Image</th>
                                <th class="text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($banner as $bRow)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $bRow->nama_banner }}</td>
                                <td>
                                    <img src="{{ asset($bRow->image) }}" alt="" class="img-fluid" style="height: 50px;">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('banner.edit', $bRow->id) }}" class="btn btn-warning btn-flat">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('banner.destroy', $bRow->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure you want to delete this banner?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-dark">
                            <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">Judul Banner</th>
                                <th class="text-white">Image</th>
                                <th class="text-white">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection