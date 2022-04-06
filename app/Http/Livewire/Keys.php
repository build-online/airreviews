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

    public function saveKeys()
    {
        auth()->user()->base->update([
            'key' => $this->key,
            'base_id' => $this->base_id
            ]);
    }

    public function render()
    {
        return view('livewire.keys');
    }
}
