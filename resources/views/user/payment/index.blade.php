@extends('layouts.app')
@section('content')
@php
$cf = \App\Models\CrowdFunding::where('id', $data->crowd_funding_id)->first();
@endphp
@if($data->metode_pembayaran == "QRIS")
<main class="main">
    <section class="mt-50 mb-50">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="order_review">
                            @if($data->status == "pending")

                            <div class="mb-20">
                                <h4>Pembayaran QRIS</h4>
                            </div>

                            <center>
                                @if($cf->type == "Waqaf")
                                <img src="{{asset('qris_sedekah.jpeg')}}" alt="" style="width: 300px;">
                                @else
                                <img src="{{asset('qris_waqaf.jpeg')}}" alt="" style="width: 300px;">
                                @endif
                            </center>
                            <div class="text-center mt-3">
                            @if($cf->type == "Waqaf")

                                <a href="{{ asset('qris_sedekah.jpeg') }}" download="qris_wakaf.jpeg">
                                    <button type="button" class="btn btn-fill-out">Download QR Wakaf</button>
                                </a>
                                @else
                                                            <a href="{{ asset('qris_waqaf.jpeg') }}" download="qris_sedekah.jpeg">
                                    <button type="button" class="btn btn-fill-out">Download QR Sedekah</button>
                                </a>
                                @endif
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="bg-secondary text-white">Nominal Bayar</th>
                                            <th class="bg-secondary text-white">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Rp {{ number_format($data->nominal, 0, ',', '.') }}
                                                <button id="copyNominalButton" class="btn btn-primary" style="   padding: 0.25rem 0.5rem;
    font-size: 0.75rem;">&nbsp;Copy</button>
                                            </td>

                                            <td>
                                                @if($data->status == "pending")
                                                Pending
                                                @elseif($data->status=="confirm_user")
                                                Terkonfirmasi Oleh user
                                                @else
                                                Success
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @if($cf->type == "Waqaf")
                            <button type="button" class="btn btn-fill-out btn-block mt-30 btn-block" style="width: 100%;" id="confirmationButton">Konfirmasi Pembayaran</button>
                            @else
                            <button type="button" class="btn btn-fill-out btn-block mt-30 btn-block" style="width: 100%;" id="confirmationSedekah">Konfirmasi Pembayaran</button>

                            @endif
                            @else
                            <p class="alert alert-success">Pembayaran kakak akan segera di proses, kami infokan untuk status nya lewat wa ya kak</p>
                            @endif

                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const confirmationButton = document.getElementById('confirmationButton');

        confirmationButton.addEventListener('click', function() {
            Swal.fire({
                title: 'Ikrar Waqaf',
                text: "Dengan ini saya sebagai Wakif telah mengikrarkan wakaf kepada Yayasan Peduli Kampung Berbagi untuk program " + '{{  $cf->title  }}' + " sebesar Rp " + "{{ number_format($data->nominal, 0, ',', '.') }}" + " dalam bentuk wakaf",
                imageUrl: "{{ asset('download.png') }}", // Path to your image
                imageWidth: 300, // Set the image width
                imageHeight: 200, // Set the image height
                imageAlt: 'QRIS Image', // Alt text for the image
                showCancelButton: true,
                confirmButtonText: 'Sudah Berikrar',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Menggunakan jQuery untuk mengirim permintaan AJAX
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('order.userConfirm', $data->id) }}",
                        data: {
                            id: '{{ $data->id }}', // Gantilah ini sesuai dengan yang diperlukan
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            Swal.fire('Transaksi!', data.message, 'success');
                            location.reload()
                            // Tambahkan logika tambahan jika diperlukan setelah berhasil dikonfirmasi.
                        },
                        error: function(data) {
                            Swal.fire('Transaksi', 'Gagal', 'error');
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Transaksi', 'Batal.', 'error');
                }
            });
        });

    });
    document.addEventListener('DOMContentLoaded', function() {
        const confirmationSedekah = document.getElementById('confirmationSedekah');

        confirmationSedekah.addEventListener('click', function() {
            Swal.fire({
                title: 'Ikrar Sedekah',
                text: "Dengan ini saya sebagai musaddiq telah mengikrarkan sedekah kepada Yayasan Peduli Kampung Berbagi untuk program " + '{{  $cf->title  }}' + " sebesar Rp " + " {{ number_format($data->nominal, 0, ',', '.') }} " + " dalam bentuk sedekah",
                imageUrl: "{{ asset('download.png') }}", // Path to your image
                imageWidth: 300, // Set the image width
                imageHeight: 200, // Set the image height
                imageAlt: 'QRIS Image', // Alt text for the image
                showCancelButton: true,
                confirmButtonText: 'Sudah Berikrar',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Menggunakan jQuery untuk mengirim permintaan AJAX
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('order.userConfirm', $data->id) }}",
                        data: {
                            id: '{{ $data->id }}', // Gantilah ini sesuai dengan yang diperlukan
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            Swal.fire('Transaksi!', data.message, 'success');
                            location.reload()

                            // Tambahkan logika tambahan jika diperlukan setelah berhasil dikonfirmasi.
                        },
                        error: function(data) {
                            Swal.fire('Transaksi', 'Gagal', 'error');
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Transaksi', 'Batal.', 'error');
                }
            });
        });
    })
    document.addEventListener('DOMContentLoaded', function() {
        const copyNominalButton = document.getElementById('copyNominalButton');

        copyNominalButton.addEventListener('click', function() {
            const nominalText = "{{ number_format($data->nominal, 0, ',', '.') }}"; // Get the nominal value
            const tempInput = document.createElement('input'); // Create a temporary input element

            // Set the value of the temporary input to the nominal text
            tempInput.value = nominalText;

            document.body.appendChild(tempInput); // Append the input to the DOM
            tempInput.select(); // Select the input's content
            document.execCommand('copy'); // Copy the selected text to the clipboard
            document.body.removeChild(tempInput); // Remove the temporary input element

            // Provide user feedback, e.g., display a tooltip or alert
            // You can use a library like Tooltip.js or Bootstrap's tooltips for a nicer UI.
            alert('Nominal copied to clipboard: ' + nominalText);
        });
    });
</script>
@else

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="#" rel="nofollow">Home</a>
                <span></span> Crowd Funding
                <span></span> Bayar
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="order_review">
                            @if($data->status == "pending")
                            <div class="mb-20">
                                <h4>Pembayaran Transfer BSI</h4>
                            </div>
                            <center>
                                <img src="{{asset('bsi.jpeg')}}" alt="" style="width: 300px;">
                            </center>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="bg-secondary text-white">No Rekening</th>
                                            <th class="bg-secondary text-white">Nominal Bayar</th>
                                            <th class="bg-secondary text-white">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                               @if($cf->type == "Waqaf")
                                  <h5>9815002005&nbsp;&nbsp;<button id="copyRekeningButton" class="btn btn-primary " style="   padding: 0.25rem 0.5rem;
    font-size: 0.75rem;">
    Copy Rekening
</button></h5>
                                @else
       <h5>9915002002&nbsp;&nbsp;<button id="copyRekeningButton" class="btn btn-primary" style="   padding: 0.25rem 0.5rem;
    font-size: 0.75rem;">
    Copy Rekening
</button></h5>
                                @endif
                                             
                                            </td>
                                            <td>
                                                <h5>Rp {{ number_format($data->nominal, 0, ',', '.') }}               <button id="copyNominalButton" class="btn btn-primary" style="   padding: 0.25rem 0.5rem;
    font-size: 0.75rem;">&nbsp;Copy</button></h5>
                                            </td>
                                            <td>
                                                @if($data->status == "pending")
                                                Pending
                                                @elseif($data->status=="confirm_user")
                                                Terkonfirmasi Oleh user
                                                @else
                                                Success
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            @if($cf->type == "Waqaf")
                            <button type="button" class="btn btn-fill-out btn-block mt-30 btn-block" style="width: 100%;" id="confirmationButton">Konfirmasi Pembayaran</button>
                            @else
                            <button type="submit" class="btn btn-fill-out btn-block mt-30 btn-block" style="width: 100%;" id="confirmationSedekah">Konfirmasi Pembayaran</button>

                            @endif
                            @else
                            <p class="alert alert-success">Pembayaran kakak akan segera di proses, kami infokan untuk status nya lewat whatsapp ya kak</p>

                            @endif
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const confirmationButton = document.getElementById('confirmationButton');

        confirmationButton.addEventListener('click', function() {
            Swal.fire({
                title: 'Ikrar Waqaf',
                text: "Dengan ini saya sebagai Wakif telah mengikrarkan wakaf kepada Yayasan Peduli Kampung Berbagi untuk program " + '{{  $cf->title  }}' + " sebesar Rp. " + "{{ $data->nominal }}" + " dalam bentuk wakaf",
                imageUrl: "{{ asset('download.png') }}", // Path to your image
                imageWidth: 300, // Set the image width
                imageHeight: 200, // Set the image height
                imageAlt: 'QRIS Image', // Alt text for the image
                showCancelButton: true,
                confirmButtonText: 'Sudah Berikrar',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Menggunakan jQuery untuk mengirim permintaan AJAX
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('order.userConfirm', $data->id) }}",
                        data: {
                            id: '{{ $data->id }}', // Gantilah ini sesuai dengan yang diperlukan
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            Swal.fire('Transaksi!', data.message, 'success');
                            location.reload()
                            // Tambahkan logika tambahan jika diperlukan setelah berhasil dikonfirmasi.
                        },
                        error: function(data) {
                            Swal.fire('Transaksi', 'Gagal', 'error');
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Transaksi', 'Batal.', 'error');
                }
            });
        });

    });
    document.addEventListener('DOMContentLoaded', function() {
        const confirmationSedekah = document.getElementById('confirmationSedekah');

        confirmationSedekah.addEventListener('click', function() {
            Swal.fire({
                title: 'Ikrar Sedekah',
                text: "Dengan ini saya sebagai musaddiq telah mengikrarkan sedekah kepada Yayasan Peduli Kampung Berbagi untuk program " + '{{  $cf->title  }}' + " sebesar Rp. " + "{{ $data->nominal }}" + " dalam bentuk sedekah",
                imageUrl: "{{ asset('download.png') }}", // Path to your image
                imageWidth: 300, // Set the image width
                imageHeight: 200, // Set the image height
                imageAlt: 'QRIS Image', // Alt text for the image
                showCancelButton: true,
                confirmButtonText: 'Sudah Berikrar',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Menggunakan jQuery untuk mengirim permintaan AJAX
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('order.userConfirm', $data->id) }}",
                        data: {
                            id: '{{ $data->id }}', // Gantilah ini sesuai dengan yang diperlukan
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            Swal.fire('Transaksi!', data.message, 'success');
                            location.reload()

                            // Tambahkan logika tambahan jika diperlukan setelah berhasil dikonfirmasi.
                        },
                        error: function(data) {
                            Swal.fire('Transaksi', 'Gagal', 'error');
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Transaksi', 'Batal.', 'error');
                }
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const copyNominalButton = document.getElementById('copyNominalButton');

        copyNominalButton.addEventListener('click', function() {
            const nominalText = "{{ number_format($data->nominal) }}"; // Get the nominal value
            const tempInput = document.createElement('input'); // Create a temporary input element

            // Set the value of the temporary input to the nominal text
            tempInput.value = nominalText;

            document.body.appendChild(tempInput); // Append the input to the DOM
            tempInput.select(); // Select the input's content
            document.execCommand('copy'); // Copy the selected text to the clipboard
            document.body.removeChild(tempInput); // Remove the temporary input element

            // Provide user feedback, e.g., display a tooltip or alert
            // You can use a library like Tooltip.js or Bootstrap's tooltips for a nicer UI.
            alert('Nominal copied to clipboard: ' + nominalText);
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const copyRekeningButton = document.getElementById('copyRekeningButton');
        const rekeningNumber = "{{ $cf->type === 'Waqaf' ? '9815002005' : '9915002002' }}"; // Replace this with the actual account number

        copyRekeningButton.addEventListener('click', function() {
            const tempInput = document.createElement('input'); // Create a temporary input element

            // Set the value of the temporary input to the bank account number
            tempInput.value = rekeningNumber;

            document.body.appendChild(tempInput); // Append the input to the DOM
            tempInput.select(); // Select the input's content
            document.execCommand('copy'); // Copy the selected text to the clipboard
            document.body.removeChild(tempInput); // Remove the temporary input element

            // Provide user feedback, e.g., display a tooltip or alert
            // You can use a library like Tooltip.js or Bootstrap's tooltips for a nicer UI.
            alert('Bank account number copied to clipboard: ' + rekeningNumber);
        });
    });
</script>

@endif
@endsection