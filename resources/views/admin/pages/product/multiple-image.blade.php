<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@extends('admin.master')
@section('admin')

    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="d-flex justify-content-between">
                            <h2 class="page-title">
                                Create Gallery Product
                            </h2>
                            <a href="{{ route('view.product') }}" class="btn btn-success">View Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-body">
                        <div id="table-default" class="table-responsive">
                            <form action="{{ route('multiple.image.store') }}" method="post" enctype="multipart/form-data" class="dropzone" id="myDropzone">
                                @csrf
                                <div>
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">

    Dropzone.autoDiscover = false;

    var dropzone = new Dropzone('#images', {
      thumbnailWidth: 200,
      maxFilesize: 2,
      paramName: "images",
      acceptedFiles: ".jpeg,.jpg,.png,.gif",

      error: function(file, errorMessage) {
        errors = true;
    },
    queuecomplete: function() {
        var count= dropzone.files.length;
        if(count == 1){

            setTimeout(function () {
                dropzone.removeAllFiles();
                alert("Image uploaded successfully");
            }, 1000);

        }else{

            setTimeout(function () {
                dropzone.removeAllFiles();
                alert("Images uploaded successfully");
            }, 1000);

        }
    }

});



</script>