<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'location' => 'required',
            'guests' => 'required|integer',
            'arrivals' => 'required|date',
            'leaving' => 'required|date',
        ]);

        // Simpan data ke database
        $order = new Order([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'location' => $request->location,
            'guests' => $request->guests,
            'arrivals' => $request->arrivals,
            'leaving' => $request->leaving,
            'status' => 'menunggu approval admin',
            'user_id' => Auth::id(),
        ]);

        $order->save();

        return redirect()->route('index')->with('success', 'Booking berhasil disimpan.');
    }

    public function history()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        
        return view('history', ['orders' => $orders, 'username' => $user->username]);
    }
    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Order berhasil dihapus.');
    }
}
