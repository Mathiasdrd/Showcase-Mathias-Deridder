@if(!$category->children->isEmpty())
   <div class="p-0 px-md-4 py-md-3">
      <div class="btn-group col-12">
         <button class="btn card-color px-4 col-8" type="button">      
            <a href="{{ url('categories/'. $category->id)}}" class="text-black">{{$category->category_name}}</a>
         </button>
         <button type="button" class="btn card-color dropdown-toggle dropdown-toggle-split col-3" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
         </button>
         <ul class="dropdown-menu offset-1 card-color col-12">
            @foreach ($category->children as $subcategory)
               <li class="dropdown-item"><a href="{{ url('categories/' . $subcategory->id)}}" class="text-black"> {{ $subcategory->category_name }}</a></li>
            @endforeach
         </ul>
      </div>
   </div>
@else
   <div class="p-0 px-md-4 py-md-3">
      <div class="btn-group col-12">
      <button class="btn card-color px-4" type="button">      
         <a href="{{ url('categories/'. $category->id)}}" class="text-black">{{$category->category_name}}</a>
      </button>
      </div>
   </div>
@endif

  
