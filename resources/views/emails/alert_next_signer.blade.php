@extends('beautymail::templates.minty')

@section('content')

	@include('beautymail::templates.minty.contentStart')
		<tr>
			<td class="title">
				You Have A Document To Approve!
			</td>
		</tr>
		<tr>
			<td width="100%" height="10"></td>
		</tr>
		<tr>
			<td class="paragraph">
  			 <h3>Hey {{ucwords($model->name)}}!</h3>
				 <p>We wanted to let you know that there a document that has been signed and needs your additional approval!
           <br>
           You can do this from your phone or computer, whichever is easiet. One click and done!
					 <br>
					 <a href="{{$_ENV['APP_URL']}}/">Click Here to Sign In</a>
         </p>
				 <br>
				 <p>Best, <br> IAGREEK Support Team </p>

			</td>
		</tr>

	@include('beautymail::templates.minty.contentEnd')

@stop
