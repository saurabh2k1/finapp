<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;


class UserManagement extends Component
{
    use WireToast, WithPagination;  
    

    public $isOpen = false;
    public $perPage;
    public $name, $email, $role, $password;
    public $userId;

    
    /**
     * Mount
     */
    public function mount()
    {
        $this->perPage = 5;
    }

    public function render()
    {
        
        return view('livewire.user-management', ['users' => User::paginate($this->perPage)]);
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

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required',
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('Welcome@1'),
            'role' => $this->role,
        ]);
        toast()
        ->success('Record Created Successfully.', 'Message')
        ->push();
        $this->closeModal();
        $this->_resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        //$this->password = $user->password;
        $this->role = $user->role;
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required',
        ]);
       User::find($this->userId)->update([
        'name' => $this->name,
        'email' => $this->email,
        'role' => $this->role,
       ]);
       toast()
        ->success('Record Updated Successfully.', 'Message')
        ->push();
        $this->closeModal();
        $this->_resetInputFields();
    }

    private function _resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->role = '';
        $this->password = '';
        $this->userId = '';

    }


}
