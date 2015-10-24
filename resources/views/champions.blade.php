@extends('master')

@section('content')
    <div class="row text-center"><h3>Select your champion</h3></div>
    <div class="row">
        <div class="col-sm-12" style="overflow: hidden;">
            <ul class="champion-list">
                @foreach ($champions as $champion)
                    <li class="champion-portrait">
                        <a href="/champion/{{$champion['id']}}">
                            <img src="/image/champion/{{$champion['image']['full'] }}" onload="this.style.opacity='1'";>
                            <p class="text-center">{{$champion['name']}}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection