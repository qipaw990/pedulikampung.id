@extends('templates_backend.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('banner.index') }}" class="btn btn-danger">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="nama_banner" class="form-label">Nama Banner</label>
                            <input type="text" name="nama_banner" id="nama_banner" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection