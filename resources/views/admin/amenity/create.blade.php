@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.amenity.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Amenity</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.amenity.index') }}">Amenity</a></div>
                <div class="breadcrumb-item">Create</div>

            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Amenity</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.amenity.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="from-group">
                                    <label for="">Icon <span class="text-danger">*</span></label>
                                    <div role="iconpicker" name="icon" data-align="left" data-selected-class="btn-danger"
                                    data-unselected-class="btn-danger"></div>
                                </div>

                                <div class="from-group">
                                    <label for="">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="" id="" class="form-control">
                                </div>

                                &nbsp;
                                <div class="from-group">
                                    <label for="">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </select>
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

