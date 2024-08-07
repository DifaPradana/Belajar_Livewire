<?php

namespace App\Livewire;

use App\Models\LogStatus;
use App\Models\Pendaftaran;
use Livewire\Component;

class AdminVerifikasiPendaftaran extends Component
{
    public $pendaftarans;
    public $existingPendaftaran;



    public function mount()
    {
        $this->pendaftarans = Pendaftaran::all();
    }

    public function changeStatus(Pendaftaran $item, $status)
    {
        // dd($item);
        // dd($status);
        $idPendaftar = $item->id_user;

        $item->update([
            'status' => $status
        ]);

        // Update the status in the log_statuses table
        $logStatus = LogStatus::where('aktivitas', 'Pendaftaran')
            ->where('id_entitas', $idPendaftar)
            ->first();

        if ($logStatus) {
            $logStatus->update([
                'status' => $status,
                'id_admin' => auth()->user()->id_user
            ]);
        }

        session()->flash('message', 'Status pembayaran berhasil diubah');
    }

    public function render()
    {
        return view('livewire.admin-verifikasi-pendaftaran');
    }
}
