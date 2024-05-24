@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.category.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></div>
                <div class="breadcrumb-item">Edit</div>

            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.update', $category->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Icon Image <span class="text-danger">*</span> </label>
                                            <div id="image-preview" class="image-preview image_icon">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image_icon" id="image-upload">
                                                <input type="hidden" name="old_image_icon"
                                                    value="{{ $category->image_icon }}">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Background Image <span
                                                    class="text-danger">*</span></label>
                                            <div id="image-preview-2" class="image-preview background_image">
                                                <label for="image-upload-2" id="image-label-2">Choose File</label>
                                                <input type="file" name="background_image" id="image-upload-2">
                                                <input type="hidden" name="old_background_image"
                                                    value="{{ $category->background_image }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="from-group">
                                    <label for="">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ $category->name }}" id=""
                                        class="form-control">
                                </div>

                                &nbsp;
                                <div class="from-group">
                                    <label for="">Show at Home <span class="text-danger">*</span></label>
                                    <select name="show_at_home" id="" class="form-control">
                                        <option value="">Select</option>
                                        <option @selected($category->show_at_home == 1) value="1">Yes</option>
                                        <option @selected($category->show_at_home == 0) value="0">No</option>
                                    </select>
                                </div>
                                &nbsp;
                                <div class="from-group">
                                    <label for="">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">Select</option>
                                        <option @selected($category->status == 1) value="1">Active</option>
                                        <option @selected($category->status == 0) value="0">InActive</option>
                                    </select>
                                </div>

                                &nbsp;
                                <div class="from-group">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection


@push('scripts')
    <script>
        $.uploadPreview({
            input_field: "#image-upload-2", // Default: .image-upload
            preview_box: "#image-preview-2", // Default: .image-preview
            label_field: "#image-label-2", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });


        $(document).ready(function() {
            $('.image_icon').css({
                'background-image': 'url({{ asset($category->image_icon) }})',
                'background-repeat': 'no-repeat',
                'background-size': 'cover',
                'background-position': 'center'
            });
        })


        $(document).ready(function() {
            $('.background_image').css({
                'background-image': 'url({{ asset($category->background_image) }})',
                'background-repeat': 'no-repeat',
                'background-size': 'cover',
                'background-position': 'center'
            });
        })
    </script>
@endpush
