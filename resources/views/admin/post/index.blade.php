@extends('templates_backend.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('post.create') }}" class="btn btn-primary btn-flat">
                        <i class="fas fa-plus"></i> Tambah Post
                    </a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead class="bg-dark">
                            <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">Judul Post</th>
                                <th class="text-white">Image</th>
                                <th class="text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $post->judul_post }}</td>
                                <td>
                                    <img src="{{ asset($post->image) }}" alt="" class="img-fluid" style="height: 50px;">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-flat">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure you want to delete this post?')">
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
                                <th class="text-white">Judul Post</th>
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