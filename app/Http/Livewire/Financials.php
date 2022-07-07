<?php

namespace App\Http\Livewire;

use App\Models\Financial;
use Livewire\Component;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class Financials extends Component
{
    use WireToast;
    use WithPagination;

    // public $financials; 
    public $year, $qtr, $PBT, $PAT, $EBITDA;
    public $revenue, $margin, $expense;
    public $financial_id;
    public $isOpen = false;

    public $perPage;

    protected $rules =  [
        'year' => 'required',
        'qtr'  => 'required',
        'PBT'  => 'required|numeric',
        'PAT'  => 'required|numeric',
        'EBITDA'  => 'required|numeric',
        'revenue'  => 'required|numeric',
        'margin'  => 'required|numeric',
        'expense'  => 'required|numeric',
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
        // $this->financials = Financial::all()->sortByDesc('qtr')->sortByDesc('year');
        // return view('livewire.financials');
       
        return view('livewire.financials', ['financials' => Financial::orderBy('id', 'ASC')->paginate($this->perPage)]);
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
        $this->financial_id = '';
        $this->year = '';  $this->qtr = ''; 
        $this->PBT = ''; $this->PAT = ''; $this->EBITDA = '';
        $this->revenue = ''; $this->margin = ''; $this->expense = '';
    } 

    /**
     * Save the Data in Table
     */
    public function store()
    {
        $validatedData = $this->validate();

        Financial::updateOrCreate(['id' => $this->financial_id], $validatedData);

        toast()
        ->success($this->financial_id ? 'Record Updated Successfully.' : 'Record Created Successfully.', 'Message')
        ->push();
        session()->flash('message', $this->financial_id ? 'Financial Updated Successfully.' : 'Financial Created Successfully.');

        $this->closeModal();
        $this->_resetInputFields();
    }

    /**
     * Edit the Data
     */
    public function edit($id)
    {
        $financial = Financial::findOrFail($id);
        $this->financial_id = $id;
        $this->year = $financial->year;  $this->qtr = $financial->qtr; 
        $this->PBT = $financial->PBT; $this->PAT = $financial->PAT; $this->EBITDA = $financial->EBITDA;
        $this->revenue = $financial->revenue; $this->margin = $financial->margin; $this->expense = $financial->expense;

        $this->openModal();
    }

    /**
     * Delete the Data
     */
    public function delete($id)
    {
        Financial::find($id)->delete();
        toast()
        ->warning('Record Deleted Successfully.', 'App')
        ->push();
        session()->flash('message', 'Financial Deleted Successfully.');
    }

    

}
