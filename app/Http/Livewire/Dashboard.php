<?php

namespace App\Http\Livewire;

use App\Models\Financial;
use App\Models\Mcap;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;
use Livewire\Livewire;
use Usernotnull\Toast\Concerns\WireToast;

class Dashboard extends Component
{
    use WireToast;


    public $firstRun = true;
    public $fYear = '';
    public $years = '';
    public $oldYear = '';
    public $mcap = '';
    public $mcap_date = '';
    public $networth = '';


    public function mount()
    {
        $this->fYear = (date('m') < 7) ? (date('Y') - 1) . '-'  . date('y') : date('Y') . '-' . (date('y') - 1);
        $this->oldYear = (date('m') < 7) ? (date('Y') - 2) . '-'  . date('y') - 1 : date('Y') - 1 . '-' . (date('y') - 2);
        $this->years = Financial::select('year')->distinct()->pluck('year');

        // $this->fYear = '2021-22';
        // $this->oldYear = '2020-21';
    }


    public function render()
    {

        

       
        $mcap_query = Mcap::latest()->first();

        $this->mcap = $mcap_query->mcap;
        $this->mcap_date = $mcap_query->ason_date;
        $this->networth = $mcap_query->networth;

        // $financials = Financial::orderBy('year', 'DESC')->orderBy('qtr', 'DESC')->limit(4)->get();

        $financials = Financial::where('year', $this->fYear)
            ->where('qtr', 'like', 'Q%')
            ->orderBy('qtr', 'ASC')->get();

        $oldFinancials = Financial::where('year', $this->oldYear)
            ->where('qtr', 'like', 'Q%')
            ->orderBy('qtr', 'ASC')->get();

        $multiColumnChart = LivewireCharts::multiColumnChartModel()
            ->setAnimated($this->firstRun)
            ->setTitle('PAT')
            ->multiColumn()
            ->setLegendVisibility(true)
            ->setDataLabelsEnabled(false)
            ->setColumnWidth(40)
            ->setXAxisCategories(['Q1', 'Q2', 'Q3', 'Q4'])
            ->withGrid();

        $multiColumnRevenueChart = LivewireCharts::multiColumnChartModel()
            ->setAnimated($this->firstRun)
            ->setTitle('Revenue')
            ->multiColumn()
            ->setLegendVisibility(true)
            ->setDataLabelsEnabled(false)
            ->setColumnWidth(40)
            ->setXAxisCategories(['Q1', 'Q2', 'Q3', 'Q4'])
            ->withGrid();
        $multiColumnExpenseChart = LivewireCharts::multiColumnChartModel()
            ->setAnimated($this->firstRun)
            ->setTitle('Expense')
            ->multiColumn()
            ->setLegendVisibility(true)
            ->setDataLabelsEnabled(false)
            ->setColumnWidth(40)
            ->setXAxisCategories(['Q1', 'Q2', 'Q3', 'Q4'])
            ->withGrid();

        // $PATChartModel = LivewireCharts::columnChartModel()
        //     ->setTitle('Profit After Tax for Year ' . $this->fYear)
        //     ->setAnimated($this->firstRun)
        //     ->setLegendVisibility(false)
        //     ->setDataLabelsEnabled(false)
        //     ->setColumnWidth(20)
        //     ->withGrid();

        // $PBTChartModel = LivewireCharts::lineChartModel()
        //     ->setTitle('Year ' . $this->fYear)
        //     ->setAnimated($this->firstRun)
        //     ->multiLine()
        //     ->withLegend()
        //     ->setLegendVisibility(true)
        //     ->setDataLabelsEnabled(true)
        //     ->setSmoothCurve()
        //     ->setXAxisVisible(true);
        // // ->sparklined();
        // $RevenueChartModel = LivewireCharts::lineChartModel()
        //     ->setTitle('Revenue for the Year ' . $this->fYear)
        //     ->setAnimated($this->firstRun)
        //     ->multiLine()
        //     ->withLegend()
        //     ->setLegendVisibility(true)
        //     ->setDataLabelsEnabled(true)
        //     ->setSmoothCurve()
        //     ->setXAxisVisible(true);
        foreach ($oldFinancials as $finanacial) {
            $multiColumnChart->addSeriesColumn($this->oldYear, $finanacial->qtr, $finanacial->PAT, '#6fda55');
            $multiColumnRevenueChart->addSeriesColumn($this->oldYear, $finanacial->qtr, $finanacial->revenue, '#6fda55');
            $multiColumnExpenseChart->addSeriesColumn($this->oldYear, $finanacial->qtr, $finanacial->expense, '#6fda55');
        }
        foreach ($financials as $finanacial) {
            // $PATChartModel->addColumn($finanacial->qtr, $finanacial->PAT, '#f6ad55');
            // // $PBTChartModel->addPoint($finanacial->qtr, $finanacial->PBT);
            // $PBTChartModel->addSeriesPoint('PAT', $finanacial->qtr, $finanacial->PAT, '#f6ad55');
            // $PBTChartModel->addSeriesPoint('PBT', $finanacial->qtr, $finanacial->PBT, '#f6ff55');
            // $PBTChartModel->addSeriesPoint('EBITDA', $finanacial->qtr, $finanacial->EBITDA, '#f64455');
            // $RevenueChartModel->addSeriesPoint('Revenue', $finanacial->qtr, $finanacial->revenue);
            // $RevenueChartModel->addSeriesPoint('Expense', $finanacial->qtr, $finanacial->expense);
            $multiColumnChart->addSeriesColumn($this->fYear, $finanacial->qtr, $finanacial->PAT, '#6fda55');
            $multiColumnRevenueChart->addSeriesColumn($this->fYear, $finanacial->qtr, $finanacial->revenue, '#6fda55');
            $multiColumnExpenseChart->addSeriesColumn($this->fYear, $finanacial->qtr, $finanacial->expense, '#6fda55');
        }

        

        return view('livewire.dashboard')
            ->with([
                'multiColumnChart' => $multiColumnChart,
                'multiColumnRevenueChart' => $multiColumnRevenueChart,
                'multiColumnExpenseChart' => $multiColumnExpenseChart,
                // 'PBTChartModel' => $PBTChartModel,
                // 'RevenueChartModel' => $RevenueChartModel
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
