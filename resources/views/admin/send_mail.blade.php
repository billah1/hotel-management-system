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
                <h1>Mail Send To : {{ $contact->name }}</h1>

                <form action="{{ url('mail',$contact->id) }}" method="POST"  >
                    @csrf
                   <div class="form-group">
                     <label for="greeting" class="form-control-label">Greeting</label>
                     <input type="text" id="greeting" name="greeting" placeholder="greeting" class="form-control" >
                   </div>
   
                   <div class="form-group">
                     <label for="body" class="form-control-label">Mail Body</label>
                     <textarea name="body" id="body" class="form-control" rows="4" ></textarea>
                   </div>
   
                   <div class="form-group">
                     <label for="action_text" class="form-control-label">Action Text </label>
                     <input type="text" id="action_text" name="action_text" placeholder="Action Text" class="form-control" min="0" >
                   </div>

                   <div class="form-group">
                    <label for="action_url" class="form-control-label">Action Url </label>
                    <input type="text" id="action_url" name="action_url" placeholder="Action Url" class="form-control" min="0" >
                  </div>
  
   
                  <div class="form-group">
                    <label for="endline" class="form-control-label">End Line </label>
                    <input type="text" id="endline" name="endline" placeholder="End Line" class="form-control" min="0" >
                  </div>
                  
   
                  
   
                   <div class="form-group">
                     <input type="submit" value="Send Mail" class="btn btn-primary">
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