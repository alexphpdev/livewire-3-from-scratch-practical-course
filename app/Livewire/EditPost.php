<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditPost extends Component
{
    public PostForm $form;

    public bool $success = false;

    public function mount(Post $post): void
    {
        $this->form->setPost($post);
    }

    public function update(): void
    {
        $this->validate();

        $this->form->update();

        $this->success = true;
    }

    #[Title('Edit Post')]
    public function render()
    {
        return view('livewire.edit-post');
    }
}
