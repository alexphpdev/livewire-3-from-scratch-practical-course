<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class TodoInfo extends Component
{
    #[Reactive]
    public Todo $todo;

    public function render()
    {
        return view('livewire.todo-info');
    }
}
