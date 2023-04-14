<div>
    <div class="p-2">
        <x-button positive label="Add New" wire:click="$set('addReplacement', true)" />    </div>
    {{$this->table}}

    <x-modal.card title="Add Replacement" blur wire:model.defer="addReplacement">
        <x-select
        label="Member"
        placeholder="Select member"
        wire:model.defer="member_id">
        {{-- {{dd($members)}} --}}
        @foreach ($members as $id => $name)
        <x-select.option value="{{ $id }}" label="{{ $name }}" />
         @endforeach
        </x-select>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
            <x-input label="Name" placeholder="Replacement's full name" wire:model.defer="name"/>
            <x-input label="Relationship" placeholder="" wire:model.defer="relationship"/>
            <x-datetime-picker without-time label="Birthday" placeholder="" wire:model.defer="birthday"/>
            <x-input label="Age" type="number" placeholder="" wire:model.defer="age"/>
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                {{-- <x-button flat negative label="Delete" wire:click="delete" /> --}}
                <div></div>
                <div class="flex space-x-2">
                    <x-button secondary label="Cancel" x-on:click="close" />
                    <x-button positive label="Save" wire:click="save" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
 </div>
