<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use App\Models\Room;
use App\Notifications\SendEmailNotifications;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index(){
        if (Auth::id())
        {
            $usertype = Auth()->user()->usertype;
           if($usertype == 'user') {
               $room = Room::all();
               $gallary = Gallary::all();
               return view('home.index',compact('room','gallary'));
           }else if($usertype == 'admin'){
               return view('admin.index');
           }else{
               return redirect()->back();
           }

        }

    }


    public function home(){
       $room = Room::all();
       $gallary = Gallary::all();
        return view('home.index',compact('room','gallary'));
    }

    public function createRoom(){
        return view('admin.createRoom');
    }


    public function storeRoom(Request $request){
        // dd($request->all());
        $data                         =  new Room();
        $data->room_title             = $request->room_title;
        $data->description            = $request->description;
        $data->price                  = $request->price;
        $data->wifi                   = $request->wifi;
        $data->room_type              = $request->room_type;
        $image                        = $request->image;

          if($image){
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('room'), $imageName);
            $data->image = $imageName;
          }
        $data->save();
        return redirect()->back();
     
    }

    public function viewRoom(){
        return view('admin.viewRoom',['rooms' => Room::all()]);
       
    }


    public function deleteRoom($id){

        $room = Room::find($id);
        $room->delete();
        return redirect()->back();
       
    }

     public function editRoom($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.editRoom', ['room' => $room]);
    }

    public function updateRoom(Request $request, $id) {
  
        $data = Room::findOrFail($id);
        $data->room_title = $request->room_title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->room_type;
        $image = $request->image;
        if ($image) {
            if (file_exists(public_path('room/' . $data->image))) {
                unlink(public_path('room/' . $data->image));
            }
    
           
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('room'), $imageName);
            $data->image = $imageName;
        }
    

        $data->save();
    
        return redirect()->back();
    }

    public function bookings(){
        $bookings = Booking::all();
        return view('admin.booking',compact('bookings')); 
    }

    
    public function deleteBookings($id){

        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->back();
       
    }
  
    public function approveBookings($id){

        $booking = Booking::find($id);
        $booking->status = 'approve';
        $booking->save();
        return redirect()->back();
       
    }

    public function rejectBookings($id){

        $booking = Booking::find($id);
        $booking->status = 'rejected';
        $booking->save();
        return redirect()->back();
       
    }
    public function viewGallary(){
      $gallaries = Gallary::all();
        return view('admin.gallary',compact('gallaries')); 
    }

    public function uploadGallary(Request $request){

        $data                         =  new Gallary();
        $image                        = $request->image;

          if($image){
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('gallary'), $imageName);
            $data->image = $imageName;
          }
        $data->save();
        return redirect()->back();

        
      
       
    }


    public function deleteGallary($id){

        $gallary = Gallary::find($id);
        $gallary->delete();
        return redirect()->back();
       
    }
    public function allMessages(){
         $contacts = Contact::all();
        return view('admin.all_messages',compact('contacts')); 
    }

    public function sendMail($id){

        $contact = Contact::find($id);
        // $gallary->delete();
        return view('admin.send_mail',compact('contact')); 
       
    }

    public function mail(Request $request,$id){

        $data = Contact::find($id);

        $details = [

            'greeting'     => $request->greeting,
            'body'         => $request->body,
            'action_text'  => $request->action_text,
            'action_url'   => $request->action_url,
            'endline'      => $request->endline,
        ];
        Notification::send($data, new SendEmailNotifications($details));
        
        return redirect()->back(); 
       
    }

    

    

    
    
}
