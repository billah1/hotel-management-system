<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('/') }}fronts/images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         @include('home.header')
      </header>

      <div  class="our_room">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                    <h2>Our Room</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                 </div>
              </div>
           </div>
         
           <div class="row">
          
             <div class="col-md-8">
                <div id="serv_hover"  class="room">
                   <div style="padding: 20px" class="room_img">
                      <figure><img style="height: 300px; width: 800px;" src="{{ asset('room/'.$room->image) }}" alt="#"/></figure>
                   </div>
                   <div class="bed_room">
                      <h2>{{ $room->room_title }}</h2>
                      <p style="padding: 12px">{{ $room->description }}</p>
                      <h4 style="padding: 12px">free wifi : {{ $room->wifi }}</h4>
                      <h4 style="padding: 12px">Room Type : {{ $room->room_type }}</h4>
                      <h3 style="padding: 12px">Room Price : {{ $room->price }}</h3>
                   </div>
                </div>
             </div>

             <div class="col-md-4">
                <h1 style="font-size: 40px!important;">Book Room</h1>
                <div>
                  @if(session()->has('message'))
                  <div class="alert alert-success">
                     <button type="button" class="close" data-bs-dismiss = "alert">X</button>
                     {{ session()->get('message') }}
                  </div>
                     
                  @endsession

                </div>
                @if($errors)
                @foreach($errors->all() as $errors )
                  <li style="color: red;">
                     {{ $errors }}
                  </li>
                @endforeach
                @endif
                <form action="{{ url('add_booking',$room->id)  }}" method="post">
                    @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Name</label>
                    <input type="text" id="name" name="name" 
                    @if(Auth::id())
                    value="{{ Auth::user()->name }}"
                    @endif
                     placeholder="Name" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-label">Email</label>
                    <input type="email" id="email" name="email" 
                    @if(Auth::id())
                    value="{{ Auth::user()->email }}"
                    @endif
                    placeholder="Email" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="phone" class="form-control-label">Phone</label>
                    <input type="number" id="phone" name="phone"
                    @if(Auth::id())
                    value="{{ Auth::user()->phone }}"
                    @endif
                     placeholder="Phone" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="start_date" class="form-control-label">Start Date</label>
                    <input type="date" id="start_date" name="start_date" placeholder="Start Date" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="end_date" class="form-control-label">End Date</label>
                    <input type="date" id="end_date" name="end_date" placeholder="End Date" class="form-control" >
                </div>
                <div class="form-group">
                    <input type="submit" value="Book Room" class="btn btn-primary">
                </div>
             </div>
            </form>
           
          </div>
          
           
        </div>
     </div>
  @include('home.footer')

  <script type="text/javascript">
   $(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;

    var day = dtToday.getDate();

    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();

    if(day < 10)
     day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#start_date').attr('min', maxDate);
    $('#end_date').attr('min', maxDate);

});
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


   </body>
</html>