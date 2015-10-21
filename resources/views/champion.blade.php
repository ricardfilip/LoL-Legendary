@extends('master')

@section('content')

    <div class="row">
        <div class="col-md-2 text-center">
            <h4 class="text-center">{{$champion['name']}}</h4>

            <div class="text-center">
                <img src="http://ddragon.leagueoflegends.com/cdn/5.20.1/img/champion/{{$champion['image']['full'] }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="text-left">Base Stats</h4>
                </div>
                <div class="champ-level text-right form-group form-inline col-sm-6">
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
            <table id="tb-stats" class="table">
                <thead></thead>
                <tbody>
                <tr>
                    <td class="col-sm-3">
                        Attack Damage:
                    </td>
                    <td id="ad" class="col-sm-3">
                        <span class="base">{{ $champion['stats']['attackdamage'] }} </span> +(<span class="perlevel">{{$champion['stats']["attackdamageperlevel"]}}</span>)
                    </td>
                    <td class="col-sm-3">
                        Ability Power:
                    </td>
                    <td class="col-sm-3">
                        ?
                    </td>
                </tr>
                <tr>
                    <td>
                        Armor:
                    </td>
                    <td id="armor">
                        <span class="base">{{ $champion['stats']['armor'] }}</span> +(<span class="perlevel">{{$champion['stats']["armorperlevel"]}}</span>)
                    </td>
                    <td>
                        Magic Resistance:
                    </td>
                    <td id="mr">
                        <span class="base">{{ $champion['stats']['spellblock'] }}</span> +(<span class="perlevel">{{$champion['stats']["spellblockperlevel"]}}</span>)
                    </td>
                </tr>
                <tr>
                    <td>
                        Attack Speed:
                    </td>
                    <td id="as">
                        <span class="base">{{ $champion['stats']['attackspeedoffset'] }}</span> +(<span class="perlevel">{{$champion['stats']["attackspeedperlevel"]}}</span>)
                    </td>
                    <td>
                        Cooldown Reduction:
                    </td>
                    <td>
                        ?
                    </td>
                </tr>
                <tr>
                    <td>
                        Critical Strike:
                    </td>
                    <td>
                        {{ $champion['stats']['crit'] }} +({{$champion['stats']["critperlevel"]}})
                    </td>
                    <td>
                        Movement Speed:
                    </td>
                    <td>
                        {{ $champion['stats']['movespeed'] }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3 item-grid">
            <h4>Items</h4>
            <table>
                <tbody>
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        4
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        6
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- -->
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
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="items">@include("tabs.items")</div>
                <div role="tabpanel" class="tab-pane" id="runes">@include("tabs.runes")</div>
                <div role="tabpanel" class="tab-pane" id="masteries">@include("tabs.masteries")</div>
                <div role="tabpanel" class="tab-pane" id="graphs">Not yet</div>
            </div>
            <script>
                $("#tabs a").click(function (event) {
                    event.preventDefault();
                    $(this).tab('show');
                    console.log("clicked");
                })
            </script>
        </div>
    </div>
@endsection
