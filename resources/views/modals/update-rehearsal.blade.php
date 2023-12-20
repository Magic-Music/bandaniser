<x-modal id='rehearsal' title='Update rehearsal on <span id="modal-rehearsal-date"></span>' header-class='bg-rehearsal'>
    <x-form id='rehearsal' submit='manageEvents.updateRehearsal()' submitText='Update Rehearsal'>
        <x-form-item id='update-rehearsal-time' type='time' label='Time' placeholder='e.g. 19:00'></x-form-item>
        <x-form-item id='update-rehearsal-location' label='Location' placeholder='e.g. Bob&quot;s Basement'></x-form-item>
        <x-form-item id='update-rehearsal-note' label='Note' placeholder='[optional details]'></x-form-item>
        <x-form-item id='update-rehearsal-id' type='hidden' placeholder=''></x-form-item>
    </x-form>
</x-modal>
