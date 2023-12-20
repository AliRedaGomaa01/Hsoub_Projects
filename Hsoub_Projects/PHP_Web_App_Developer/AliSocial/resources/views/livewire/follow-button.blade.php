<div>
    @if ($follow_state == 'Pending')
        <button wire:click="unpending"
            class="w-30 cursor-pointer bg-gray-400 text-white text-sm font-bold py-1 px-3 text-center rounded">{{ __('Pending') }}</button>
    @else
        <button wire:click="toggle_follow"
                class="{{$classes}} w-30 cursor-pointer text-sm font-bold py-1 px-3 text-center rounded">
            {{ __($follow_state) }}
        </button>
    @endif
</div>
