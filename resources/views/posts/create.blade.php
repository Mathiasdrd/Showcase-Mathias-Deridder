<x-app-layout>
<div class="page-container">
    <div class="container">
        <div class="row">
            <div class="card-color login-form col-md-6 col-sm-8">
            <h3>Showcase Your Images</h3>
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data"  class="px-4 py-3">
                @csrf
                <div class="mb-3">
                    @if($errors->any())
                        {{$errors->first()}}
                    @endif
                <label for="image_path">Upload Your Image Here</label>
                <input type="file" class="form-control" id="image_path" name="image_path">
                </div>
                <div class="mb-3"> 
                <label for="post_title">Give Your Post A Title</label>
                <input type="text" class="form-control" id="post_title" name="post_title">
                </div>
                <div class="mb-3">
                <label for="tags">Add Tags</label>
                <input type="text" class="form-control" id="tags" name="tags">
                </div>
                <div  class="mb-3"> 
                <label for="description">Describe Your Post</label>
                <input type="textarea" class="form-control" id="description" name="description">
                </div>
                <div class="mb-3">
                <label for="category">Choose A Category</label>
                <select name="category" id="category">
                <option value="">--- Categories ---</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
                </select>
                </div>
                <div>
                    Do you own this image?
                    <label for="yes">
                        <input type="radio" name="is_image_owner" id="yes" value="1" checked>
                        Yes
                    <label for="no">
                        <input type="radio" name="is_image_owner" id="no" value="0">
                        No
                </div>
                <div id="creator_field" hidden>
                    <label for="creator">Provide a reference to the creator of this image</label>
                    <input type="text" class="form-control" id="creator" name="creator">
                </div>
                <div>
                    <button type="submit">Showcase</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>