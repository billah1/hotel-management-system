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
            <center>
              <h2 class="h5 no-margin-bottom">Gallery</h2>
              <div class="row">
                @foreach($gallaries as $gallary)
                <div class="col-md-4">
                    <img src="{{asset('gallary/'.$gallary->image)}}" alt="" height="200px" width="300px"/>
                    <a onclick="return confirm('Are you sure you want to delete this image?');" href="{{ url('delete_gallary',$gallary->id) }}" class="btn btn-sm btn-danger">Delete Image </a>
                </td>
                </div>
              @endforeach
              </div>
      
              <form action="{{ url('upload_gallary') }}" method="POST" enctype="multipart/form-data" style="max-width: 400px;">
                @csrf
                <div class="form-group">
                  <label for="image" class="form-control-label">Upload Image</label>
                  <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Add Image</button>
                </div>
              </form>
            </center>
          </div>
        </div>
      </div>
      
      @include('admin.footer')
    </div>
    </div>
    <!-- JavaScript files-->
@include('admin.js')
  </body>
</html>