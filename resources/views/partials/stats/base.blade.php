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