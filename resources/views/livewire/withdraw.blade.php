<div>
<x-jet-form-section style="margin-top: 15px;" submit="sendFunds">
        <x-slot name="title">
            {{ __('Send Funds') }}
            
        </x-slot>

        <x-slot name="description">
            {{ __('Spend your available BTC Balance') }}
            {{ $address }}
        </x-slot>

        <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Wallet Address') }} " />
            <x-jet-input id="address" type="text" class="mt-1 block w-full " />
            <x-jet-input-error for="address" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="amount" value="{{ __('Amount (BTC)') }}" />
            <x-jet-input id="amount" type="text" class="mt-1 block w-full" />
            <x-jet-input-error for="address" class="mt-2" />
        </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-button wire:loading.attr="enabled" wire:click="sendFunds">
                {{ __('Send') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

</div>
