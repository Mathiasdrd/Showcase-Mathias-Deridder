<x-app-layout>
<div class="container-md flex d-flex justify-content-center box-shadow card-color my-4 rounded">
    <div class="col-8">
        <h2>{{$post->post_title}}</h2>
        <div class="d-flex justify-content-center max-size">
            <img src="{{ asset('images/' . $post->image_path)}}" alt="{{$post->image_path}}" class="img-fluid"/>
        </div>
        <div class="row justify-content-between p-1">
            <div class="col-12 col-sm-6 d-flex flex-wrap">
                <p class="d-flex m-0">{{$post->description}}</p>
            </div>

            <!--Modal/ Report pop up -->
            @auth
            <div class="col-12 col-sm-6 d-flex flex-wrap justify-content-center justify-content-sm-end">
                <p class="d-flex m-0">
                    <span class="p-1 d-none d-sm-flex">Something wrong with this post?</span>
                    <x-report-form-layout :post="$post->id">
                    @foreach ($reportReasons as $reportReason)
                        <div class="d-flex">
                            <input type="radio" name="report_reason_id" id="report_reason_id" value="{{$reportReason->id}}" class="p-1">
                            <label class="p-1">{{$reportReason->reason}}</a></label><br />
                        </div>
                    @endforeach
                    </x-report-form-layout>
                </p>
            </div>
            @endauth
            <!-- end of modal -->
        </div>
        @if(Session::has('success'))
        <div class="form-error col-12 d-flex flex-wrap justify-content-center">
            <p class="fw-bold text-success"> {{ Session::get('success') }} </p>
        </div>
        @endif
        @if(Session::has('message'))
        <div class="form-error col-12 d-flex flex-wrap justify-content-center">
            <p class="fw-bold text-danger"> {{ Session::get('message') }} </p>
        </div>
        @endif
        @if ($post_category !== null)
            <p>Posted in: <a href="{{url('categories/' . $post_category->id)}}" class="border border-5 border-dark rounded m-1 px-3 bg-dark">{{$post_category->category_name}}</a> </p>
        @endif 

        <!-- tags component -->
        <x-tags :imagetags="$post->tags" />

        <p>Posted by: <a href="{{ url('profile/'. $post_creator->name)}}" class="border border-5 border-dark rounded m-1 px-2 bg-dark"> {{$post_creator->name}}</a> </p>
        <p>Posted on: {{$post->created_at}}</p>
        @if ($post->creator !== null)
            <p>Original post: <a href="{{$post->creator}}">{{$post->creator}}</a> </p>
        @endif
        
        <!-- edit & delete options -->
        <div class="row justify-content-center pb-4">
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
                    <button type="submit" class="text-dark">Delete this post</button> 
                </form>
            </div>
        @endcan
        </div>
    </div>
</div>

</x-app-layout>