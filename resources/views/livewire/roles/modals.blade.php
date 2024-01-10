<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create Role</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    @csrf
                    <div class="form-group">
                        <label for="name"></label>
                        <input wire:model.live="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-outline-primary" data-bs-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="updateModalLabel">Update Role</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
					<input type="hidden" wire:model.live="selected_id">
                    <div class="form-group">
                        <label for="name"></label>
                        <input wire:model.live="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="guard_name"></label>
                        <input wire:model.live="guard_name" type="text" class="form-control" id="guard_name" placeholder="Guard Name">@error('guard_name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-outline-primary" data-bs-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addpermissionModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addpermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Add permissions</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
           <div class="modal-body">
				<form>
                    @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input wire:model.live="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            @foreach ($rsp as $permiso)
            <div class="form-group">
                <label for="name"></label>
                <input wire:model.live="permisos" type="checkbox" name="permisos" id="permisos" placeholder="Name"  value="{{ $permiso->name }}" > {{$permiso->name}} 
           </div>
            @endforeach
         

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="storepermissions()" class="btn btn-outline-primary" data-bs-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updatepermissionModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updatepermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatepermissionDataModalLabel">Update permissions</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
           <div class="modal-body">
				<form>
                    @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input wire:model.live="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            @foreach ($rsp as $permiso)
            <div class="form-group">
                <label for="name"></label>
                <input wire:model.live="permisos" type="checkbox" name="permisos" id="{{ rand() }}" placeholder="Name"  value="{{ $permiso->name }}" > {{$permiso->name}} 
           </div>
            @endforeach
     

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="updatepermissions()" class="btn btn-outline-primary" data-bs-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>