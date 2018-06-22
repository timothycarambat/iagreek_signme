@extends('app.layout.layout')

@section('main_content')
	<div class="content">
			<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">

							@if(count($sign_requests) > 0 || count($approvals) > 0)
								<div class="card">
								    <div class="header">
								        <h4 class="title">Pending Signature Requests</h4>
								        <p class="category">View and Select Pending Signature Requests</p>
								    </div>
								    <div class="content table-responsive table-full-width">
								      <table class="table table-striped">
								        <thead>
								          <tr>
								            <th  style='font-size:24px;font-weight:800' class="text-center">Campaign</th>
								          	<th  style='font-size:24px;font-weight:800' class="text-center">Requested</th>
								          	<th  style='font-size:24px;font-weight:800' class="text-center">Due</th>
														<th  style='font-size:24px;font-weight:800' class="text-center">Sign</th>
								          </tr>
								        </thead>
								        <tbody>
								          @foreach($sign_requests as $req)
														<tr>
															<td style='font-size:20px' class="text-center" >{{$req->campaign->name}}</td>
															<td style='font-size:20px' class="text-center" >{{$req->campaign->created_at->diffForHumans()}}</td>
															<td style='font-size:20px' class="text-center" >{{\Carbon\Carbon::parse($req->campaign->expiry)->diffForHumans()}}</td>
															<td style='font-size:20px' class="text-center" >
																<a href="/sign/request/{{$req->id}}/doc/{{$req->campaign->document_id}}">
																	<div class="btn btn-fill btn-primary">
																		Sign Document
																	</div>
																</a>

															</td>
														</tr>
								          @endforeach

													@if( count($approvals) > 0)
														<tr>
															<td style="font-size:24px;" colspan="8" class="text-center"><b>Need to Mark for Approval</b></td>
														</tr>
													@endif


													@foreach($approvals as $req)
														<tr>
															<td style='font-size:20px' class="text-center" >{{$req->campaign->name}}</td>
															<td style='font-size:20px' class="text-center" >{{$req->campaign->created_at->diffForHumans()}}</td>
															<td style='font-size:20px' class="text-center" >{{\Carbon\Carbon::parse($req->campaign->expiry)->diffForHumans()}}</td>
															<td style='font-size:20px' class="text-center" >
																<a href="/sign/approve/{{$req->id}}/doc/{{$req->campaign->document_id}}">
																	<div class="btn btn-fill btn-primary">
																		Sign and Approve
																	</div>
																</a>

															</td>
														</tr>
								          @endforeach

								        </tbody>
								      </table>
								    </div>
								</div>
							@else
								<div class="col-md-12 text-center" style="opacity:0.4">
			            <i class="fas fa-check fa-8x"></i>
			            <h2>You Don't Have Any Pending Signature Requests!</h2>
			          </div>
							@endif





						</div>
					</div>
			</div>
	</div>
@endsection
