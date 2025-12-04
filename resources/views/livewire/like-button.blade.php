<div>
    @if ($liked)
        <button wire:click="like" class="p-2">
            @include('components.custom.liked-logo')
        </button>
    @else
        <button wire:click="like" class="p-2">
            @include('components.custom.unliked-logo')
        </button>
    @endif
</div>
