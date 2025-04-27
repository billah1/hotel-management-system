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
            <div class="row">
                <div class="col-12">
                  <div class="block">
                    <h2 class="mb-3"><strong>view Message </strong></h2>
                
                    
                    <!-- Table -->
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead class="table-dark">
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                           
                            <td>{{$contact->phone}}</td>
                            <td>{{ Str::limit($contact->message, 100) }}</td>
                            <td>
                                <a  href="{{ url('send_mail',$contact->id) }}" class="btn btn-sm btn-primary">Send Mail</a>
                               
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