<x-app-layout>
    <h1>{{$profile[0]->name}}</h1>

    Check out {{$profile[0]->name}}'s posts

    @foreach ($posts as $post)
        <div>
        <h3>{{$post->post_title}}</h3>
        <a href="{{ url('posts/' . $post->id)}}">
        <img src="{{ asset('images/' . $post->image_path)}}" alt="{{$post->description}}" height="300" width="360">
        </a>
        <p>Posted on: {{$post->created_at}}</p>
        </div>
    @endforeach

</x-app-layout>