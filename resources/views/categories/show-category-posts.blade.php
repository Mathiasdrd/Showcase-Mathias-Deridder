<x-app-layout>
    <x-search-bar />
    <x-navigation-styling>
        @foreach ($categories as $category)
            <x-navigation :category="$category" />
        @endforeach
    </x-navigation-styling>
    
    <!--show all posts by category -->
    <h2 class="text-white">{{$selectedCategory->category_name}} Images</h2>
    @unless (count($posts) === 0) 
    <div class="container-fluid">
        <ul class="caption-style d-flex flex-wrap row justify-content-center"> 
        @foreach ($posts as $post)
        <li class="col-lg-5 col-md-10">
            <a href="{{ url('posts/' . $post->id)}}">
                <img src="{{ asset('images/' . $post->image_path)}}" alt="{{$post->description}}" class="img-fluid img-sizing" />
            </a>
            <div class="caption">
                <div class="caption-text">
                    <h4>{{$post->post_title}}</h4>
                    <button class="btn btn-secondary"><a href="{{url('profile/' . $post->user->name)}}">{{$post->user->name}}</a></button>
                </div>
            </div>
        </li>
        @endforeach
        </ul>
        <div class="d-flex justify-content-end col-11 main-text-color">
            <p>{{ $posts->links() }}</p>
        </div>
            <p class="d-flex justify-content-end col-11 main-text-color"> Showing {{$posts->firstItem()}} to {{$posts->lastItem()}} of {{$posts->total()}} results</p>
    </div>
    @else
    <div  class="d-flex flex-wrap justify-content-center main-text-color">
        <p>The {{$selectedCategory->category_name}} category has no images yet. Be the first one to publish an image in this category!</p>
    </div>
    @endunless 
</x-app-layout>