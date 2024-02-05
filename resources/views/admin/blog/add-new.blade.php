@extends('admin.layouts.app')

@section('content')

<head>
    <title>Laravel 9 Multiple Upload Images using Dropzone drag and drop</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.2/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<style>
    #preview {
        display: flex;
        flex-wrap: wrap;
    }


    .image-container {
        margin-right: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!-- Content header content here -->
    </div>

    <div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h3 class="card-title">Add New Work</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('create-blog') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="title" class="form-label">Title<span style="color:red">*</span></label>
                                <input type="text" name="Title" class="form-control" id="title" placeholder="Enter  title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="Description" class="form-control" id="description" placeholder="Enter  description" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="thumbImage" class="form-label">Thumb Image<span style="color:red">*</span></label>
                                <input type="file" name="Image" class="form-control" id="thumbImage" required>
                            </div>
                            <div class="mb-3">
                                <label for="multipleImages" class="form-label">Multiple Images<span style="color:red">*</span></label>
                                <input type="file" id="imageInput" name="multiimage[]" class="form-control" multiple required>
                            </div>
                            <div id="preview" class="mb-3"></div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</div>
</div>

@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    $(document).ready(function() {
        $('#imageInput').on('change', function() {
            var formData = new FormData();
            var files = $('#imageInput')[0].files;

            for (var i = 0; i < files.length; i++) {
                formData.append('multipleimage[]', files[i]);
            }

            // Add CSRF token to formData
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ url("upload-multiple") }}', // Replace with your actual route
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log('Images uploaded successfully:', response);
                    // Handle the response as needed

                    // Fetch images after successful upload
                    fetchImages();

                },
                error: function(error) {
                    console.error('Error uploading images:', error);
                    // Handle errors if any
                }
            });
        });


        function fetchImages() {
            $.ajax({
                url: '{{ url("fetch-images") }}', // Replace with your actual route for fetching images
                method: 'GET',
                success: function(response) {
                    // Clear previous preview
                    $('#preview').empty();

                    var imageIds = ''; // String to store image IDs

                    // Loop through the image URLs and create image elements for preview
                    response.images.forEach(function(imageUrl) {
                        var imageHtml = '<div class="preview-item" style="position: relative; width: 100px; height: 100px; margin-right: 25px; margin-bottom: 25px;">';
                        imageHtml += '<img src="' + imageUrl.url + '" class="preview-image" alt="Preview Image" style="width: 100%; height: 100%;">';
                        imageHtml += '<button class="delete-btn" data-id="' + imageUrl.id + '" style="position: absolute; top: 0; right: 0; background-color: black; border: none; padding: 5px; cursor: pointer; color: red; font-size: 16px;" type="button">&#10005;</button>';
                        imageHtml += '</div>';

                        $('#preview').append(imageHtml);

                        // Append the image ID to the string
                        imageIds += imageUrl.id + ',';

                    });

                    // Remove the trailing comma
                    imageIds = imageIds.slice(0, -1);

                    // Set the value of the hidden input
                    $('#imageIds').val(imageIds);
                },
                error: function(error) {
                    console.error('Error fetching images:', error);
                    // Handle errors if any
                }
            });
        }

        // Add CSRF token to formData
        // formData.append('_token', '{{ csrf_token() }}');
        var clickCount = 0;

        $(document).on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            deleteImage(id);
            fetchImages(); // Call fetchImages after deleting an image
            fetchImages();
        });


        function deleteImage(id) {
            $.ajax({
                url: '/delete-image/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response.message);
                    // Handle success, maybe remove the deleted image from the UI
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error('XHR:', xhr);
                    console.error('Status:', textStatus);
                    console.error('Error Thrown:', errorThrown);
                }
            });
        }


        // Fetch images on page load
        fetchImages();

    });

    // function fetch(){

    // }
</script>




@endpush