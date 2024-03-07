<div class="mt-4">
    <form method="POST" wire:submit="save">
        <div>
            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
            <input type="email" wire:model="email" id="email" class="block mt-1 mb-2 w-full border-gray-300 rounded-md shadow-sm">
            <label for="body" class="block font-medium text-sm text-gray-700">Body</label>
            <textarea id="body" wire:model="body" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('body')
            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
            Save
        </button>
    </form>
</div>
