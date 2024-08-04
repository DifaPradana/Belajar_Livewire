<?php

namespace App\Livewire;

use App\Models\Pendaftaran;
use Livewire\Component;

class ChartComponent extends Component
{
    public $chartData;

    public function mount($chartData)
    {
        $this->chartData = Pendaftaran::pluck('jenis_kelamin', 'id_jenis_kelamin');
    }

    public function render()
    {
        return view('livewire.chart-component');
    }
}
