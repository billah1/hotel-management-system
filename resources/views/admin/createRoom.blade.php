<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  </head>
  <body>
   @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Add Rooms</li>
            </ul>
          </div>
        </div>
      
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <!-- Basic Form -->
              <div class="col-lg-12">
                <div class="block">
                  <div class="title">
                    <strong class="d-block">Add Room</strong>
                  </div>
                  <div class="block-body">
                    <form action="{{ url('store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="room_title" class="form-control-label">Room Title</label>
                        <input type="text" id="room_title" name="room_title" placeholder="Room Title" class="form-control" >
                      </div>
      
                      <div class="form-group">
                        <label for="description" class="form-control-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" ></textarea>
                      </div>
      
                      <div class="form-group">
                        <label for="price" class="form-control-label">Price</label>
                        <input type="number" id="price" name="price" placeholder="Room Price" class="form-control" min="0" >
                      </div>
      
                      <div class="form-group">
                        <label for="room_type" class="form-control-label">Room Type</label>
                        <select name="room_type" id="room_type" class="form-control" >
                          <option value="regular" selected>Regular</option>
                          <option value="premium">Premium</option>
                          <option value="deluxe">Deluxe</option>
                        </select>
                      </div>
      
                      <div class="form-group">
                        <label for="wifi" class="form-control-label">Free Wifi</label>
                        <select name="wifi" id="wifi" class="form-control" >
                          <option value="yes" selected>Yes</option>
                          <option value="no">No</option>
                        </select>
                      </div>
      
                      <div class="form-group">
                        <label for="image" class="form-control-label">Upload Image</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*" >
                      </div>
      
                      <div class="form-group">
                        <input type="submit" value="Add Room" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
      
      @include('admin.footer')
    </div>
    </div>
    <!-- JavaScript files-->
@include('admin.js')
  </body>
</html>