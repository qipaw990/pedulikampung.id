@extends('templates_backend.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead class="bg-dark">
                            <tr>
                                                 <th class="text-white">ID</th>
                                <th class="text-white">Nama</th>
                                <th class="text-white">No. Telepon</th>
                                <th class="text-white">Nominal</th>
                                <th class="text-white">Program</th>
                                <th class="text-white">Status</th>
                                <th class="text-white">Bayar</th>
                                <th class="text-white">Anonim</th>
                                <th class="text-white">Tgl</th>
    
                                <th class="text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($data as $order)
                            <tr class="order-row">
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->nama }}</td>
                                <td>{{ $order->no_telpon }}</td>
<td>Rp {{ number_format($order->nominal, 0, ',', '.') }}</td>
    <td>{{ $order->cf->title }}</td>

                                <td>{{ $order->status }}</td>
                                <td>{{ $order->metode_pembayaran }}</td>
                                <td>{{ $order->is_anonim ? 'Ya' : 'Tidak' }}</td>
                                                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg" data-id="{{ $order->id }}" data-nama="{{ $order->nama }}" data-no-telepon="{{ $order->no_telpon }}" data-email="{{ $order->email }}" data-nominal="{{ $order->nominal }}" data-pesan="{{ $order->pesan }}">
                                            <i class="fas fa-bell"></i>Selesaikan
                                        </button>
<form action="{{ route('admin.orders.delete', $order->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">                   <i class="fas fa-trash"></i>&nbsp;Delete</button>
</form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-dark">
                            <tr>
                                <th class="text-white">ID</th>
                                <th class="text-white">Nama</th>
                                <th class="text-white">No. Telepon</th>
                                <th class="text-white">Nominal</th>
                                                                <th class="text-white">Program</th>

                                <th class="text-white">Status</th>
                                <th class="text-white">Bayar</th>
                                <th class="text-white">Anonim</th>
                                <th class="text-white">Tgl</th>
    
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

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kirim Pesan Ke | </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('whatsapp.success') }}" method="post">
                    @csrf
                    <input type="hidden" id="id" value="" name="id">
                    <label for="">Jenis whatsapp</label>
                    <select name="templates_id" id="" class="form-control">
                        @foreach($pesan as $row)
                        <option value="{{ $row->id }}">{{ $row->type }}</option>
                        @endforeach
                    </select>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>

    </div>

</div>
<script>
    $(document).on('click', '.btn-success', function() {
        var row = $(this).closest('.order-row');
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#id").val(id);
        $('#modal-lg .modal-title').text('Kirim Pesan Ke ' + nama);

    });
    $('#sendForm').on('click', function() {
        var formData = $('#whatsappForm').serialize();

        $.ajax({
            type: 'POST',
            url: $('#whatsappForm').attr('action'),
            data: formData,
            success: function(data) {
                // Handle success, e.g., close the modal or show a success message
                $('#modal-lg').modal('hide');
            },
            error: function(data) {
                // Handle error, e.g., show an error message
            }
        });
    });
</script>
@endsection