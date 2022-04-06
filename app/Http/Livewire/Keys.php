<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Keys extends Component
{
    public $key = '';
    public $base_id = '';
    
    public function mount()
    {
        $this->key = auth()->user()->base->key;
        $this->base_id = auth()->user()->base->base_id;
    }

    protected $rules = [
        'key' => 'required|starts_with:key',
        'base_id' => 'required|starts_with:app' 
    ];

    public function update()
    {
        $this->validate();

        auth()->user()->base->update([
            'key' => $this->key,
            'base_id' => $this->base_id
            ]);

         session()->flash('message', 'The keys saved successfully.');
       
    }

    public function render()
    {
        return view('livewire.keys');
    }
}
