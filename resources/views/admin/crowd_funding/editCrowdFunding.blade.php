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
                    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <form action="{{ route('crowd_funding.update', $crowdfunding->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title" class="form-label">Judul Crowdfunding</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $crowdfunding->title }}">
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Deskripsi</label>
                            <!-- CKEditor container -->
                            <!-- Hidden input field to store CKEditor content -->
                            <textarea name="description" id="description" style="display: none;" rows="4">{!! $crowdfunding->description !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="type" class="form-label">Tipe Crowdfunding</label>
                            <select name="type" id="type" class="form-control">
                                <option value="Waqaf" {{ $crowdfunding->type === 'Waqaf' ? 'selected' : '' }}>Waqaf</option>
                                <option value="Non Waqaf" {{ $crowdfunding->type === 'Non Waqaf' ? 'selected' : '' }}>Non Waqaf</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="goal_amount" class="form-label">Target Dana</label>
                            <input type="text" name="goal_amount" id="goal_amount" class="form-control" value="{{ $crowdfunding->goal_amount }}">
                        </div>
                        <div class="form-group">
                            <label for="start_date" class="form-label">Tanggal Mulai</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $crowdfunding->start_date }}">
                        </div>
                        <div class="form-group">
                            <label for="end_date" class="form-label">Tanggal Selesai</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $crowdfunding->end_date }}">
                        </div>
                        <div class="form-group">
                            <label for="type" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="aktif" {{ $crowdfunding->status === 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nom aktif" {{ $crowdfunding->status === 'non aktif' ? 'selected' : '' }}>Non Aktif</option>
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
