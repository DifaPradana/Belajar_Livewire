<?php

namespace App\Livewire;

use App\Models\LogStatus;
use Livewire\Component;

class DashboardUser extends Component
{

    public $histori;
    public $aktivitas;
    public $id_entitas;
    public $status;
    public $keterangan;

    public function mount()
    {
        $this->histori  = LogStatus::where('id_entitas', auth()->user()->id_user)->get();
    }

    public function render()
    {
        return view('livewire.dashboard-user');
    }
}
