@extends('master')

@section('content')

    <div class="row">
        <div class="col-md-3">
            <img src="http://ddragon.leagueoflegends.com/cdn/5.20.1/img/champion/{{$champion['image']['full'] }}">
        </div>
        <div class="col-md-2">
            <h1>{{$champion['name']}}</h1>
        </div>
        <div class="col-md-4">
            <h4>Base Stats</h4> 
            <table id="tb-stats">
                <tbody>
                <tr>
                    <td>
                        Attack Damage:
                    </td>
                    <td id="ad">
                        <span class="result"></span><span class="base">{{ $champion['stats']['attackdamage'] }} </span> +(<span class="perlevel">{{$champion['stats']["attackdamageperlevel"]}}</span>)
                    </td>
                    <td>
                        Ability Power:
                    </td>
                    <td>
                        ?
                    </td>
                </tr>
                <tr>
                    <td>
                        Armor:
                    </td>
                    <td id="armor">
                        <span class="result"></span><span class="base">{{ $champion['stats']['armor'] }}</span> +( <span class="perlevel">{{$champion['stats']["armorperlevel"]}}</span>)
                    </td>
                    <td>
                        Magic Resistance:
                    </td>
                    <td id="mr">
                        <span class="result"></span><span class="base">{{ $champion['stats']['spellblock'] }}</span> +( <span class="perlevel">{{$champion['stats']["spellblockperlevel"]}}</span>)
                    </td>
                </tr>
                <tr>
                    <td>
                        Attack Speed:
                    </td>
                    <td id="as">
                        <span class="result"></span><span class="base">{{ $champion['stats']['attackspeedoffset'] }}</span> + (<span class="perlevel">{{$champion['stats']["attackspeedperlevel"]}}</span>)
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
            <div class="champ-level">
                <p>Champion level: </p>
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


@endsection 