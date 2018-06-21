<!DOCTYPE HTML>
<html>
	<head>
		<title>IAGREEK :: Reset Password</title>
		<meta charset="utf-8" />
		<link rel="icon" type="image/x-icon" href="images/favicon.ico?v=2">
		<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon.png">

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="stylesheet" href="/css/login.css">
		<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	</head>
	<body>

		{!! Form::open(['route' => 'password.request', 'type'=>'POST','class' =>'sub-form']) !!}
			<form class="sub-form">
			  <div class="input-contain">
			    <div class="circle circle-quill">
			      <img src="{{asset('images/apple-icon.png')}}" alt=" IAGREEK short icon" style="width:100%">
			    </div>
			    <div class="circle circle-paper">
			      <svg class="paper" x="0" y="0" width="25.1" height="25.1" viewBox="0 0 25.1 25.1" enable-background="new 0 0 25.125 25.125" xml:space="preserve"><path fill="#b1dbd3" d="M24 2.1C23.5 2.3 1.2 10.2 0.8 10.3c-0.4 0.1-0.5 0.5 0 0.6 0.5 0.2 5 2 5 2H5.8l3 1.2c0 0 14.2-10.4 14.4-10.6 0.2-0.1 0.4 0.1 0.3 0.3 -0.1 0.2-10.3 11.2-10.3 11.2 0 0 0 0 0 0l-0.6 0.7 0.8 0.4c0 0 6.1 3.3 6.5 3.5 0.4 0.2 0.9 0 1-0.4 0.1-0.6 3.7-16.1 3.8-16.4C24.7 2.3 24.4 2 24 2.1zM8.7 21.2c0 0.3 0.2 0.4 0.4 0.2 0.3-0.3 3.7-3.4 3.7-3.4l-4.2-2.2V21.2z"/></svg>
			    </div>
			    <h2 class="info">Reset Password</h2>

          @if($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
  					  <strong>Oops</strong> 	{{$error}}
  					</div>
             @endforeach
					@endif

					<input type="hidden" name="token" value="{{ $token }}">

					{{Form::label('email', 'Email:',['style'=>'font-weight:800'])}}
          {{Form::email('email',($email or old('email')),['placeholder'=>'alpha@betagamma.org','required' => 'required']) }}

					<label for="password" style="font-weight:800">Password</label>
					<input id="password" type="password" name="password" required>

					<label for="password-confirm" style="font-weight:800">Confirm Password</label>
					<input id="password-confirm" type="password" name="password_confirmation" required>

			    <div class="allsub">
						{{Form::submit('Reset Password',['class'=>'submit'])}}
			      <div class="submit-under"></div>
			    </div><!--allsub-->

			 </div><!--input-contain-->
			{!!Form::close()!!}






<!-- Scripts -->
<script
src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>

	</body>
</html>
