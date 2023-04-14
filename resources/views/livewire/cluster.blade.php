<div>
    <div class="p-2">
        <x-button positive label="Add New" wire:click="$set('addCluster', true)" />
    </div>
   {{$this->table}}

   <x-modal.card title="Add Member" blur wire:model.defer="addCluster">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-input label="Member ID" placeholder="" wire:model.defer="member_id"/>
        <x-input label="Name" placeholder="Member's full name" wire:model.defer="name"/>
        <x-input label="Cluster" placeholder="" wire:model.defer="cluster"/>
        <x-select
        label="Gender"
        placeholder="Select"
        wire:model.defer="gender">
        <x-select.option label="Male" value="1" />
        <x-select.option label="Female" value="2" />
    </x-select>
        <x-datetime-picker without-time label="Birthday" placeholder="" wire:model.defer="birthday"/>
        <x-input label="Age" type="number" placeholder="" wire:model.defer="age"/>
    </div>
    <div class="grid grid-cols-3 gap-3 mt-3">
        <x-input label="Tin" placeholder="" wire:model.defer="tin_1"/>
        <x-input label="Tin" placeholder="" wire:model.defer="tin_2"/>
        <x-input label="Tin" placeholder="" wire:model.defer="tin_3"/>
    </div>
    <div class="mt-3">
        <x-datetime-picker without-time label="Date Of Death" placeholder="" wire:model.defer="date_of_death"/>
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
