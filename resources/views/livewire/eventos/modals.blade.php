<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create event</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				       <form action="" id="formularioEventos">
                    {!! csrf_field() !!}
                    <div class="form-group">
                      <label for="">Event title</label>
                      <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
                      <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label for="">Event description</label>
                      <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Start</label>
                      <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                      <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
                    </div>
                    <div class="form-group">
                      <label for="">End</label>
                      <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                      <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
                    </div>
                    <div class="form-group">
                      <label for="" >User</label>
                            <select  name="users_id" id="users_id" class="form-control">
                               <option>--Choose a user--</option>  
                               @foreach ($users as $row) 
                               <div wire:key="{{ $row->id }}"> 
                                 <option  value="{{ $row->id }}">{{ $row->name }}</option>
                               </div>
                                @endforeach
                          </select> 
                   </div>
                   <div class="form-group ">
                    <label for="" >Common area</label>
                          <select  name="commonareas_id" id="commonareas_id" class="form-control">
                             <option>--Choose a common area--</option>  
                             @foreach ($commonareas as $row) 
                                <div wire:key="{{ $row->id }}"> 
                                     <option  value="{{ $row->id }}">{{ $row->name }}</option>
                                </div>
                            @endforeach
                        </select> 
                 </div>
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-outline-primary" data-bs-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update permission</h5>
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
                        <label for="name">Description</label>
                        <input wire:model.live="description" type="text" class="form-control" id="description" placeholder="Description">@error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Capacity</label>
                        <input wire:model.live="capacity" type="text" class="form-control" id="capacity" placeholder="Capacity">@error('capacity') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-outline-primary" data-bs-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
<!-- Modal attach-->
<div wire:ignore.self class="modal fade" id="attachModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Attach file</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<div class="table-responsive mb-4">
                        <form wire:submit.prevent="save" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="selected_id" id="selected_id">
                            <div class="form-group">
                                <label>File</label> 
                                <input type="file" wire:model="file" class="form-control mb -2" accept = "application/pdf">
                                @error('archivo') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group mt-4" align="right">
                                <button type="submit" class="btn btn-outline-danger">Atach</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
