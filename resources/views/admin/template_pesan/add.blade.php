@extends('templates_backend.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('templates_pesan.index') }}" class="btn btn-primary btn-flat">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('templates_pesan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="type">Tipe Pesan</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="Masukkan Tipe Pesan">
                        </div>
                        <div class="form-group">
                            <label for="messages">Isi Pesan</label>
                            <textarea class="form-control" id="messages" name="messages" placeholder="Masukkan Isi Pesan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection