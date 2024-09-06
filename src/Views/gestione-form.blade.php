<x-filament-panels::page>
    <div class="space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="p-6 bg-white shadow sm:rounded-lg">
                <div class="space-y-6 text-gray-900">

                    <div class="border border-gray-300 rounded-lg p-6">
                        <form wire:submit.prevent="getData">
                            <div class="space-y-6">
                                <label class="block text-sm font-medium text-gray-700">Ricerca gruppo</label>
                                <x-filament::input.wrapper>
                                    <x-filament::input label="Inserisci un dato" wire:model="inputData" class="block font-medium text-gray-700" placeholder="nome gruppo" required/>
                                </x-filament::input.wrapper>
                                <x-filament::button type="submit">Cerca</x-filament::button>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-filament-panels::page>
