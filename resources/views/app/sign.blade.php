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
        </div>
      </div>
  </div>
@endsection
