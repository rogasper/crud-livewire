<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $page_title }}
        </h2>
    </x-slot>
    {{-- content --}}
    <div class="py-12">
    @livewire('customer.form', ['model' => $data])
    </div>

</x-app-layout>