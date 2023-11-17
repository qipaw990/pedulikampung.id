@extends('layouts.app')
@section('content')
<style>
    /* Style for inactive (unchecked) radio buttons */
    .btntogle label input[type="radio"] {
        display: none;
        /* Hide the actual radio buttons */
    }

    /* Style for active (checked) radio buttons */
    .btntogle label.active {
        font-size: 8px;
        background-color: #0d6efd;
        /* Change the background color */
        color: #fff;
        /* Change the text color */
        border: 1px solid #0d6efd;
        /* Change the border color */
        min-width: 100px;
        /* Set a fixed width for all labels (adjust as needed) */
        text-align: center;
        /* Center align the text */
    }

    /* Style for active (checked) radio button labels */
    .btntogle label.active input[type="radio"] {
        display: block;
        /* Show the radio button to make it checked */
    }


    /* Style for the toggle switch */
    .toggle-switch {
        display: inline-block;
        position: relative;
        padding-left: 45px;
        /* Width of the switch (adjust as needed) */
    }

    .toggle-label {
        display: inline-block;
        margin-right: 10px;
    }

    .toggle-checkbox {
        display: none;
        /* Hide the actual checkbox */
    }

    /* Style for the toggle switch when unchecked */
    .toggle-label:before {
        content: "Off";
        position: absolute;
        left: 0;
        width: 35px;
        /* Width of the switch handle (adjust as needed) */
        height: 20px;
        background-color: #ccc;
        border-radius: 20px;
        text-align: center;
        line-height: 20px;
        color: #333;
        transition: 0.4s;
    }

    /* Style for the toggle switch when checked */
    .toggle-checkbox:checked+.toggle-label:before {
        content: "On";
        background-color: #4CAF50;
        /* Change the color when checked */
        color: #fff;
        left: 100%;
        transform: translateX(-100%);
    }
</style>
<main class="main">

    <section class="mt- mb-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="order_review">
                        <div class="mb-25">
                            <img class="default-img" src="{{ asset($data->image) }}" style="border: 20px;" alt="">
                            <h4>{{ $data->title }}</h4>
                        </div>
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="post" action="{{ route('order.store', $data->id) }}">

                            <label>Pilih Nominal</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btntogle" data-toggle="buttons">
                                        <label class="btn btn-primary" style="width: 100%;">
                                            <input type="radio" name="nominal" value="5000" autocomplete="off">Rp. 5.000
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btntogle" data-toggle="buttons">
                                        <label class="btn btn-primary" style="width: 100%;">
                                            <input type="radio" name="nominal" value="15000" autocomplete="off">Rp. 15.000
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="btntogle" data-toggle="buttons">
                                        <label class="btn btn-primary" style="width: 100%;">
                                            <input type="radio" name="nominal" value="25000" autocomplete="off">Rp. 25.000
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btntogle" data-toggle="buttons">
                                        <label class="btn btn-primary" style="width: 100%;">
                                            <input type="radio" name="nominal" value="50000" autocomplete="off">Rp. 50.000
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="btntogle" data-toggle="buttons">
                                        <label class="btn btn-primary" style="width: 100%;">
                                            <input type="radio" name="nominal" value="custom" autocomplete="off"> Isi Nominal Lain
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-20">
                                <label id="textNominal" class="alert alert-success" style="width:100%">Nominal Donasi : Rp. 0 ;</label>
                                <input type="text" name="custom_nominal" id="custom_nominal_input" placeholder="Masukan Custom Nominal">

                            </div>
                            <strong> <small>Pilih nominal atau isi dengan nominal yang anda inginkan</small> </strong>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Jenis Pembayaran</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="metode_pembayaran" id="exampleRadios3"  value="BSI">
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">BSI</label>
                                        <div class="form-group collapse in" id="bankTranfer">
                                        </div>
                                    </div>

                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="metode_pembayaran" id="exampleRadios5" checked="" value="QRIS">
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">QRIS</label>
                                        <div class="form-group collapse in" id="paypal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @csrf
                            <div class="form-group">
                                <input type="text" required="" name="nama" placeholder="Nama Anda *">
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="no_telpon" placeholder="No Telpon *">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" placeholder="Email (Optional)">
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" class="form-control" placeholder="Tuliskan Pesan Atau Doa Disini (Optional)" name="pesan" style="height:50px !important;"></textarea>
                            </div>
                            <div class="card">
                                <div class="card-footer bg-secondary text-white">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="anonim">Sembunyikan nama saya</label>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input jtoggler" id="anonim" name="anonim">
                                                <label class="custom-control-label" for="anonim"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-fill-out btn-block mt-30" style="width:100%">Lanjutkan Pembayaran</button>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
<script>
    $(function() {

        $('.jtoggler').jtoggler();

    });
    document.addEventListener('DOMContentLoaded', function() {
        const customNominalInput = document.querySelector('input[name="custom_nominal"]');
        const textNominal = document.getElementById('textNominal');
        const buttons = document.querySelectorAll('.btntogle label');

        // Initially hide the custom nominal input
        customNominalInput.style.display = 'none';

        // Handle button click to show/hide custom nominal input
        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                if (button.querySelector('input').value === 'custom') {
                    textNominal.textContent = "Isi nominal lain disini";
                    customNominalInput.style.display = 'block';
                } else {
                var formattedNominal = new Intl.NumberFormat('id-ID', {
                  style: 'currency',
                  currency: 'IDR'
                }).format(button.querySelector('input').value);

formattedNominal = formattedNominal.replace(',00', '');
                    textNominal.textContent = "Nominal Donasi : " + formattedNominal ;
                    customNominalInput.style.display = 'none';
                }
            });
        });
    });
</script>
<script type="text/javascript">
    var rupiah = document.getElementById('custom_nominal_input');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

@endsection