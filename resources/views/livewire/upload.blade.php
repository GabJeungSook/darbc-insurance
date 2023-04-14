<div>
    <div>
      <div class="flex flex-col border p-2 space-y-1 mb-1">
        <label for="member">Member</label>
        <input type="file" wire:model="insurance_member">
      </div>
      <x-button label="Upload" wire:click="uploadMember" dark spinner="insurance_member" />
    </div>
    <div class="mt-1">
      <div class="flex flex-col border p-2 space-y-1 mb-1">
        <label for="member">Replacement</label>
        <input type="file" wire:model="replacement">
      </div>
      <x-button label="Upload" wire:click="uploadReplacement" spinner="replacement" dark />
    </div>
    <div class="mt-1">
      <div class="flex flex-col border p-2 space-y-1 mb-1">
        <label for="member">Date of Death</label>
        <input type="file" wire:model="date_of_death">
      </div>
      <x-button label="Upload" wire:click="uploadDateOfDeath" spinner="date_of_death" dark />
    </div>
  </div>
