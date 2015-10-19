@extends('master')

@section('content')

<ul class="champion-list">
	@foreach ($champions as $champion)
      <li class="champion-portrait">
          <a href="/champion/{{$champion['id']}}">
          <img src="http://ddragon.leagueoflegends.com/cdn/5.20.1/img/champion/{{$champion['image']['full'] }}">
          <p class="text-center">{{$champion['name']}}</p>
          </a>
      </li>
    @endforeach
</ul>

@endsection