<?php

namespace App\Http\Livewire\Sermons;

use App\Sermon;
use Livewire\Component;

class Index extends Component
{
    protected $sermons;

    public function mount()
    {
        if (auth()->user())
            $this->sermons = auth()->user()->sermons;
        else
            $this->sermons = Sermon::all();
    }

    public function render()
    {
        return view('livewire.sermons.index', [
            'sermons' => $this->sermons,
        ]);
    }
}
