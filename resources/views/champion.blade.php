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
            <table>
                <tbody>
                <tr>
                    <td>
                        Attack Damage:
                    </td>
                    <td>
                        {{ round($champion['stats']['attackdamage']) }} +({{$champion['stats']["attackdamageperlevel"]}})
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
                    <td>
                        {{ floor($champion['stats']['armor']) }} +({{$champion['stats']["armorperlevel"]}})
                    </td>
                    <td>
                        Magic Resistance:
                    </td>
                    <td>
                        {{ floor($champion['stats']['spellblock']) }} +({{$champion['stats']["spellblockperlevel"]}})
                    </td>
                </tr>
                <tr>
                    <td>
                        Attack Speed:
                    </td>
                    <td>
                        {{ floor($champion['stats']['attackspeedoffset']) }} +({{$champion['stats']["attackspeedperlevel"]}})
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
                        {{ floor($champion['stats']['crit']) }} +({{$champion['stats']["critperlevel"]}})
                    </td>
                    <td>
                        Movement Speed:
                    </td>
                    <td>
                        {{ floor($champion['stats']['movespeed']) }}
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="champ-level">
                <p>Champion level: </p>
                <select class="form-control">
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