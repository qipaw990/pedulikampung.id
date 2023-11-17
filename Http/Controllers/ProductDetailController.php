<?php

namespace App\Http\Controllers;

use App\Models\CrowdFunding;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProductDetailController extends Controller
{
    public function index($id)
    {
        $data["title"] = "Detail Crowd Funding";
        $data['data'] = CrowdFunding::where('id', $id)->first();
        $data['total'] = Order::where(['crowd_funding_id' => $id, 'status' => 'done'])->sum('nominal');
        $data["users"] = Order::where(['crowd_funding_id' => $id, 'status' => 'done'])->get();
        return view('user.productDetail.index', $data);
    }
}
