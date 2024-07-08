<div class="d-flex gap-2">
    <button
        class="btn btn-sm btn-success"
        wire:click="editPeriod({{ $per->id }})"
        title="Edit"
    >
        <i class='bx bxs-edit'></i>
    </button>
    <button
        class="btn btn-sm btn-danger btn-delete"
        title="Hapus"
        {{-- data-id="deletePeriod{{ $per->id }}" --}}

        wire:click="deletePeriod({{ $per->id }})"
    >
        <i class='bx bxs-trash' ></i>
    </button>
</div>