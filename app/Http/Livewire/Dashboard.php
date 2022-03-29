<?php

namespace App\Http\Livewire;

use App\Models\Financial;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;
use Livewire\Livewire;

class Dashboard extends Component
{
    public $firstRun = true;
    public $fYear = '';
    public $years = '';


    public function mount()
    {
        $this->fYear = (date('m') < 4) ? (date('Y') - 1) . '-'  . date('y') : date('Y') . '-' . (date('y') - 1);
        $this->years = Financial::select('year')->distinct()->pluck('year');
    }

    public function render()
    {


        $financials = Financial::where('year', $this->fYear)
            ->where('qtr', 'like', 'Q%')
            ->orderBy('qtr', 'ASC')->get();


        $PATChartModel = LivewireCharts::columnChartModel()
            ->setTitle('Profit After Tax for Year ' . $this->fYear)
            ->setAnimated($this->firstRun)
            ->setLegendVisibility(false)
            ->setDataLabelsEnabled(false)
            ->setColumnWidth(20)
            ->withGrid();

        $PBTChartModel = LivewireCharts::lineChartModel()
            ->setTitle('Year ' . $this->fYear)
            ->setAnimated($this->firstRun)
            ->multiLine()
            ->withLegend()
            ->setLegendVisibility(true)
            ->setDataLabelsEnabled(true)
            ->setSmoothCurve()
            ->setXAxisVisible(true);
        // ->sparklined();
        $RevenueChartModel = LivewireCharts::lineChartModel()
            ->setTitle('Revenue for the Year ' . $this->fYear)
            ->setAnimated($this->firstRun)
            ->multiLine()
            ->withLegend()
            ->setLegendVisibility(true)
            ->setDataLabelsEnabled(true)
            ->setSmoothCurve()
            ->setXAxisVisible(true);
        foreach ($financials as $finanacial) {
            $PATChartModel->addColumn($finanacial->qtr, $finanacial->PAT, '#f6ad55');
            // $PBTChartModel->addPoint($finanacial->qtr, $finanacial->PBT);
            $PBTChartModel->addSeriesPoint('PAT', $finanacial->qtr, $finanacial->PAT, '#f6ad55');
            $PBTChartModel->addSeriesPoint('PBT', $finanacial->qtr, $finanacial->PBT, '#f6ff55');
            $PBTChartModel->addSeriesPoint('EBITDA', $finanacial->qtr, $finanacial->EBITDA, '#f64455');
            $RevenueChartModel->addSeriesPoint('Revenue', $finanacial->qtr, $finanacial->revenue);
            $RevenueChartModel->addSeriesPoint('Expense', $finanacial->qtr, $finanacial->expense);
        }

        return view('livewire.dashboard')
            ->with([
                'PATChartModel' => $PATChartModel,
                'PBTChartModel' => $PBTChartModel,
                'RevenueChartModel' => $RevenueChartModel
            ]);
    }

    /**
     * To Change the FY
     */
    public function changeYear($year)
    {
        //$this->fYear = $year;
    }
}
