@extends('admin.layouts.app')
@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
        <h2 class="fs-2 fw-bold">Modifier le service</h2>
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
                            <a href="{{ route('admin.services') }}" class="btn btn-primary btn-sm shadow-sm rounded-1 border-0">
                                Retour <i class="fa fa-close text-danger fw-bolder px-2"></i>
                            </a>
                        </div>
                        <form method="POST" name="editTeamForm" id="editTeamForm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="name">Nom du team</label>
                                        <input type="text" name="name" id="name" value="{{ $team->name }}" class="form-control rounded-1" placeholder="Enter le nom du team">
                                        <p class="error name-error text-danger"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="designation">Designation</label>
                                            <textarea name="designation" id="designation" class="form-control rounded-1" cols="30" rows="7">{{ $team->designation }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="image">Image</label>
                                            <input type="hidden" name="image_id" id="image_id" value="">
                                            <div id="image" class="dropzone dz-clickable rounded-1">
                                                <div class="dz-message needsclick">
                                                    <br>Déposez les fichiers ici ou cliquez pour télécharger.<br><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <img class="img-thumbnail my-2" src="{{ asset('uploads/teams/'.$team->image) }}" width="300" alt="{{ $team->name }}">
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="url_fb">Facebook</label>
                                        <input type="text" name="url_fb" id="url_fb" value="{{ $team->url_fb }}" class="form-control rounded-1" placeholder="Facebook">
                                        <p class="error name-error text-danger"></p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="url_ins">Instagram</label>
                                        <input type="text" name="url_ins" id="url_ins" value="{{ $team->url_ins }}" class="form-control rounded-1" placeholder="Instagram">
                                        <p class="error name-error text-danger"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="url_tw">Twitter</label>
                                        <input type="text" name="url_tw" id="url_tw" value="{{ $team->url_tw }}" class="form-control rounded-1" placeholder="Twitter">
                                        <p class="error name-error text-danger"></p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="url_in">Linkedin</label>
                                        <input type="text" name="url_in" id="url_in" value="{{ $team->url_in }}" class="form-control rounded-1" placeholder="Linkedin">
                                        <p class="error name-error text-danger"></p>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control rounded-1">
                                        <option {{ ($team->status == 1) ? 'selected' : '' }} value="1">Activé</option>
                                        <option {{ ($team->status == 0) ? 'selected' : '' }} value="0">Désactivé</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary border-0 rounded-1">Sauvegardez</button>
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

        $('#editTeamForm').submit(function(event){
            event.preventDefault();
            $("button[type='submit']").prop('disabled',true);
            $.ajax({
                url: '{{ route("admin.teams.updated",$team->id) }}',
                type: 'PUT',
                dataType: 'json',
                data: $('#editTeamForm').serializeArray(),
                success: function (response) {
                    $("button[type='submit']").prop('disabled',false);
                    if (response.status == 200) {
                        window.location.href = "{{ route('admin.teams') }}";
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
