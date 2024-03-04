<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use Illuminate\Support\Str;
use Livewire\Component;

class CreatePost extends Component
{
    public PostForm $form;

    public bool $success = false;

    public string $saveButtonTitle = '';

    public function mount(string $saveButtonTitle = 'Save'): void
    {
        $this->saveButtonTitle = $saveButtonTitle;
    }

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

    public function updatedFormTitleWithLongName(): void
    {
        $this->form->titleWithLongName = Str::headline($this->form->titleWithLongName);
    }

    public function render()
    {
        return view('livewire.create-post')
            ->title('Create Post');
    }
}
