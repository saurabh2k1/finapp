<?php

namespace App\Http\Livewire;

use App\Exports\BulkDailyExport;
use App\Imports\BulkDailyImport;
use App\Models\TechDaily as ModelsTechDaily;
use Illuminate\Support\Facades\Date;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class TechDaily extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $tdate, $plant, $capacity_utilisation, $power_consumption;
    public $longterm_cargo_unloaded;
    public $spot_cargo_unloaded, $service_cargo_unloaded, $C2C3_throughput;
    public $isOpen, $perPage, $plant_filter, $startDate, $endDate;
    public $techID;
    public $isBulk;
    public $csvFile;

    protected $rules =  [
        'tdate' => 'required|date',
        'plant'  => 'required',
        'capacity_utilisation'  => 'required|numeric',
        'power_consumption'  => 'required|numeric',
        'longterm_cargo_unloaded'  => 'required|numeric',
        'service_cargo_unloaded'  => 'required|numeric',
        'spot_cargo_unloaded'  => 'required|numeric',
        'C2C3_throughput'  => 'required|numeric',
    ];

    /**
     * Mount
     */
    public function mount()
    {
        $this->perPage = 5;
        $this->plant_filter = '';
        // $this->startDate = '2022-02-01';
        // $this->endDate = '2022-02-28';
    }

    
    public function render()
    {
        
        $variable = ModelsTechDaily::when($this->plant_filter, function($query,$plant_filter){
            return $query->where('plant', $plant_filter);
        })->when($this->startDate, function($query, $startDate){
            return $query->where('tdate', '>=', $startDate);
        })->when($this->endDate, function($query, $endDate){
            return $query->where('tdate', '<=', $endDate);
        })
        ->paginate($this->perPage);
        // ->toSql();

     

        return view('livewire.tech-daily', ['techDailies' => $variable]);
    }



    /**
     * Create new entry
     */
    public function create()
    {
        $this->_resetInputFields();
        $this->openModal();

    }

    /**
     * Bulk Upload Click
     */
    public function bulkCreate()
    {
        $this->isBulk = true;
    }

    /**
     * Open Modal
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * Close Modal
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * CLose Bulk
     */
    public function closeBulk()
    {
        $this->isBulk = false;
    }

    /**
     * Save the record
     */
    public function store()
    {
        $validatedData = $this->validate();

        ModelsTechDaily::updateOrCreate(['id' => $this->techID], $validatedData);

        session()->flash('message', $this->techID ? 'Record Updated Successfully.' : 'Record Created Successfully.');

        $this->closeModal();
        $this->_resetInputFields();
    }

    /**
     * upload bulk data
     */
    public function bulkUpload()
    {
        $validatedData = $this->validate([
            'csvFile' => 'required',
        ]);
        
        Excel::import(new BulkDailyImport, $this->csvFile );
        $this->isBulk = false;
    }

    /**
     * Template Download
     */
    public function templateDownload()
    {
        return Excel::download(new BulkDailyExport, 'template.xlsx');
    }

    /**
     * Edit the Record
     */
    public function edit($id)
    {
        $tDaily = ModelsTechDaily::findOrFail($id);
        $this->techID = $id;
        $this->tdate = $tDaily->tdate->format('Y-m-d');
        $this->plant = $tDaily->plant;  $this->capacity_utilisation = $tDaily->capacity_utilisation; $this->power_consumption = $tDaily->power_consumption;
        $this->longterm_cargo_unloaded = $tDaily->longterm_cargo_unloaded;
        $this->spot_cargo_unloaded = $tDaily->spot_cargo_unloaded; $this->service_cargo_unloaded = $tDaily->service_cargo_unloaded; $this->C2C3_throughput = $tDaily->C2C3_throughput;

        $this->openModal();
    }


    /**
     * Reset input fields
     */
    private function _resetInputFields()
    {

    $this->tdate = Date('Y-m-d'); 
    $this->plant = '';  $this->capacity_utilisation = ''; $this->power_consumption = '';
    $this->longterm_cargo_unloaded = 0;
    $this->spot_cargo_unloaded = 0; $this->service_cargo_unloaded = 0; $this->C2C3_throughput = '';
    $this->isOpen = '';

    }

    /**
     * Delete the Data
     */
    public function delete($id)
    {
        ModelsTechDaily::find($id)->delete();
        session()->flash('message', 'Record Deleted Successfully.');
    }

}
