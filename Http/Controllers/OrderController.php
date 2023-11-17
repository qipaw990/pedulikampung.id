<?php

namespace App\Http\Controllers;

use App\Models\CrowdFunding;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($id)
    {
        $data["title"] = "Pembayaran";
        $data['data'] = CrowdFunding::where('id', $id)->first();

        return view('user.order.index', $data);
    }
    public function store(Request $request, $id)
    {
        $today = date("Y-m-d");
        $crowd_funding = CrowdFunding::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telpon' => 'required|string|max:255',
            'nominal' => 'required',
        ]);
        if (isset($request->anonim)) {
            if (isset($request->custom_nominal)) {
                $nml = $request->custom_nominal;

                $nml = preg_replace("/[^0-9]/", "", $nml);

                // Convert the string to an integer
                $nml = (int) $nml + Order::whereRaw('DATE(created_at) = ?', [$today])->count() + 1;

                $nominal = $nml;

                $order = Order::create([
                    'nama' => $request->nama,
                    'no_telpon' => $request->no_telpon,
                    'email' => $request->email,
                    'nominal' => $nominal,
                    'pesan' => $request->pesan,
                    'is_anonim' => "true",
                    'metode_pembayaran' => $request->metode_pembayaran,
                    'crowd_funding_id' => $crowd_funding->id,
                ]);
            } else {
                $nominal = $request->nominal + Order::whereRaw('DATE(created_at) = ?', [$today])->count() + 1;

                $order = Order::create([
                    'nama' => $request->nama,
                    'no_telpon' => $request->no_telpon,
                    'email' => $request->email,
                    'nominal' => $nominal,
                    'pesan' => $request->pesan,
                    'is_anonim' => "true",
                    'metode_pembayaran' => $request->metode_pembayaran,
                    'crowd_funding_id' => $crowd_funding->id,
                ]);
            }
        } else {
            if (isset($request->custom_nominal)) {
                $nml = $request->custom_nominal;

                $nml = preg_replace("/[^0-9]/", "", $nml);

                // Convert the string to an integer
                $nml = (int) $nml + Order::whereRaw('DATE(created_at) = ?', [$today])->count() + 1;

                $nominal = $nml;

                $order = Order::create([
                    'nama' => $request->nama,
                    'no_telpon' => $request->no_telpon,
                    'email' => $request->email,
                    'nominal' => $nominal,
                    'pesan' => $request->pesan,
                    'is_anonim' => "false",
                    'metode_pembayaran' => $request->metode_pembayaran,
                    'crowd_funding_id' => $crowd_funding->id,
                ]);
            } else {
                $nominal = $request->nominal + Order::whereRaw('DATE(created_at) = ?', [$today])->count() + 1;

                $order = Order::create([
                    'nama' => $request->nama,
                    'no_telpon' => $request->no_telpon,
                    'email' => $request->email,
                    'nominal' => $nominal,
                    'pesan' => $request->pesan,
                    'is_anonim' => "false",
                    'metode_pembayaran' => $request->metode_pembayaran,
                    'crowd_funding_id' => $crowd_funding->id,
                ]);
            }
        }




        return redirect(route('order.payment', $order->id));
    }
    public function payment($id)
    {
        $data["title"] = "Total Pembayaran";
        $data["data"] = Order::where('id', $id)->first();
        return view('user.payment.index', $data);
    }
    public function userConfirm($id)
    {
        $order = Order::where('id', $id);
        $order->update([
            'status' => "confirm_user"
        ]);
        $order = $order->first();
        $target = "6285664648606";
        $token = "cZaKe6+VnkyASPu0m1d0";
        $pesan = $order->nama . " melakukan konfirmasi atas donasi " . $order->cf->title . " sejumlah Rp" . number_format($order->nominal, 0, ',', '.');

        $template = "Notifikasi!!!

" . $pesan . "

Harap segera lakukan validasi.

Terima kasih";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $template
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = [
            'message' => 'Pembayaran berhasil di konfirmasi'
        ];


        return response()->json($response);
    }
    private function generateUniqueNominal($nominalAwal)
    {
        $nominal = (int) $nominalAwal + rand(100, 600);

        while (Order::where('nominal', $nominal)->exists()) {
            $nominal = rand(100, 999);
        }

        return $nominal;
    }
}
