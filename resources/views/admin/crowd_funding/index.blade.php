@extends('templates_backend.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('crowd_funding.create') }}" class="btn btn-primary btn-flat">
                        <i class="fas fa-plus"></i> Tambah Crowd Funding
                    </a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead class="bg-dark">
                            <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">Title</th>
                                <th class="text-white">Type </th>
                                <th class="text-white">Goal Amount</th>
                                <th class="text-white">Current Amount</th>
                                <th class="text-white">Start Date</th>
                                <th class="text-white">End Date</th>
                                <th class="text-white">Image</th>
                                <th class="text-white">Status</th>
                                <th class="text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($crowdFunding as $cf)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $cf->title }}</td>
                                <td>{{ $cf->type }}</td>
                                <td>Rp {{ number_format($cf->goal_amount, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format(\App\Models\Order::where(['crowd_funding_id' => $cf->id, 'status' => 'confirm_user'])->sum("nominal"), 0, ',', '.') }}
</td>
                                <td>{{ $cf->start_date }}</td>
                                <td>{{ $cf->end_date }}</td>
                                <td>
                                    <img src="{{ asset($cf->image) }}" alt="" class="img-fluid" style="height: 50px;">
                                </td>
                                <td>
                                    @if($cf->status=="aktif")
                                    <div class="badge bg-success">Aktif</div>
                                    @else
                                    <div class="badge bg-danger">Non Aktif</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('crowd_funding.edit', $cf->id) }}" class="btn btn-warning btn-flat">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('crowd_funding.destroy', $cf->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure you want to delete this crowd funding?')">
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
                                <th class="text-white">Title</th>
                                <th class="text-white">Type </th>
                                <th class="text-white">Goal Amount</th>
                                <th class="text-white">Current Amount</th>
                                <th class="text-white">Start Date</th>
                                <th class="text-white">End Date</th>
                                <th class="text-white">Image</th>
                                <th class="text-white">Status</th>
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