<ul>
    @foreach ($items as $item)
        <li><a href="{{ $item['link'] }}">{{ $item['title'] }}</a></li>
    @endforeach
</ul>
