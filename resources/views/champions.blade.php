@extends('master')

@section('content')


{{-- @if(isset($items)) --}}
<ul> 
	@foreach ($champions as $champion)
      <li><img src="http://ddragon.leagueoflegends.com/cdn/5.20.1/img/champion/{{$champion['image']['full'] }}"></li> 
    @endforeach
</ul>
{{--@endif  --}} 
@endsection