<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Component;

class ShowComments extends Component
{
    public Collection $comments;

    public function mount(Post $post): void
    {
        sleep(3);
        $this->comments = $post->comments()->fromNewToOld()->get();
    }

    public function placeholder(): string
    {
        return <<<'HTML'
            <div>
                Loading...
            </div>
        HTML;
    }

    public function render()
    {
        return view('livewire.show-comments');
    }
}
