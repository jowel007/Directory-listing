@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Hero</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Posts</a></div>
        <div class="breadcrumb-item">Create New Post</div>
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
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Background <span class="text-danger">*</span> </label>
                        <div id="image-preview" class="image-preview avatar-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="avatar" id="image-upload">
                            <input type="hidden" name="old_avatar" value="">
                        </div>
                    </div>
                    <div class="from-group">
                        <label for="">Title</label>
                        <input type="text" name="title" id="" class="form-control">

                    </div>
                    <div class="from-group">
                        <label for="">Sub Title</label>
                        <input type="text" name="sub_title" id="" class="form-control">
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
