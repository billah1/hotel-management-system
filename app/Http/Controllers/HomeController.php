<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function detailsRoom($id){
        $room = Room::findOrFail($id);
         return view('home.detailsRoom',compact('room'));
     }
     public function addBooking(Request $request,$id){

         $request->validate([
           
            'start_date' => 'required|date', 
            'end_date' => 'required|after:start_date', 
        ]);
        $data                         =  new Booking();
        $data->room_id                = $id;
        $data->name                   = $request->name ;
        $data->email                  = $request->email;
        $data->phone                  = $request->phone;


        $start_date             = $request->start_date;
        $end_date               = $request->end_date;

        $isBooked = Booking::where('room_id',$id)
                             ->where('start_date','<=', $end_date )
                             ->where('end_date','>=', $start_date )->exists();

        if($isBooked){
            return redirect()->back()->with('message','Room is already Booked Try Different Date'); 
        }else{
            $data->start_date             = $request->start_date;
            $data->end_date               = $request->end_date;
            $data->save();
            return redirect()->back()->with('message','Room Booked Successfully');
        }


  
     }

     
}
