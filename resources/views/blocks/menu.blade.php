<div class="menu">
    <div>
        <a href="{{route('locale', ['lang' => 'ru'])}}">
            ru
        </a>
    </div>
    <div>
        <a href="{{route('locale', ['lang' => 'en'])}}">
           en
        </a>
    </div>
@foreach($menu as $item)
    <div>
        <a href="{{route($item['alias'])}}">
            {{$item['title']}}
        </a>
    </div>
    @endforeach
</div>
<hr>
