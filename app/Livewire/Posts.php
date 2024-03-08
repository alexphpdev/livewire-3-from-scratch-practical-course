<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Url;
use Livewire\Component;

class Posts extends Component
{
    #[Url(as: 'q', history: true)]
    public string $search = '';

    public function render()
    {
        // for show progressbar
        sleep(3);

        $posts = Post::query()
            ->where('title', 'LIKE', "%$this->search%")
            ->paginate(10);

        return view('livewire.posts', ['posts' => $posts]);
    }
}
