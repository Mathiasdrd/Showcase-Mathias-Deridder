<x-app-layout>
<div class="container-md flex d-flex justify-content-center border border-5 border-dark">
    <div class="px-3">
        <h2>{{$post->post_title}}</h2>
        <div class="d-flex justify-content-center max-size">
            <img src="{{ asset('images/' . $post->image_path)}}" 
            alt="{{$post->image_path}}" class="img-fluid"/>
        </div>
        <p>{{$post->description}}</p>

        @if ($post_category !== null)
        <p>Posted in: <a href="{{url('categories/' . $post_category->id)}}" class="border border-5 border-dark rounded m-1 px-3 bg-dark">{{$post_category->category_name}}</a> </p>
        @endif 
        <x-tags :imagetags="$post->tags" />

        <p>Posted by: <a href="{{ url('profile/'. $post_creator->id)}}" class="border border-5 border-dark rounded m-1 px-2 bg-dark"> {{$post_creator->name}}</a> </p>
        <p>Posted on: {{$post->created_at}}</p>
        @if ($post->creator !== null)
        <p>Original post: <a href="{{$post->creator}}">{{$post->creator}}</a> </p>
        @endif
        
        <div class="row justify-content-center">
        @can('update', $post)    
        <div class="col-5">
            <a href="{{route('posts.edit',['post'=> $post])}}" >
                <button type="submit">Edit your post</button> 
            </a>
        </div>
        @endcan
        @can('delete', $post)  
        <div class="col-5">  
            <form action="{{route('posts.destroy',['post'=> $post->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-dark">Delete your post</button> 
            </form>
        </div>
        @endcan
        </div>
    </div>
</div>
</x-app-layout>