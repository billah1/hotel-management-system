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
      <div class="page-content py-5">
        <div class="page-header mb-4">
          <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-striped">
                  <thead class="table-dark" >
                    <tr >
                      <th>#</th>
                      <th>Room Number </th>
                      <th>Customer Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Arrival Date</th>
                      <th>Leaving Date</th>
                      <th>Status</th>
                      <th>Room Title</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($bookings as $booking)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$booking->room_id}}</td>
                      <td>{{$booking->name}}</td>
                      <td>{{$booking->email}}</td>
                      <td>{{$booking->phone}}</td>
                      <td>{{$booking->start_date}}</td>
                      <td>{{$booking->end_date}}</td>
                      <td>
                        @if($booking->status == 'approve' )
                        <span style="color: skyblue">Approved</span>
                        @endif
                        @if($booking->status == 'rejected' )
                        <span style="color: red">Rejected</span>
                        @endif
                        @if($booking->status == 'waiting' )
                        <span style="color: yellow">Waiting</span>
                        @endif
                      </td>
                      <td>{{$booking->room->room_title}}</td>
                      <td>{{$booking->room->price}}</td>
                      <td><img src="{{asset('room/'.$booking->room->image)}}" alt="" height="40" width="60"/></td>
                      <td>
                        <span style="padding-bottom: 10px;">
                            <a  href="{{ url('approve_booking', $booking->id) }}" class="btn btn-sm btn-success">Approved</a>
                        </span>
                        <span style="padding-bottom: 10px;">
                        <a  href="{{ url('reject_booking', $booking->id) }}" class="btn btn-sm btn-warning">Rejected</a>
                        </span>
                        <a onclick="return confirm('Are you sure to delete this booking?');" href="{{ url('delete_booking',$booking->id) }}" class="btn btn-sm btn-danger">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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