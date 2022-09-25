@if(!$category->children->isEmpty())
   <div class="px-4 py-3">
      <div class="btn-group">
         <button class="btn btn-dark px-4" type="button">      
            <a href="{{ url('categories/'. $category->id)}}">{{$category->category_name}}</a>
         </button>
         <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
         </button>
         <ul class="dropdown-menu dropdown-menu-dark offset-2">
            @foreach ($category->children as $subcategory)
               <li class="dropdown-item"><a href="{{ url('categories/' . $subcategory->id)}}"> {{ $subcategory->category_name }}</a></li>
            @endforeach
         </ul>
      </div>
   </div>
@else
   <div class="px-4 py-3">
      <button class="btn btn-dark px-4" type="button">      
         <a href="{{ url('categories/'. $category->id)}}">{{$category->category_name}}</a>
      </button>
   </div>
@endif

  
