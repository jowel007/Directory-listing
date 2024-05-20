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
                            <input type="text" name="name" placeholder="Name">
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="my_listing_single">
                          <label>Phone</label>
                          <div class="input_area">
                            <input type="text" name="phone" placeholder="Phone">
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-12">
                        <div class="my_listing_single">
                          <label>Email</label>
                          <div class="input_area">
                            <input type="Email" name="email" placeholder="Email">
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-12">
                        <div class="my_listing_single">
                          <label>Address</label>
                          <div class="input_area">
                            <input type="text" name="address" placeholder="Address">
                          </div>
                        </div>
                      </div>

                      
                      <div class="col-xl-12">
                        <div class="my_listing_single">
                          <label>About Me</label>
                          <div class="input_area">
                            <textarea cols="3" name="about" rows="3" placeholder="Your Text"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="my_listing_single">
                          <label>Website</label>
                          <div class="input_area">
                            <input type="Email" name="website" placeholder="Email">
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="my_listing_single">
                          <label>Facebook</label>
                          <div class="input_area">
                            <input type="text" name="fb_link" placeholder="Facebook">
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="my_listing_single">
                          <label>X</label>
                          <div class="input_area">
                            <input type="text" name="x_link" placeholder="X">
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="my_listing_single">
                          <label>Linkdin</label>
                          <div class="input_area">
                            <input type="text" name="in_link" placeholder="Linkdin">
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-6">
                        <div class="my_listing_single">
                          <label>Whatsapp</label>
                          <div class="input_area">
                            <input type="text" name="wa_link" placeholder="Whatsapp">
                          </div>
                        </div>
                      </div>


                      <div class="col-xl-6">
                        <div class="my_listing_single">
                          <label>Instagram</label>
                          <div class="input_area">
                            <input type="text" name="insta_link" placeholder="Instagram">
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="col-xl-4 col-md-5">
                    <div class="my_listing_single">
                        <label for=""><h4>Avatar</h4></label>
                        <div class="profile_pic_upload">
                            <img src="images/user_large_img.jpg" alt="img" class="imf-fluid w-100">
                            <input type="file" name="avatar">
                        </div>
                    </div>

                    <div class="my_listing_single">
                        <label for=""><h4>Banner</h4></label>
                        <div class="profile_pic_upload">
                            <img src="images/user_large_img.jpg" alt="img" class="imf-fluid w-100">
                            <input type="file" name="banner">
                        </div>
                    </div>

                  </div>
                </div>

                <div class="col-12">
                  <button type="submit" class="read_btn">upload</button>
                </div>
              </form>
            </div>
            <div class="my_listing list_mar">
              <h4>change password</h4>
              <form>
                <div class="row">
                  <div class="col-xl-4 col-md-6">
                    <div class="my_listing_single">
                      <label>current password</label>
                      <div class="input_area">
                        <input type="password" placeholder="Current Password">
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-md-6">
                    <div class="my_listing_single">
                      <label>new password</label>
                      <div class="input_area">
                        <input type="password" placeholder="New Password">
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="my_listing_single">
                      <label>confirm password</label>
                      <div class="input_area">
                        <input type="password" placeholder="Confirm Password">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="read_btn">upload</button>
                  </div>
                </div>
              </form>
            </div>

            <div class="my_listing list_mar">
              <form>
                <h4>Profile Banner Image</h4>
                <div class="row">
                  <div class="col-xl-6 col-md-8 col-lg-6">
                    <div class="profile_pic_upload banner_pic_upload">
                      <img src="images/login_breadcrumb.jpg" alt="img" class="imf-fluid w-100">
                      <input type="file">
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="read_btn">upload</button>
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