<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;

    public int $commentsCount = 0;

    public bool $showComments = false;

    public function mount($post): void
    {
        $this->post = $post;
        $this->post->loadCount('comments');
        $this->commentsCount = $this->post->comments_count;
    }

    #[On('comment-added')]
    public function commentAdded(): void
    {
        $this->commentsCount++;
    }

    /**
     * @return Collection
     */
    #[Computed]
    public function comments(): Collection
    {
        return $this->post->comments()->fromNewToOld()->get();
    }

    public function render()
    {
        return view('livewire.show-post');
    }
}
