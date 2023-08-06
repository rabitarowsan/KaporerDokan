<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        //$orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->paginate(5);
        //return view('admin.orders.index', compact('orders'));    
        
        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order:: when($request->date != null, function ($q) use ($request){
                            return $q->whereDate('created_at', $request->date);
                        }, function ($q) use ($todayDate){
                            return $q->whereDate('created_at', $todayDate);
                        })
                        ->when($request->status != null, function ($q) use ($request) {
                            return $q->where('status_message', $request->status);
                        })
                        ->paginate(10);
        return view('admin.orders.index', compact('orders'));

    }

    public function show($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if($order)
        {
            return view('admin.orders.view', compact('order'));
        }
        else
        {
            return redirect('admin/orders')->with('message', 'Order id not found!');
        }
    }

    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if($order)
        {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/'.$orderId)->with('message', 'Order Status Updated!');
        }
        else
        {
            return redirect('admin/orders/'.$orderId)->with('message', 'Order id not found!');
        }
    }

    public function viewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice');
    }
}
