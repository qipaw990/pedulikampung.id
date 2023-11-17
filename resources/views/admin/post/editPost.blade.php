@extends('templates_backend.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('post.index') }}" class="btn btn-danger">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul_post" class="form-label">Judul Post</label>
                            <input type="text" name="judul_post" id="judul_post" class="form-control" value="{{ $post->judul_post }}">
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="isi" class="form-label">Isi Post</label>
                            <textarea name="isi" id="isi" class="form-control" rows="4">{{ $post->isi }}</textarea>
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
  $('#isi').summernote();
});  
</script>

@endsection