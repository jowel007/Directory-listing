@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.listing.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create Listing</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.listing.index') }}">Listing</a></div>
                <div class="breadcrumb-item">Create</div>

            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Listing</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.listing.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image <span class="text-danger">*</span> </label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" id="image-upload">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Thambnail Image <span class="text-danger">*</span>
                                            </label>
                                            <div id="image-preview-2" class="image-preview">
                                                <label for="image-upload-2" id="image-label-2">Choose File</label>
                                                <input type="file" name="image" id="image-upload-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label for="">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="" id="" class="form-control">
                                </div>

                                &nbsp;
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="from-group">
                                            <label for="">Category <span class="text-danger">*</span></label>
                                            <select name="status" id="" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="from-group">
                                            <label for="">Location <span class="text-danger">*</span></label>
                                            <select name="status" id="" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                &nbsp;
                                <div class="from-group">
                                    <label for="">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" value="" id="" class="form-control">
                                </div>
                                &nbsp;
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Phone <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" value="" id="" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Email <span class="text-danger">*</span></label>
                                        <input type="text" name="email" value="" id="" class="form-control">
                                    </div>
                                </div>
                                &nbsp;
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="from-group">
                                            <label for="">Website <span class="text-danger"></span></label>
                                            <input type="text" name="website" value="" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                &nbsp;
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="from-group">
                                            <label for="">Facebook Link <span class="text-danger"></span></label>
                                            <input type="text" name="facebook_link" value="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="from-group">
                                            <label for="">X Link <span class="text-danger"></span></label>
                                            <input type="text" name="x_link" value="" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="from-group">
                                            <label for="">Linkdin Link <span class="text-danger"></span></label>
                                            <input type="text" name="x_link" value="" id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="from-group">
                                            <label for="">Whatsapp Link <span class="text-danger"></span></label>
                                            <input type="text" name="whatsapp_link" value="" id="" class="form-control">
                                        </div>
                                    </div>
                                    &nbsp;
                                    <div class="col-md-12">
                                        <div class="from-group">
                                            <label for="">Attachment<span class="text-danger"></span></label>
                                            <input type="file" name="file" value="" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                &nbsp;
                                <div class="form-group">
                                    <label>Aminities</label>
                                    <select class="form-control select2" multiple="">
                                        @foreach ($amenities as $amenity)
                                            <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="from-group">
                                    <label for="">Description<span class="text-danger"></span></label>
                                   <textarea name="description" class="summernote"></textarea>
                                </div>
                                &nbsp;

                                <div class="form-group">
                                    <label for="">Google Map Embded Code<span class="text-danger"></span></label>
                                    <textarea name="google_map_emded_code" class="form-control"></textarea>
                                </div>

                                &nbsp;
                                <div class="from-group">
                                    <label for="">Seo Title<span class="text-danger"></span></label>
                                    <input type="text" name="seo_title" value="" id="" class="form-control">
                                </div>
                                &nbsp;
                                <div class="from-group">
                                    <label for="">Seo Description<span class="text-danger"></span></label>
                                    <textarea name="seo_description" class="form-control"></textarea>
                                </div>

                                &nbsp;

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="from-group">
                                            <label for="">Status <span class="text-danger">*</span></label>
                                            <select name="status" id="" class="form-control">
                                                <option value="">Select</option>
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="from-group">
                                            <label for="">Is Featured <span class="text-danger"></span></label>
                                            <select name="is_verified" id="" class="form-control">
                                                <option value="">Select</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="from-group">
                                            <label for="">Is Verified <span class="text-danger"></span></label>
                                            <select name="is_featured" id="" class="form-control">
                                                <option value="">Select</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>



                                
                                

                                &nbsp;
                                <div class="from-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
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
    </script>
@endpush
