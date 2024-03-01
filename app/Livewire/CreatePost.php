<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use Livewire\Component;

class CreatePost extends Component
{
    public PostForm $form;

    public bool $success = false;

    public function save(): void
    {
        $this->validate();

        $this->form->save();

        $this->success = true;
    }

    public function validateTitle(): void
    {
        $this->validateOnly('form.title');
    }

    public function validateBody(): void
    {
        $this->validateOnly('form.body');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
