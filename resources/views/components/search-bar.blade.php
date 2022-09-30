<hr class="p-0 m-0"/>
<div class="header">
    <form action="{{route('home')}}" method="GET">
    <div class="input-group justify-content-center">
        <div class="form-outline col-11 col-sm-8">
        <input type="search" id="search" name="search" placeholder="Search" class="form-control">
        </div>
        <button type="submit" class="btn rounded">
            <span class="d-block d-sm-none">Search</span>
            <img src="{{asset('images/layout/search.svg')}}" class="d-none d-sm-block main" />
        </button>
    </div>
    </form>  
    <p class="text-white d-none d-sm-flex justify-content-center">Search for images you want to see!</p>
</div>