<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        // Simpan data ke database
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Berhasil, tampilkan alert
        return back()->with('success', 'Akun berhasil dibuat.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            $user = Auth::user();

            // Redirect sesuai role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('index')->with('username', $user->username);
            }
        } else {
            // Jika login gagal
            return back()->with('error', 'Username atau password salah.');
        }
    }

    public function adminDashboard()
    {
        // Ambil semua data booking
        $orders = Order::all();

        // Ambil username admin yang sedang login
        $adminUsername = Auth::user()->username;

        return view('admin.dashboard', [
            'orders' => $orders,
            'adminUsername' => $adminUsername
        ]);
    }

    public function aboutSection()
    {
        return view('about');
    }

    public function serviceSection()
    {
        return view('services');
    }

    public function bookSection()
    {
        return view('book');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function updateHelper(Request $request, Order $order)
    {
        $order->update([
            'helper' => $request->helper,
        ]);

        return redirect()->back()->with('success', 'Helper updated successfully.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
    public function downloadPdf($orderId)
    {
        $order = Order::findOrFail($orderId);
        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf.order', compact('order'))->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('order_' . $order->id . '.pdf');
    }
}
