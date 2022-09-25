@props(['imagetags'])

@php
    $tags = explode(', ', $imagetags)
@endphp

Tags: 
<ul class="inline">
    @foreach ($tags as $tag)
        @unless ($tag === "") 
            <li class="border border-5 border-dark rounded-top m-1 px-3 py-1 bg-dark"><a href="/?tag={{$tag}}">{{$tag}}</a></li>
        @endunless
    @endforeach
</ul>