<?php

namespace App\Livewire;

use App\Models\LogStatus;
use App\Models\Pembayaran;
use Livewire\Attributes\On;
use Livewire\Component;

class AdminVerifikasiPembayaran extends Component
{
    public $pembayarans;
    public $statusForm = [];
    public $selectedPembayaranId;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->pembayarans = Pembayaran::all();
    }


    public function changeStatus(Pembayaran $item, $status)
    {
        // dd($item);
        // dd($status);
        $idPendaftar = $item->id_user;

        $item->update([
            'status' => $status
        ]);

        // Update the status in the log_statuses table
        $logStatus = LogStatus::where('aktivitas', 'Pembayaran')
            ->where('id_entitas', $idPendaftar)
            ->first();

        if ($logStatus) {
            $logStatus->update([
                'status' => $status,
                'id_admin' => auth()->user()->id_user
            ]);
        }

        $this->pembayarans = Pembayaran::all();
        session()->flash('message', 'Status pembayaran berhasil diubah');
    }



    public function render()
    {
        return view('livewire.admin-verifikasi-pembayaran', [
            'pembayarans' => Pembayaran::all(),
        ]);
    }
}
