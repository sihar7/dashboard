<?php

namespace App\Http\Livewire\Chart;

use Livewire\Component;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class Charts extends Component
{
    public function render()
    {
        return view('livewire.chart.charts');
    }
}
