<?php

namespace App\Http\Livewire;

use App\Models\TechMonthly as ModelsTechMonthly;
use Illuminate\Support\Facades\Date;
use Livewire\WithPagination;

use Livewire\Component;

class TechMonthly extends Component
{
    use WithPagination;
    public $year, $month, $plant, $throughput;
    public $highest_sendout, $highest_truck_no;
    public  $sendout_date, $truckload_date;
    public $isOpen, $perPage, $plant_filter;
    public $techID;


    protected $rules =  [
        'year' => 'required',
        'month'  => 'required',
        'plant'  => 'required',
        'throughput'  => 'required|numeric',
        'highest_sendout'  => 'required|numeric',
        'highest_truck_no'  => 'required|numeric',
        'sendout_date' => 'required|date',
        'truckload_date' => 'required|date',
    ];

    /**
     * Mount
     */
    public function mount()
    {
        $this->perPage = 5;
        
    }

    
    public function render()
    {
        return view('livewire.tech-monthly', ['techMonthlies' => ModelsTechMonthly::when($this->plant_filter, function($query,$plant_filter){
            return $query->where('plant', $plant_filter);
        })->paginate($this->perPage)]);
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
     * Save the record
     */
    public function store()
    {
        $validatedData = $this->validate();

        ModelsTechMonthly::updateOrCreate(['id' => $this->techID], $validatedData);

        session()->flash('message', $this->techID ? 'Record Updated Successfully.' : 'Record Created Successfully.');

        $this->closeModal();
        $this->_resetInputFields();
    }
 
    /**
     * Edit the Record
     */
    public function edit($id)
    {
        $tDaily = ModelsTechMonthly::findOrFail($id);
        $this->techID = $id;
        $this->year = $tDaily->year;
        $this->month = $tDaily->month;  $this->plant = $tDaily->plant; $this->throughput = $tDaily->throughput;
        $this->highest_sendout = $tDaily->highest_sendout;
        $this->highest_truck_no = $tDaily->highest_truck_no; 
        $this->sendout_date = $tDaily->sendout_date->format('Y-m-d');
        $this->truckload_date = $tDaily->truckload_date->format('Y-m-d');
        $this->openModal();
    }


    /**
     * Reset input fields
     */
    private function _resetInputFields()
    {

    $this->year = Date('Y'); 
    $this->month = Date('n');  $this->plant = ''; $this->throughput = '';
    $this->highest_sendout = 0;
    $this->highest_truck_no = 0; 
    $this->sendout_date = Date('Y-m-d');
    $this->truckload_date = Date('Y-m-d');
    $this->isOpen = '';

    }

    /**
     * Delete the Data
     */
    public function delete($id)
    {
        ModelsTechMonthly::find($id)->delete();
        session()->flash('message', 'Record Deleted Successfully.');
    }

}


