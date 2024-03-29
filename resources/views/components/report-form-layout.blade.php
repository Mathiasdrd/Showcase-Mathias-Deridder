
<div class="modal fade" id="modalToggle" aria-hidden="true" aria-labelledby="modalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalToggleLabel">What is wrong with this post?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('report.store', ['post'=> $post])}}" method="POST">
        @csrf
        <div class="modal-body">
        <h3 class="d-flex">This post:</h3>
            {{$slot}}
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger" data-bs-dismiss="modal">Send report</button>
        </div>
        </form>
    </div>
    </div>
</div>
<button type="button" class="btn btn-danger d-flex report" data-bs-toggle="modal" data-bs-target="#modalToggle">
  Report
</button>

