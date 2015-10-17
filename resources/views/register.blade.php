@extends('master')

@section('content')

<h1>Create Account</h1>
<div class="row">
		<div class="span4">
			<div class="well">
			{!! Form::label('email', 'E-Mail Address') !!}
			{!! Form::close() !!}
			</div>
		</div>
</div>

@endsection 