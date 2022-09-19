<x-app-layout>
    <h2>{{$post->post_title}}</h2>

    <img src="{{ asset('images/' . $post->image_path)}}" 
    alt="{{$post->image_path}}"/>

    <p>{{$post->description}}</p>

    <x-tags :imagetags="$post->tags" />

    <p>Posted by: <a href="{{ url('profile/'. $post_creator->id)}}" > {{$post_creator->name}}</a> </p>
    <p>Posted on: {{$post->created_at}}</p>
    @if ($post->creator !== null)
       <p>Original post: <a href="{{$post->creator}}">{{$post->creator}}</a> </p>
    @endif
    
    @if ($post_category !== null)
       <p> <a href="{{url('categories/' . $post_category->id)}}">{{$post_category->category_name}}</a> </p>
    @endif

    @can('update', $post)    
    <a href="{{route('posts.edit',['post'=> $post])}}" >
        <button type="submit">Edit your post</button> 
    </a>
    @endcan
    @can('delete', $post)    
    <form action="{{route('posts.destroy',['post'=> $post->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete your post</button> 
    </form>
    @endcan
</x-app-layout>