<x-app-layout>
    <h1>{{$profile->name}}</h1>
    
    Check out {{$profile->name}}'s posts
    @if (count($posts) === 0)
        <div>
            <p>{{$profile->name}} hasn't posted anything yet. Come back later</p>
        </div>
    @else
    @foreach ($posts as $post)
        <div>
        <h3>{{$post->post_title}}</h3>
        <a href="{{ url('posts/' . $post->id)}}">
        <img src="{{ asset('images/' . $post->image_path)}}" alt="{{$post->description}}" height="300" width="360">
        </a>
        <p>Posted on: {{$post->created_at}}</p>
        </div>
    @endforeach    
    @endif
    

</x-app-layout>