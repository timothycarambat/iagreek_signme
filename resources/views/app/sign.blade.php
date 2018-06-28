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
          {!! $document->formatDocumentText($sign_request) !!}

					<hr>
					<div class="row">
						<div class="col-md-12 text-center">
							<a href="/sign/request/{{$sign_request->id}}/doc/{{$document->id}}/submit">
								<div class="btn btn-fill btn-success">
									Sign Document As {{Auth::user()->name}}
								</div>
							</a>

						</div>
					</div>

        </div>

      </div>
  </div>
@endsection
