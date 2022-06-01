<?php

namespace App\Http\Livewire;

use App\Models\TechnicalPerformace;
use Livewire\Component;
use Livewire\WithPagination;

class TechnicalPerformance extends Component
{
    use WithPagination;

    public $isOpen, $perPage;
    public $period, $throughput, $Data_id;

    protected $rules =  [
        'period' => 'required|string|max:200',
        'throughput'  => 'required|string|max:200',
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
        return view('livewire.technical-performance', ['techPerformances' => TechnicalPerformace::paginate($this->perPage)]);
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
     * Reset input fields
     */
    private function _resetInputFields()
    {
        $this->Data_id = '';
        $this->period = '';   
        $this->throughput = '';
    } 

    /**
     * Save the Data in Table
     */
    public function store()
    {
        $validatedData = $this->validate();

        TechnicalPerformace::updateOrCreate(["id" => $this->Data_id], $validatedData);

        toast()
        ->success($this->Data_id ? 'Record Updated Successfully.' : 'Record Created Successfully.', 'Message')
        ->push();
       

        $this->closeModal();
        $this->_resetInputFields();
    }

    /**
     * Edit the Data
     */
    public function edit($id)
    {
        $data = TechnicalPerformace::findOrFail($id);
        $this->Data_id = $id;
        $this->period = $data->period;
        $this->throughput = $data->throughput;
        
        $this->openModal();
    }


}
