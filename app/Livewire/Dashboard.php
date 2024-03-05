<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{

    public function render()
    {
        return view('livewire.dashboard', [
            'compras' => user()->compras()->orderBy('created_at', 'desc')->paginate(5)
        ]);
    }

    public function boot()
    {
        $this->js('initFlowbite()');
    }
}
