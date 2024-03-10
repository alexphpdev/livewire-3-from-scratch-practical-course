<div class="space-y-1">
    @foreach($comments as $comment)
        <div class="border-b-fuchsia-200 border-b-2 mb-3">
            <div><span class="font-bold">Email:</span> {{$comment->email}}</div>
            <div><span class="font-bold">Text:</span> {{$comment->text}}</div>
        </div>
    @endforeach
</div>


