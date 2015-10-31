@extends('master')

@section("header")

<!-- item tooltips-->
<script src="//cdn.jsdelivr.net/jquery.tooltipster/3.3.0/js/jquery.tooltipster.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.tooltipster/3.3.0/css/tooltipster.css">

<!-- items filter-->
<script src="https://cdn.jsdelivr.net/jquery.mixitup/2.1.8/jquery.mixitup.js"></script>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-2 text-center">
            <h4 class="text-center">{{$champion['name']}}</h4>

            <div class="text-center">
                <img src="{{action("ImageController@getImage",array("champion",$champion['image']['full']))}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="text-left">Base Stats</h4>
                </div>
                <div class="champ-level text-right form-inline col-sm-6">
                    <div id="champion-level" class="form-group">
                        <label for="dropdown-lvl">Level:</label>
                        <select class="form-control" id="dropdown-lvl" onchange="UpdateStatsPerLevel(event);">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                        </select>
                    </div>
                </div>
            </div>@include("partials.stats.base")
        </div>
        <div class="col-md-3 item-grid">
            <h4>Items</h4>@include("partials.items.grid")
        </div>
    </div>
    <!-- Tab menu -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="tabs">
                <li role="presentation">
                    <a href="/tab/items" aria-controls="home" role="tab" data-target="#items" data-toggle="tab">Items</a>
                </li>
                <li role="presentation">
                    <a href="/tab/runes" aria-controls="runes" role="tab" data-target="#runes" data-toggle="tab">Runes</a>
                </li>
                <li role="presentation">
                    <a href="/tab/masteries" aria-controls="masteries" data-target="#masteries" role="tab" data-toggle="tab">Masteries</a>
                </li>
                <li role="presentation">
                    <a href="/tab/graphs" aria-controls="graphs" role="tab" data-target="#graphs" data-toggle="tab">Graphs</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <!-- TODO: Ajaxify tab loading via routes. Ex: a href="/tab/items" activates tabs.items and loads into view -->
            <!-- TODO: Maybe use some sort of PJAX (pushState + ajax) in the future-->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="items">@yield("items")</div>
                <div role="tabpanel" class="tab-pane" id="runes">@yield("runes")</div>
                <div role="tabpanel" class="tab-pane" id="masteries">@yield("masteries")</div>
                <div role="tabpanel" class="tab-pane" id="graphs">@yield("graphs")</div>
            </div>
            <script>
                $tabs = $("#tabs");
                $tabs.find("a").click(function (event) {
                    //event.preventDefault();
                    //cache our queries inside a var
                    var $this = $(this);
                    var url = $this.attr("href");
                    var target = $this.attr("data-target");
                    $.get(url, function (data) {
                        $(target).html(data);
                    });
                    $(this).tab('show');
                });
                /*$(document).ready(function(){
                 $('#tabs a[href="/tab/items"]').tab('show');
                 $tabs.trigger("click");
                 });*/
            </script>
        </div>
    </div>
@endsection
