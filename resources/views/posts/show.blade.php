<x-app-layout>
    <h2>{{$post->post_title}}</h2>

    <img src="{{ asset('images/' . $post->image_path)}}" 
    alt="{{$post->image_path}}"/>

    <p>{{$post->description}}</p>


    <p>Created by: {{$post_creator[0]->name}}</p>
    <p>Posted: {{$post->created_at}}</p>
    
    <a href="/{{$post_category[0]->category_name}}">{{$post_category[0]->category_name}}</a>
</x-app-layout>