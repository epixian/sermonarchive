<?php

namespace App\Http\Livewire\Sermons;

use App\Sermon;
use Livewire\Component;

class Show extends Component
{
    protected $sermon;

    public function mount(Sermon $sermon)
    {
        $this->sermon = $sermon;
    }

    public function render()
    {
        return view('livewire.sermons.show', [
            'sermon' => $this->sermon,
        ]);
    }
}
