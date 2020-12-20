<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bitcoin Wallet') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-8 sm:px-6 lg:px-8">
    <div class="mt-10 sm:mt-0">
    @foreach ($wallet as $wallets)
    <x-jet-action-section>
    <x-slot name="title">
        {{ __('Wallet QR') }}
        
    </x-slot>

    <x-slot name="description">
        {{ __('Scan this QR to instantly input public key') }}
    </x-slot>
        <x-slot name="content">
            <div style="padding: 1; margin-left: 7.5%;">
            {!! QrCode::style('round')->size(300)->format('svg')->generate($wallets->wallet_address); !!}
            </div>
        </x-slot>
    </x-jet-action-section>

    <x-jet-section-border />


    <x-jet-action-section style="margin-top: 15px;">
        <x-slot name="title">
            {{ __('Public Key') }}
            
        </x-slot>

        <x-slot name="description">
            {{ __('This is your public address on the public blockchain to receive BTC Funds') }}
        </x-slot>

        <x-slot name="content">
            {{ $wallets->wallet_address }}
        </x-slot>
    </x-jet-action-section>

    <x-jet-section-border />

    <x-jet-action-section style="margin-top: 15px;">
        <x-slot name="title">
            {{ __('Balance') }}
            
        </x-slot>

        <x-slot name="description">
            {{ __('This is your wallet balance details') }}
        </x-slot>

        <x-slot name="content">
            {{ $balance }}
        </x-slot>
    </x-jet-action-section>
    @endforeach


    <x-jet-section-border />

    <x-jet-action-section style="margin-top: 15px;">
        
        <x-slot name="title">
            {{ __('Send Funds') }}
            
        </x-slot>

        <x-slot name="description">
            {{ __('Spend your available BTC Balance') }}
        </x-slot>

        <x-slot name="content">
        
            <form method="post" class="form" action="/wallet/send">
                @csrf               
                <label for="address">Address</label>
                <input name="address" class="form-input rounded-md form-control shadow-sm block mt-1 w-full" id="address" type="text">

                <label for="amount">Amount</label>
                <input name="amount" class="form-input rounded-md form-control shadow-sm block mt-1 w-full" id="amount" id="amount" type="text"></input>
               
              

                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" type="submit" style="margin-top:10px;" >Send</button>
            </form>
        
        </x-slot>
    </x-jet-action-section>






    
    </div>
    </div>
</x-app-layout>
