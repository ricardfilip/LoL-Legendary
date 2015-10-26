@extends('master')

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
            </div>
            @include("partials.stats.base")
        </div>
        <div class="col-md-3 item-grid">
            <h4>Items</h4>
            @include("partials.items.grid")
        </div>
    </div>
    <!-- Tab menu -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="tabs">
                <li role="presentation" class="active">
                    <a href="#items" aria-controls="home" role="tab" data-toggle="tab">Items</a>
                </li>
                <li role="presentation">
                    <a href="#runes" aria-controls="runes" role="tab" data-toggle="tab">Runes</a>
                </li>
                <li role="presentation">
                    <a href="#masteries" aria-controls="masteries" role="tab" data-toggle="tab">Masteries</a>
                </li>
                <li role="presentation">
                    <a href="#graphs" aria-controls="graphs" role="tab" data-toggle="tab">Graphs</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <!-- TODO: Ajaxify tab loading via routes. Ex: a href="/tab/items" activates tabs.items and loads into view -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="items">@include("partials.champion.tabs.items")</div>
                <div role="tabpanel" class="tab-pane" id="runes">@include("partials.champion.tabs.runes")</div>
                <div role="tabpanel" class="tab-pane" id="masteries">@include("partials.champion.tabs.masteries")</div>
                <div role="tabpanel" class="tab-pane" id="graphs">Not yet</div>
            </div>
            <script>
                $("#tabs").find("a").click(function (event) {
                    event.preventDefault();
                    $(this).tab('show');
                    console.log("clicked");
                })
            </script>
        </div>
    </div>
@endsection
