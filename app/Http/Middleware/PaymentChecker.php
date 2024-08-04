<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PaymentChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $pembayaran = $user->pembayaran; // Mengambil data pembayaran terkait

        if ($pembayaran === null) {
            session()->flash('error', 'Anda belum melakukan pembayaran');
            return redirect()->route('dashboard-pendaftaran');
        } else if ($pembayaran->status === 'Ditolak') {
            session()->flash('error', 'Pembayaran Anda ditolak');
            return redirect()->route('dashboard-pendaftaran');
        } else if ($pembayaran->status !== 'Terverifikasi') {
            session()->flash('error', 'Pembayaran Anda Belum Terverifikasi');
            return redirect()->route('dashboard-pendaftaran');
        }

        return $next($request);
    }
}
