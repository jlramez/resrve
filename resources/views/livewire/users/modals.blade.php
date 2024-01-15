<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create user</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input wire:model.live="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input wire:model.live="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                <label for="password" >Password</label>
                <input  wire:model.live="password" id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autocomplete=”off” >
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirm password</label>
                    <input wire:model.live="password_confirmation"id="password_confirmation" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" >
                </div>
                <div class="form-group ">
                            <label for="roles_id" >User role</label>
                                  <select wire:model.live="rol_id" name="rol_id" id="rol_id" class="form-control">
                                     <option>--Choose a role --</option>  
                                     @foreach ($roles as $row) 
                                      <option  value="{{ $row->id }}">{{ $row->name }}</option>
                                     @endforeach
                                </select> 
             </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-outline-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update user</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
					<input type="hidden" wire:model.live="selected_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input wire:model.live="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input wire:model.live="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                <label for="password" >Password</label>
                <input  wire:model.live="password" id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autocomplete=”off” >
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirm password</label>
                    <input wire:model.live="password_confirmation"id="password_confirmation" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" >
                </div>
                <div class="form-group ">
                            <label for="roles_id" >User role</label>
                                  <select wire:model.live="rol_id" name="rol_id" id="rol_id" class="form-control">
                                     <option>--Choose a role --</option>  
                                     @foreach ($roles as $row) 
                                      <option  value="{{ $row->id }}">{{ $row->name }}</option>
                                     @endforeach
                                </select> 
             </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-outline-secondary" data-bs-dismiss="modal">CLose</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-outline-primary">Save</button>
            </div>
       </div>
    </div>
</div>
