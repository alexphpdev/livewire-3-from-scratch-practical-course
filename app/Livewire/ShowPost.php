<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;

    public function mount($post): void
    {
        $this->post = $post;
    }

    /**
     * @return Collection
     */
    #[Computed]
    public function comments(): Collection
    {
        return $this->post->comments;
    }

    public function render()
    {
        return view('livewire.show-post');
    }
}
