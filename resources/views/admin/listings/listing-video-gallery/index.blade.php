@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.listing.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Listing Video Gallery</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.listing.index') }}">Listing</a></div>
                <div class="breadcrumb-item">Video Gallery</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Video Gallery</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.listing-video-gallery.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="listing_id">Video Url<code>*</code> </label>
                                    <input type="text" name="video_url" class="form-control" id="">
                                    <input type="hidden" name="listing_id" value="{{ request()->id }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Uploads</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Image</h4>

                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Video Url</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($videos as $video)
                                        <tr>
                                            <th scope="row">{{ ++$loop->index }}</th>
                                            <td>
                                                <img width="200px" src="{{ getThumbnail($video->video_url) }}" alt="">
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{ $video->video_url }}">{{ $video->video_url }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.listing-video-gallery.destroy', $video->id) }}" class="delete-item btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
@endpush
