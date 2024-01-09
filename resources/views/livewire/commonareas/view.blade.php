@section('title', __('Permissions'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa-solid fa-building"></i>
							 Common areas listing</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model.live='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search common area">
						</div>
						<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i> Add common area
						</div>
					</div>
				</div>				
				<div class="card-body">
						@include('livewire.commonareas.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead bg-info">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Description</th>
								<th>Capacity</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($commonareas as $row)
								<div wire:key="{{ $row->id }}"> 
									<tr>
										<td>{{ $loop->iteration }}</td> 
										<td>{{ $row->name }}</td>
										<td>{{ $row->description }}</td>
										<td>{{ $row->capacity }}</td>
										<td width="90">
											<div class="dropdown">
												<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
													Actions
												</a>
												<ul class="dropdown-menu">
													<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="make_reservation({{$row->id}})"><i class="fa fa-calendar"></i> Make reservation </a></li>
													<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
													<li><a class="dropdown-item" onclick="confirm('Confirm Delete Common area id {{$row->id}}? \nDeleted Permissions cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>  
												</ul>
											</div>								
										</td>
									</tr>
									@empty
									<tr>
										<td class="text-center" colspan="100%">No data Found </td>
									</tr>
								</div>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $commonareas->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>