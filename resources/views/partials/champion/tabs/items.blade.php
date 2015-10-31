@section("head")

@endsection
<div class="row">
    <div class="col-md-2">
        <div class="row">
            {{--TODO: Implement search: https://mixitup.kunkalabs.com/support/topic/searchable-filtering/ --}}
            <div class="col-md-12">
                <h4>Map</h4>
            </div>
            <div class="col-md-3">
                <div class="filter active" data-filter=".map11">SR</div>
            </div>
            <div class="col-md-3">
                <div class="filter" data-filter=".map12">HA</div>
            </div>
            <div class="col-md-3">
                <div class="filter" data-filter=".map8">CS</div>
            </div>
            <div class="col-md-3">
                <div class="filter" data-filter=".map10">TT</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Items</h4>
            </div>
        </div>
        <div class="filter active" data-filter="all">All Items</div>
        @foreach($itemTags as $tag)
            <div class="filter" data-filter=".{{$tag}}">{{$tag}}</div>
        @endforeach
    </div>
    <div class="col-md-9">
        <div id="itemsContainer">
            @foreach($itemData['data'] as $item)
                @if(isset($item['tags'])) {{-- TODO: Figure out items without tags (like boot enchantments) --}}
                <div style="display: inline-block; padding: 5px;" data-itemID="{{$item['id']}}"
                    {{-- There is probably a better way to add classes based on content --}}
                    @if(isset($item['tags']))
                     class="mix @foreach($item['tags'] as $tag){{$tag}} @endforeach @foreach($item['maps'] as $mapkey=>$mapStatus) @if($mapStatus== true)map{{$mapkey}} @endif @endforeach"
                    @endif
                    >
                        {{-- Had to be a div for the sprite to align correctly--}}
                        <div class="img item" style="height:{{$item['image']['w']}}px;width:{{$item['image']['h']}}px;background: url('{{action("ImageController@getImage",array("sprite",$item['image']['sprite']))}}') -{{$item['image']['x']}}px -{{$item['image']['y']}}px no-repeat;"></div>

                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".item").tooltipster({
            content: "Hello"
        });
        $('#itemsContainer').mixItUp({
            controls: {
                toggleFilterButtons: true,
                toggleLogic: 'and'
            }
        });
    });


</script>