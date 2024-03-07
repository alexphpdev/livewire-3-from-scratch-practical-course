<div class="p-6 text-gray-900 dark:text-gray-100">
    <div>
        <div class="block font-medium text-sm text-gray-700">Title</div>
        <div class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{$post->title}}</div>
    </div>

    <div class="mt-4">
        <div class="block font-medium text-sm text-gray-700">Body</div>
        <div class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{$post->body}}</div>
    </div>

    <p>Comments: {{ $commentsCount }}</p>

    <livewire:create-comment :post="$post" />

    <button type="button" wire:click="$toggle('showComments')" class="block mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
        Show/Hide comments
    </button>

    @if($showComments)
        <div class="mt-4">
            @foreach($this->comments() as $comment)
                <div class="border-b-fuchsia-200 border-b-2 mb-3">
                    <div><span class="font-bold">Email:</span> {{$comment->email}}</div>
                    <div><span class="font-bold">Text:</span> {{$comment->text}}</div>
                </div>
            @endforeach
        </div>
    @endif
</div>
