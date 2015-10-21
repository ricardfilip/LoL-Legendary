@extends('master')

@section('content')
    <div class="row text-center"><h3>Select your champion</h3></div>
    <div class="row">
        <div class="col-sm-12" style="overflow: hidden;">
            <ul class="champion-list">
                @foreach ($champions as $champion)
                    <li class="champion-portrait">
                        <a href="/champion/{{$champion['id']}}">
                            <img src="http://ddragon.leagueoflegends.com/cdn/5.20.1/img/champion/{{$champion['image']['full'] }}" class="fade in">

                            <p class="text-center">{{$champion['name']}}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection