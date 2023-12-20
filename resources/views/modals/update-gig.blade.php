<x-modal id='gig' title='Update <span id="gig-status">gig</span> on <span id="modal-gig-date">'>
    <x-form id='gig' submit='manageEvents.updateGig()' submitText='Update Gig'>
        <x-form-item id='update-gig-arrival' type='time' label='Arrival time' placeholder='e.g. 19:00'></x-form-item>
        <x-form-item id='update-gig-price' type='number' label='Fee' placeholder='e.g. 1000'></x-form-item>
        <x-form-item id='update-gig-note' label='Note' placeholder='[optional details]'></x-form-item>
        <x-form-item container_id='gig-confirmed' id='update-gig-confirmed' type='checkbox' label='Confirmed?' ></x-form-item>
        <x-form-item id='update-gig-id' type='hidden' placeholder=''></x-form-item>
    </x-form>
</x-modal>
