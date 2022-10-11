<x-app-layout>
    <div class="container justify-content-center card-color my-5 rounded box-shadow">
        @if(Session::has('message'))
            <div class="form-error">
                <p class="fw-bold text-success"> {{ Session::get('message') }} </p>
            </div>
        @endif
        @if (count($reports) !== 0)
        <table class="table m-0">
            <thead>
                <tr>
                    <td scope="col" class="fw-bold">Id</td>
                    <td scope="col" class="fw-bold">Reported post</td>
                    <td scope="col" class="fw-bold">Reason</td>
                    <td scope="col" class="fw-bold">Reported by</td>
                    <td scope="col" class="fw-bold">Remove post</td>
                </tr>
            </thead>
            <tbody>
            @foreach ($reports as $report)
            <tr>
                <td class="fw-semibold">
                   {{$report->id}}
                </td>
                <td><a href="{{ url('posts/' . $report->post->id)}}" class="text-decoration-underline text-dark">View Reported Post</a></td>
                <td>{{$report->report_reason->reason}}</td>
                <td>
                    {{$report->complainant->name}}
                </td>
                <td>
                @can('delete', $report->post)  
                    <div class="col-5">  
                        <form action="{{route('posts.destroy',['post'=> $report->post->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-dark">Remove Post</button> 
                        </form>
                    </div>
                @endcan
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>     
        @else 
            <p>No reported posts found</p>
        @endif
        <div class="d-flex justify-content-end col-11">
            <p>{{ $reports->links() }}</p>
        </div>
            <p class="d-flex justify-content-end col-11"> Showing {{$reports->firstItem()}} to {{$reports->lastItem()}} of {{$reports->total()}} results</p>
    </div>
    </x-app-layout>