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
      
        <div class="page-content py-5">
          <div class="page-header mb-4">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="block">
                    <h2 class="mb-3"><strong>view room </strong></h2>
                
                    
                    <!-- Table -->
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead class="table-dark">
                          <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>wifi</th>
                            <th>Room Type</th>
                            <th>Image</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$room->room_title}}</td>
                            <td>{{$room->price}}</td>
                            <td><img src="{{asset('room/'.$room->image)}}" alt="" height="40" width="60"/></td>
                            <td>{{$room->wifi}}</td>
                            <td>{{$room->room_type}}</td>
                            <td>
                              <a  href="{{ url('edit_room',$room->id) }}" class="btn btn-sm btn-primary">Edit</a>
                              <a onclick="return confirm('Are you sure you want to delete this room?');" href="{{ url('delete_room',$room->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
          </div> 
        </div> 
    
      
      @include('admin.footer')
    </div>
    </div>
    <!-- JavaScript files-->
@include('admin.js')
  </body>
</html>