<x-app-layout>
    <div>
        <h3>Showcase Your Images</h3>
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                @if($errors->any())
                    {{ implode('', $errors->all(':message')) }}
                @endif
            </div>
            <div>
            <label for="image_path">Upload Your Image Here</label>
            <input type="file" id="image_path" name="image_path">
            </div>
            <label for="post_title">Give Your Post A Title</label>
            <input type="text" id="post_title" name="post_title">
            </div>
            <div>
            <label for="tags">Add Tags</label>
            <input type="text" id="tags" name="tags">
            </div>
            <div>
            <label for="description">Describe Your Post</label>
            <input type="textarea" id="description" name="description">
            </div>
            <div>
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
                <input type="text" id="creator" name="creator">
            </div>
            <div>
                <input type="submit" value="Showcase">
            </div>
        </form>
    </div>
</x-app-layout>