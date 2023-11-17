@extends('templates_backend.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('crowd_funding.index') }}" class="btn btn-danger">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('crowd_funding.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="title" class="form-label">Judul Crowdfunding</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="type" class="form-label">Tipe Crowdfunding</label>
                            <select name="type" id="type" class="form-control">
                                <option value="Waqaf">Waqaf</option>
                                <option value="Non Waqaf">Non Waqaf</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="goal_amount" class="form-label">Target Dana</label>
                            <input type="text" name="goal_amount" id="goal_amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                            <input type="date" name="start_date" id="start_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="end_date" class="form-label">Tanggal Selesai</label>
                            <input type="date" name="end_date" id="end_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="aktif" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="aktif">Aktif</option>
                                <option value="aktif">Non Aktif</option>
                            </select>
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
<script>
$(document).ready(function() {
  $('#description').summernote();
});
</script>
@endsection