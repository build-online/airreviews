<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Base;

class Keys extends Component
{
    public $key = '';
    public $base_id = '';
    
    public function mount()
    {
        $base = Base::firstOrNew(['user_id' => auth()->user()->id]);
        $this->key = $base->key;
        $this->base_id = $base->base_id;
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
