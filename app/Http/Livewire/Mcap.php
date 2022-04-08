<?php

namespace App\Http\Livewire;

use App\Models\Mcap as ModelsMcap;
use Livewire\Component;
use Livewire\WithPagination;

class Mcap extends Component
{
    use WithPagination;

    public $ason_date, $share_no, $share_price, $mcap, $networth;
    public $perPage, $mcap_id;
    public $isOpen = false;

    protected $rules = [
        'ason_date' => 'required|date',
        'share_no'  => 'required|numeric', 
        'share_price' => 'required|numeric', 
        'mcap'      => 'required|numeric', 
        'networth'  => 'required|numeric',
    ];

    /**
     * Mount
     */
    public function mount()
    {
        $this->perPage = 5;
    }

    /**
     * Display all
     */
    public function render()
    {
        return view('livewire.mcap', ['mcaps' => ModelsMcap::paginate($this->perPage)]);
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
     * Save the Data in Table
     */
    public function store()
    {
        $validatedData = $this->validate();

        ModelsMcap::updateOrCreate(['id' => $this->mcap_id], $validatedData);

        session()->flash('message', $this->mcap_id ? 'Financial Updated Successfully.' : 'Financial Created Successfully.');

        $this->closeModal();
        $this->_resetInputFields();
    }

    /**
     * Edit the Data
     */
    public function edit($id)
    {
        $mcap = ModelsMcap::findOrFail($id);
        $this->ason_date = $mcap->ason_date->format('Y-m-d');
        $this->share_no = $mcap->share_no;
        $this->share_price = $mcap->share_price;
        $this->mcap = $mcap->mcap;
        $this->networth = $mcap->networth;
        $this->mcap_id = $id;

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
     * Update market Cap
     */
    public function updateMcap()
    {
        $this->mcap = $this->share_no * $this->share_price;
    }

    /**
     * Reset input fields
     */
    private function _resetInputFields()
    {
        $this->ason_date = date('Y-m-d');
        $this->share_no = 0;
        $this->share_price = 0;
        $this->mcap = 0;
        $this->networth = 0;
        $this->mcap_id = "";
    } 

}
