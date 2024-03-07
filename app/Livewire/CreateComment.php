<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateComment extends Component
{
    public Post $post;

    #[Validate('required')]
    public string $body = '';

    #[Validate('required|email')]
    public string $email = '';

    public function save(): void
    {
        $this->post->comments()->create([
            'email' => $this->email,
            'text'  => $this->body,
        ]);

        $this->dispatch('comment-added');

        $this->reset('body', 'email');
    }

    public function render()
    {
        return view('livewire.create-comment');
    }
}
