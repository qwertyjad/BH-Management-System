<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddBoardingHouseRequest;
use App\Http\Requests\AddRoomRequest;
use App\Models\BoardingHouse;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{

    public function dashboard(){
       try{
        $id = Auth::guard('owner')->id();
        $bh = BoardingHouse::where('owner_id', $id)->get();
        return view('owner.dashboard', compact('bh'));
       }catch(\Exception $e){
       dd($e);
       }
    }

    public function boardingHouse(){
        $bh = BoardingHouse::where('owner_id', Auth::guard('owner')->id())->get();
        
        return view('owner.boardingHouse', compact('bh'));
    }

    public function store(AddBoardingHouseRequest $request){

        $data = $request->validated();
        $data['owner_id'] = Auth::guard('owner')->id();
            if($request->hasFile('background_image') && $request->hasFile('business_permit_image')){
            $data['background_image'] = $request->file('background_image')->store('background_images', 'public');
            $data['business_permit_image'] = $request->file('business_permit_image')->store('business_permit_images', 'public');
        
            BoardingHouse::create($data);
                return redirect()->route('owner.boardingHouse')->with('message', 'successfully created a boarding house');
            }else{
                return redirect()->back()->with('errors','Error creating boarding house');
            }
            return redirect()->back();
    }

   
}
