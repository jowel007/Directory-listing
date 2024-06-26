@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.listing.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Update Listing</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.listing.index') }}">Listing</a></div>
                <div class="breadcrumb-item">Update</div>

            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Listing</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.listing.update', $listing->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image <span class="text-danger">*</span> </label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" id="image-upload" required>
                                                <input type="hidden" name="old_image" value="{{ $listing->image }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Thambnail Image <span class="text-danger">*</span>
                                            </label>
                                            <div id="image-preview-2" class="image-preview-2">
                                                <label for="image-upload-2" id="image-label-2">Choose File</label>
                                                <input type="file" name="thumbnail_image" id="image-upload-2" required>
                                                <input type="hidden" name="old_thumbnail_image"
                                                    value="{{ $listing->thumbnail_image }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="from-group">
                                    <label for="">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ $listing->title }}" id=""
                                        class="form-control" required>
                                </div>

                                &nbsp;
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="from-group">
                                            <label for="">Category <span class="text-danger">*</span></label>
                                            <select name="category" id="" class="form-control" required>
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option @selected($category->id === $listing->category_id) value="{{ $category->id }}">
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="from-group">
                                            <label for="">Location <span class="text-danger">*</span></label>
                                            <select name="location" id="" class="form-control" required>
                                                <option value="">Select</option>
                                                @foreach ($locations as $location)
                                                    <option @selected($location->id === $listing->location_id) value="{{ $location->id }}">
                                                        {{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                &nbsp;
                                <div class="from-group">
                                    <label for="">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" value="{{ $listing->address }}" id=""
                                        class="form-control" required>
                                </div>
                                &nbsp;
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Phone <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" value="{{ $listing->phone }}" id=""
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Email <span class="text-danger">*</span></label>
                                        <input type="text" name="email" value="{{ $listing->email }}" id=""
                                            class="form-control" required>
                                    </div>
                                </div>
                                &nbsp;
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="from-group">
                                            <label for="">Website <span class="text-danger"></span></label>
                                            <input type="text" name="website" value="{{ $listing->website }}"
                                                id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                &nbsp;
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="from-group">
                                            <label for="">Facebook Link <span class="text-danger"></span></label>
                                            <input type="text" name="facebook_link"
                                                value="{{ $listing->facebook_link }}" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="from-group">
                                            <label for="">X Link <span class="text-danger"></span></label>
                                            <input type="text" name="x_link" value="{{ $listing->x_link }}"
                                                id="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="from-group">
                                            <label for="">Linkdin Link <span class="text-danger"></span></label>
                                            <input type="text" name="linkedin_link"
                                                value="{{ $listing->linkedin_link }}" id=""
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="from-group">
                                            <label for="">Whatsapp Link <span class="text-danger"></span></label>
                                            <input type="text" name="whatsapp_link"
                                                value="{{ $listing->whatsapp_link }}" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    &nbsp;
                                    <div class="col-md-12">
                                        @if ($listing->file)
                                            <div>
                                                <i class="fas fa-file-alt" style="font-size: 60px"></i>
                                            </div>
                                        @endif

                                        <div class="from-group">
                                            <label for="">Attachment<span class="text-danger">*</span></label>
                                            <input type="file" name="file" value="{{ $listing->facebook_link }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                &nbsp;
                                <div class="form-group">
                                    <label>Aminities</label>
                                    <select class="form-control select2" multiple="" name="amenities[]">
                                        @foreach ($amenities as $amenity)
                                            <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="from-group">
                                    <label for="">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" class="summernote" required>{!! $listing->description !!}</textarea>
                                </div>
                                &nbsp;

                                <div class="form-group">
                                    <label for="">Google Map Embded Code<span class="text-danger"></span></label>
                                    <textarea name="google_map_emded_code" class="form-control">{!! $listing->google_map_emded_code !!}</textarea>
                                </div>

                                &nbsp;
                                <div class="from-group">
                                    <label for="">Seo Title<span class="text-danger"></span></label>
                                    <input type="text" name="seo_title" value="{{ $listing->seo_title }}"
                                        class="form-control">
                                </div>
                                &nbsp;
                                <div class="from-group">
                                    <label for="">Seo Description<span class="text-danger"></span></label>
                                    <textarea name="seo_description" class="form-control">{!! $listing->seo_description !!}</textarea>
                                </div>

                                &nbsp;

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="from-group">
                                            <label for="">Status <span class="text-danger">*</span></label>
                                            <select name="status" id="" class="form-control" required>
                                                <option value="">Select</option>
                                                <option @selected($listing->status === 1) value="1">Active</option>
                                                <option @selected($listing->status === 0) value="0">InActive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="from-group">
                                            <label for="">Is Featured <span class="text-danger"></span></label>
                                            <select name="is_verified" id="" class="form-control" required>
                                                <option value="">Select</option>
                                                <option @selected($listing->is_verified === 0) value="0">No</option>
                                                <option @selected($listing->is_verified === 1) value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="from-group">
                                            <label for="">Is Verified <span class="text-danger"></span></label>
                                            <select name="is_featured" id="" class="form-control" required>
                                                <option value="">Select</option>
                                                <option @selected($listing->is_featured === 0) value="0">No</option>
                                                <option @selected($listing->is_featured === 1) value="1">Yes</option>
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
        var listingAmenities = {!! json_encode($listingAmenities) !!}
        // console.log(listingAmenities);
        $('.select2').select2().val(listingAmenities).trigger("change");




        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ asset($listing->image) }})',
                'background-repeat': 'no-repeat',
                'background-size': 'cover',
                'background-position': 'center'
            });
        })

        $(document).ready(function() {
            $('.image-preview-2').css({
                'background-image': 'url({{ asset($listing->thumbnail_image) }})',
                'background-repeat': 'no-repeat',
                'background-size': 'cover',
                'background-position': 'center'
            });
        })

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
