<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\CrowdFunding;
use App\Models\Order;
use App\Models\TemplatesPesan;
use Illuminate\Http\Request;

class SendMessagesController extends Controller
{
    public function send(Request $request)
    {
        $templates = TemplatesPesan::where('id', $request->templates_id)->first();
        $order = Order::where('id', $request->id)->first();
        $crowd_funding = CrowdFunding::where('id', $order->crowd_funding_id)->first();

        if (strpos($templates->messages, '{$nama}') !== false) {
            $templates->messages = str_replace('{$nama}', $order->nama, $templates->messages);
        }

        if (strpos($templates->messages, '{$nominal}') !== false) {
            $nominalFormatted = number_format($order->nominal, 2, ',', '.');
$nominalFormatted = rtrim($nominalFormatted, ',00');
            $templates->messages = str_replace('{$nominal}', "Rp" . $nominalFormatted . "", $templates->messages);
        }

        if (strpos($templates->messages, '{$link_bayar}') !== false) {
            $templates->messages = str_replace('{$link_bayar}', url("/payment/" . $order->id), $templates->messages);
        }

        if (strpos($templates->messages, '{$program}') !== false) {
            $templates->messages = str_replace('{$program}', $crowd_funding->title, $templates->messages);
        }

        $target = $order->no_telpon;
        $token = "cZaKe6+VnkyASPu0m1d0";
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
                'message' => $templates->messages
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        Alert::success('Berhasil', 'Pesan berhasil terkirim!');

        return redirect()->back();
    }

    public function sendAndSuccess(Request $request)
    {
        $templates = TemplatesPesan::where('id', $request->templates_id)->first();
        $order = Order::where('id', $request->id)->first();
        $crowd_funding = CrowdFunding::where('id', $order->crowd_funding_id)->first();

        if (strpos($templates->messages, '{$nama}') !== false) {
            $templates->messages = str_replace('{$nama}', $order->nama, $templates->messages);
        }

        if (strpos($templates->messages, '{$nominal}') !== false) {
                        $nominalFormatted = number_format($order->nominal, 2, ',', '.');
$nominalFormatted = rtrim($nominalFormatted, ',00');
            $templates->messages = str_replace('{$nominal}', "Rp" . $nominalFormatted . "", $templates->messages);
   
        }

        if (strpos($templates->messages, '{$link_bayar}') !== false) {
            $templates->messages = str_replace('{$link_bayar}', url("/payment/" . $order->id), $templates->messages);
        }

        if (strpos($templates->messages, '{$program}') !== false) {
            $templates->messages = str_replace('{$program}', $crowd_funding->title, $templates->messages);
        }

        $target = $order->no_telpon;
        $token = "cZaKe6+VnkyASPu0m1d0";
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
                'message' => $templates->messages
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        Order::where('id', $request->id)->update([
            'status' => "done"
        ]);

        Alert::success('Berhasil', 'Pesan terkirim dan status pesanan diperbarui!');

        return redirect()->back();
    }

    // Metode lainnya...

}
