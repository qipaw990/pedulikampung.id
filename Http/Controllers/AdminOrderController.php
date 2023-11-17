<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TemplatesPesan;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $data["title"] = "Data Transaksi Pending";
        $data['data'] = Order::where('status', 'pending')->orderBy('created_at')->get();
        $data["pesan"] = TemplatesPesan::all();
        return view('admin.order.index', $data);
    }
    public function confirm_user()
    {
        $data["title"] = "Data Transaksi User Konfirmasi";
        $data['data'] = Order::where('status', 'confirm_user')->orderBy('created_at')->get();
        $data["pesan"] = TemplatesPesan::all();

        return view('admin.order.confirm_user', $data);
    }
    public function success()
    {
        $data["title"] = "Data Transaksi Success";
        $data['data'] = Order::where('status', 'done')->orderBy('created_at')->get();
        $data["pesan"] = TemplatesPesan::all();

        return view('admin.order.success', $data);
    }
    public function delete($orderId)
    {
        // Find the order by ID
        $order = Order::find($orderId);

        // Check if the order exists
        if (!$order) {
            // Handle the case where the order does not exist, e.g., show an error message or redirect
            return redirect()->route('admin.orders.index')->with('error', 'Order not found.');
        }

        // Delete the order
        $order->delete();

            alert()->success('Berhasil', 'Pesan berhasil di hapus!');

        return redirect()->back()->with('success', 'Order deleted successfully.');
    }

}
