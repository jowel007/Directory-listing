@extends('frontend.layouts.master')
@section('content')

<section id="dashboard">
    <div class="container">
      <div class="row">

        @include('Frontend.dashboard.sidebar')

        <div class="col-lg-9">
          <div class="dashboard_content">
            <div class="my_listing">
              <h4>basic information</h4>
              <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-xl-8 col-md-12">
                    <div class="row">
                      <div class="col-xl-6 col-md-6">
                        <div class="my_listing_single">
                          <label>Name</label>
                          <div class="input_area">
                            <input type="text" name="name" placeholder="Name" value="{{ $user->name }}">
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="my_listing_single">
                          <label>Phone</label>
                          <div class="input_area">
                            <input type="text" name="phone" placeholder="Phone" value="{{ $user->phone }}">
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-12">
                        <div class="my_listing_single">
                          <label>Email</label>
                          <div class="input_area">
                            <input type="Email" name="email" placeholder="Email" value="{{ $user->email }}">
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-12">
                        <div class="my_listing_single">
                          <label>Address</label>
                          <div class="input_area">
                            <input type="text" name="address" placeholder="Address" value="{{ $user->address }}">
                          </div>
                        </div>
                      </div>

                      
                      <div class="col-xl-12">
                        <div class="my_listing_single">
                          <label>About Me</label>
                          <div class="input_area">
                            <textarea name="about" class="form-control">{!! $user->about !!}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="my_listing_single">
                          <label>Website</label>
                          <div class="input_area">
                            <input type="text" name="website" placeholder="Website" value="{{ $user->website }}">
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="my_listing_single">
                          <label>Facebook</label>
                          <div class="input_area">
                            <input type="text" name="fb_link" placeholder="Facebook" value="{{ $user->fb_link }}">
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="my_listing_single">
                          <label>X</label>
                          <div class="input_area">
                            <input type="text" name="x_link" placeholder="X" value="{{ $user->x_link }}">
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="my_listing_single">
                          <label>Linkdin</label>
                          <div class="input_area">
                            <input type="text" name="in_link" placeholder="Linkdin" value="{{ $user->in_link }}">
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="my_listing_single">
                          <label>Whatsapp</label>
                          <div class="input_area">
                            <input type="text" name="wa_link" placeholder="Whatsapp" value="{{ $user->wa_link }}">
                          </div>
                        </div>
                      </div>


                      <div class="col-xl-6">
                        <div class="my_listing_single">
                          <label>Instagram</label>
                          <div class="input_area">
                            <input type="text" name="insta_link" placeholder="Instagram" value="{{ $user->insta_link }}">
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="col-xl-4 col-md-5">
                    <div class="my_listing_single">
                        <label for=""><h4>Avatar</h4></label>
                        <div class="profile_pic_upload">
                            <img src="{{ asset($user->avatar) }}" alt="img" class="imf-fluid w-100">
                            <input type="file" name="avatar">
                            <input type="hidden" name="old_avatar" value="{{ $user->avatar }}">

                        </div>
                    </div>

                    <div class="my_listing_single">
                        <label for=""><h4>Banner</h4></label>
                        <div class="profile_pic_upload">
                            <img src="{{ asset($user->banner) }}" alt="img" class="imf-fluid w-100">
                            <input type="file" name="banner">
                            <input type="hidden" name="old_banner" value="{{ $user->banner }}">
                        </div>
                    </div>

                  </div>
                </div>

                <div class="col-12">
                  <button type="submit" class="read_btn">Update</button>
                </div>
              </form>
            </div>
            <div class="my_listing list_mar">
              <h4>change password</h4>
              <form action="{{ route('user.update-password') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-xl-4 col-md-6">
                    <div class="my_listing_single">
                      <label>current password</label>
                      <div class="input_area">
                        <input type="password" name="current_password" placeholder="Current Password">
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-md-6">
                    <div class="my_listing_single">
                      <label>new password</label>
                      <div class="input_area">
                        <input type="password" name="password" placeholder="New Password">
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="my_listing_single">
                      <label>confirm password</label>
                      <div class="input_area">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="read_btn">Update</button>
                  </div>
                </div>
              </form>
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection