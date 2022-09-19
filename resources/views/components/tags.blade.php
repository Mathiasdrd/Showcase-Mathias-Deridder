@props(['imagetags'])

@php
    $tags = explode(',', $imagetags)
@endphp

<ul class="inline">
    @foreach ($tags as $tag)
        <li><a href="/?tag={{$tag}}">{{$tag}}</a></li>
    @endforeach
</ul>