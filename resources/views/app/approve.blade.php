@extends('app.layout.layout')

@section('main_content')
	<div class="content">
			<div class="container-fluid">
        <div class="paper">
          @if(!is_null($letterhead))
            <div class="row">
              <div class="col-md-12">
                <img src="{{$letterhead}}" style="max-width:100px; max-height: 100px; opacity:0.5">
              </div>
            </div>
            <br><br>
          @endif
          {!! $document->formatDocumentText(Auth::user()) !!}

					<hr>
					<div class="row">
						<div class="col-md-12 text-center">
							<a href="/approve/request/{{$sign_request->id}}/doc/{{$document->id}}/submit">
								<div class="btn btn-fill btn-success">
									Approve & Sign As {{Auth::user()->name}}
								</div>
							</a>

						</div>
					</div>

        </div>

      </div>
  </div>
@endsection
