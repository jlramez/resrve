<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addpermissionModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addpermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="createDataModalLabel">Asignar permisos</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                    @csrf
            <div class="form-group">
                <label for="name"></label>
                <input wire:model.live="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            @foreach ($rsp as $permiso)
            <div class="form-group">
                <label for="name"></label>
                <input wire:model.live="permisos" type="checkbox" name="permisos" id="permisos" placeholder="Name"  value="{{ $permiso->name }}" > {{$permiso->name}} 
           </div>
            @endforeach
            <!--<div class="form-group">
                <label for="guard_name"></label>
                <input wire:model.live="guard_name" value="web" type="text" class="form-control" id="guard_name" placeholder="Guard Name">@error('guard_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>-->

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="storepermissions()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>