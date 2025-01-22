@extends('admin.layouts.app')
@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="fs-2 fw-bold">Liste des pages</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.pages') }}" class="btn btn-primary btn-sm shadow-sm rounded-1 border-0">
                Actualisée la page
            </a>
        </div>
    </div>

    <!-- Main content -->
    <section class="content h-100">
        <div class="container-fluid h-100">
            <!-- Small boxes (Stat box) -->
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-1 shadow-sm" role="alert">
                    <i class="fa fa-chess-king px-2"></i> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                   <div class="card rounded-0">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="card-tools shadow-sm">
                                <form action="" method="GET">
                                    <div class="input-group input-group" style="width: 250px;">
                                        <input type="text" name="keyword" value="{{ (!empty(Request::get('keyword'))) ? Request::get('keyword') : '' }}" class="form-control rounded-1 float-right" placeholder="Cherchez ici...">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn bg-primary rounded-1">
                                                <i class="fa fa-search text-white"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-sm shadow-sm rounded-1 border-0">
                                <i class="fas fa-plus"></i> &nbsp;Creer un page
                            </a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-striped">
                                <thead>
                                    <tr>
                                        <th width="50">ID</th>
                                        <th>Nom de page</th>
                                        <th width="100">Image du page</th>
                                        <th width="100">Date de création</th>
                                        <th width="100">Status</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pages->isNotEmpty())
                                        @foreach ($pages as $page)
                                        <tr>
                                            <td>{{ $page->id }}</td>
                                            <td>{{ $page->name }}</td>
                                            <td>
                                                @if (!empty($page->image))
                                                    <img class="img-thumbnail" src="{{ asset('uploads/pages/'.$page->image) }}" width="50" alt="{{ $page->name }}">
                                                @else
                                                    <img class="img-thumbnail" src="{{ asset('front/assets/images/pexels-photo.jpeg') }}" width="50" alt="pas d'image">
                                                @endif
                                            </td>
                                            <td>{{ $page->created_at }}</td>
                                            <td>
                                                @if ($page->status == 1)
                                                <span class="badge rounded-1 bg-primary">Activé</span>
                                                @else
                                                    <span class="badge rounded-1 bg-danger">Désactivé</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.pages.edit',$page->id) }}" class="btn btn-sm bg-primary rounded-1">
                                                    <i class="fa fa-edit text-white"></i>
                                                </a>
                                                <a href="javascript:void(0);" onclick="deletePage({{ $page->id }})" class="btn btn-sm btn-danger rounded-1">
                                                    <i class="fa fa-trash text-white"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-uppercase fw-bolder">Aucun element dans la base de donnée</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $pages->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('extraJs')
    <script>
        function deletePage(id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer le page !")) {
                $.ajax({
                    url: '{{ route("admin.pages.delete",$page->id) }}',
                    type: 'DELETE',
                    dataType: 'json',
                    data: {},
                    success: function (response) {
                        window.location.href = "{{ route('admin.pages') }}";
                    }
                })
            }
        };
    </script>
@endsection
