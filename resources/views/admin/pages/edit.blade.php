@extends('admin.layouts.app')
@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
        <h2 class="fs-2 fw-bold">Modifier la page</h2>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <!-- Main content -->
    <section class="content h-100">
        <div class="container-fluid h-100">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary rounded-1">
                        <div class="card-header text-end">
                            <a href="{{ route('admin.pages') }}" class="btn btn-primary btn-sm shadow-sm rounded-1 border-0">
                                Retour <i class="fa fa-close text-danger fw-bolder px-2"></i>
                            </a>
                        </div>
                        <form method="POST" name="editPageForm" id="editPageForm">
                            <div class="card-body">

                                <div class="form-group mb-3">
                                    <label for="name">Nom de la page</label>
                                    <input type="text" name="name" id="name" value="{{ $page->name }}" class="form-control rounded-1" placeholder="Enter le nom du blog">
                                    <p class="error name-error text-danger"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="content">Description</label>
                                        <textarea name="content" id="content" class="summernote">{{ $page->content }}</textarea>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="image">Image</label>
                                            <input type="hidden" name="image_id" id="image_id" value="">
                                            <div id="image" class="dropzone dz-clickable rounded-1">
                                                <div class="dz-message needsclick py-5">
                                                    <br>Déposez les fichiers ici ou cliquez pour télécharger.<br><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <img class="img-thumbnail" src="{{ asset('uploads/pages/'.$page->image) }}" width="450" alt="{{ $page->name }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group my-3">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control rounded-1">
                                                <option {{ ($page->status == 1) ? 'selected' : '' }} value="1">Activé</option>
                                                <option {{ ($page->status == 0) ? 'selected' : '' }} value="0">Désactivé</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group my-3">
                                            <label for="url">Url de la page</label>
                                            <input type="text" name="url" id="url" value="{{ $page->url }}" class="form-control rounded-1" placeholder="Enter l'url de la page">
                                            <p class="error name-error text-danger"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary border-0 rounded-1">Modifiez</button>
                            </div>
                        </form>
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

        $('#editPageForm').submit(function(event){
            event.preventDefault();
            $("button[type='submit']").prop('disabled',true);
            $.ajax({
                url: '{{ route("admin.pages.updated",$page->id) }}',
                type: 'PUT',
                dataType: 'json',
                data: $('#editPageForm').serializeArray(),
                success: function (response) {
                    $("button[type='submit']").prop('disabled',false);
                    if (response.status == 200) {
                        window.location.href = "{{ route('admin.pages') }}";
                    } else {
                        $('.name-error').html(response.errors.name);
                    }
                }
            });
        });

        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                });
            },
            url:  "{{ route('tempUpload') }}",
            maxFiles: 1,
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif,image/webp",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, success: function(file, response){
                $("#image_id").val(response.id);
                //console.log(response)
            }
        });

    </script>

@endsection
