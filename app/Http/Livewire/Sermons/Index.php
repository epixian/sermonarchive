<?php

namespace App\Http\Livewire\Sermons;

use Livewire\Component;

class Index extends Component
{
    protected $sermons;

    public function mount()
    {
        $this->sermons = auth()->user()->sermons;
    }

    public function render()
    {
        return view('livewire.sermons.index', [
            'sermons' => $this->sermons,
        ]);
    }
}
