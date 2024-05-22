@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Hero</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Hero</div>

            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Hero</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.hero.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Background <span class="text-danger">*</span> </label>
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="background" id="image-upload">
                                        <input type="hidden" name="old_background" value="{{ @$hero->background }}">
                                    </div>
                                </div>
                                <div class="from-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" value="{{ @$hero->title }}" id=""
                                        class="form-control">

                                </div>
                                <div class="from-group">
                                    <label for="">Sub Title</label>
                                    {{-- <input type="text" name="sub_title" value="{{ @$hero->sub_title }}" id="" class="form-control"> --}}
                                    <textarea name="sub_title" id="" cols="30" class="form-control" rows="10">{{ @$hero->sub_title }}</textarea>
                                </div>

                                <div class="from-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection


<script>
    $(document).ready(function() {
        $('.image-preview').css({
            'background-image': 'url({{ asset(@$hero->background) }})',
            'background-repeat': 'no-repeat',
            'background-size': 'cover',
            'background-position': 'center'
        });
    })
</script>
