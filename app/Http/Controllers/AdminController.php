<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if (Auth::id())
        {
            $usertype = Auth()->user()->usertype;
           if($usertype == 'user') {
               return view('home.index');
           }else if($usertype == 'admin'){
               return view('admin.index');
           }else{
               return redirect()->back();
           }

        }

    }


    public function home(){
        return view('home.index');
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
    
}
