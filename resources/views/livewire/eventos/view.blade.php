@section('title', __('Permissions'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa-solid fa-list-check"></i>
							 Reservation listing</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model.live='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search event">
						</div>
						<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i> Add reservation
						</div>
					</div>
				</div>				
				<div class="card-body">
						@include('livewire.eventos.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead bg-info">
							<tr> 
								<td>#</td> 
								<th>User</th>
								<th>Common area</th>
								<th>Event title</th>
								<th>Description</th>								
								<th>Start</th>								
								<th>End</th>
								<th>Payment status</th>
								<th>Administrator authorization</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($eventos as $row)
								<div wire:key="{{ $row->id }}"> 
									<tr>
										<td>{{ $loop->iteration }}</td> 
										<td>{{ $row->users->name ?? '' }}</td>
										<td>{{ $row->commonareas->name ?? '' }}</td>
										<td>{{ $row->title ?? ''}}</td>
										<td>{{ $row->descripcion ?? ''}}</td>
										<td>{{ $row->start ?? ''}}</td>
										<td>{{ $row->end ?? ''}}</td>
										@switch($row->status->name)
											@case('Succeed')
												<td><span class="badge bg-success">{{ $row->status->name ?? ''}}</span></td>
											@break;
											@case('Pending')
												<td><span class="badge bg-warning">{{ $row->status->name ?? ''}}</span></td>
											@break;
											@case('Failed')
												<td><span class="badge bg-danger">{{ $row->status->name ?? ''}}</span></td>
											@break;
											@default
												<td><span class="badge bg-warning">Pending</span></td>
										@endswitch
										@switch($row->adminauths->name)
										@case('Approved')
											<td><span class="badge bg-success">{{ $row->adminauths->name ?? ''}}</span></td>
										@break;
										@case('Reviewing')
											<td><span class="badge bg-warning">{{ $row->adminauths->name ?? ''}}</span></td>
										@break;
										@case('Rejected')
											<td><span class="badge bg-danger">{{ $row->adminauths->name ?? ''}}</span></td>
										@break;
										@default
											<td><span class="badge bg-warning">Reviewing</span></td>
									@endswitch
										<td width="90">
											<div class="dropdown">
												<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
													Actions
												</a>
												<ul class="dropdown-menu">
													<li><a data-bs-toggle="modal" data-bs-target="#attachModal" class="dropdown-item" wire:click="attach({{$row->id}})"><i class="fa-sharp fa-solid fa-paperclip"></i> Atach </a></li>
													<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
													<li><a class="dropdown-item" onclick="confirm('Confirm Delete Reservation id {{$row->id}}? \nDeleted Permissions cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>  
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
					<div class="float-end">{{ $eventos->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>