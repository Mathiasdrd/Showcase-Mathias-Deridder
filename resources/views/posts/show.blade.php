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

            <!--Modal/ Report pop up + login pop up -->
            <div class="col-12 col-sm-6 d-flex flex-wrap justify-content-center justify-content-sm-end">
                <p class="d-flex m-0">
                    <span class="p-1 d-none d-sm-flex">Something wrong with this post?</span>
                    <x-report-form-layout>
                    @foreach ($reports as $reason)
                        <div class="d-flex">
                            <input type="radio" name="report-reason" id="{{$reason->id}}" class="p-1">
                            <label class="p-1">{{$reason->report}}</a></label><br />
                        </div>
                    @endforeach
                    </x-report-form-layout>
                    
                    <div class="modal fade" id="modalToggle2" aria-hidden="true" aria-labelledby="modalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="modalToggleLabel">Login</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form  method="POST" action="/users/authenticate" >
                            @csrf
                            <div class="modal-body">
                                <h3>Please login first</h3>
                                <div class="error"></div>
                                <div class="d-flex row">
                                    <label class="p-1">Email:</a></label><br />
                                    <input type="email" name="email" id="email" class="p-1 form-control">
                                </div>
                                <div class="d-flex row">
                                    <label class="p-1">Password:</label><br />
                                    <input type="password" name="password" id="password" class="p-1 form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success login-modal" data-bs-dismiss="modal">Login</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </p>
            </div>
            <!-- end of modal -->

        </div>


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
                    <button type="submit" class="text-dark">Delete your post</button> 
                </form>
            </div>
        @endcan
        </div>
    </div>
</div>


<!-- ajax script -->
@section('scripts')
<script type="text/javascript" defer>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    $(".report").click(function(e){
        e.preventDefault();
        var logstatus = "{{ (Auth::user()) ? true : false }}";

        if(logstatus) {
            $('#modalToggle').modal('show');
        } else {
            $('#modalToggle2').modal('show'); 
        }
    });
</script>
@endsection
</x-app-layout>