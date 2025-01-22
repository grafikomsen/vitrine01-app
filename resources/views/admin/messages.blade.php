@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h3>Error <i class="fa fa-baby"></i>{{ Session::get('error') }}</h3>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('success'))
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h3>Success <i class="fa fa-baby"></i>{{ Session::get('success') }}</h3>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

