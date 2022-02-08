<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservation(){
        return view('reservation');
    }


    public function create(Request $request){
        if($request){
            if($request->room !== '1'){
                $rtype = [
                    "standard" => $request->room_type[0],
                    "deluxe" => $request->room_type[1],
                    "suite" => $request->room_type[2]
                ];

                $room_type = json_encode($rtype);
            } else {
                $rtype = [
                    $request->room_type[0] => '1'
                ];
                $room_type = json_encode($rtype);
            }

           $reservation = new Reservation();
           $reservation->first_name = $request->fname;
           $reservation->last_name = $request->lname;
           $reservation->address = $request->address;
           $reservation->zip_code = $request->zip;
           $reservation->city = $request->city;
           $reservation->state = $request->state;
           $reservation->email_address = $request->eaddress;
           $reservation->phone = $request->phone;
           $reservation->adult_count = $request->adult_count;
           $reservation->children_count = $request->childern_count;
           $reservation->check_in = Carbon::parse($request->checkindate)->format('Y-m-d');
           $reservation->check_out = Carbon::parse($request->checkoutdate)->format('Y-m-d');
           $reservation->check_in_time = $request->checkintime;
           $reservation->check_out_time = $request->checkouttime;
           $reservation->room_number = $request->room;
           $reservation->room_type = $room_type;
           $reservation->instructions = $request->instructions;
           $reservation->save();
    
           $message = [
                "status" => "200",
                "suucess" => true,
           ];

        } else {
            $message = [
                "status" => "400",
                "suucess" => false,
           ];
        }
        
        return response()->json($message);
    }

    public function lists(Request $request){
        $email = $request->header('email');
        $user = User::where('email', '=', $email)->first();
        if($user !== null){
            $reservations = Reservation::orderBy('created_at', 'DESC')->paginate(10);

            if($request->ajax())
            {
                return view('panel.table_res_data', compact('reservations'))->render();
            }
            $message = [
                "status" => "200",
                "success" => true,
                "data" => $reservations
            ];
    
            return response()->json($message);
        } else {
            $message = [
                "status" => "401",
                "success" => false,
            ];
    
            return response()->json($message);
        }
    }

    public function update(Request $request, $id){
        $email = $request->header('email');
        $user = User::where('email', '=', $email)->first();
        if ($user !== null) {
            if($request->room !== '1'){
                $rtype = [
                    "standard" => $request->room_type[0],
                    "deluxe" => $request->room_type[1],
                    "suite" => $request->room_type[2]
                ];

                $room_type = json_encode($rtype);
            } else {
                $rtype = [
                    $request->room_type[0] => '1'
                ];
                $room_type = json_encode($rtype);
            }
            $reservation = Reservation::findOrFail($id);
            $reservation->first_name = $request->fname;
            $reservation->last_name = $request->lname;
            $reservation->address = $request->address;
            $reservation->zip_code = $request->zip;
            $reservation->city = $request->city;
            $reservation->state = $request->state;
            $reservation->email_address = $request->eaddress;
            $reservation->phone = $request->phone;
            $reservation->adult_count = $request->adult_count;
            $reservation->children_count = $request->childern_count;
            $reservation->check_in = Carbon::parse($request->checkindate)->format('Y-m-d');
            $reservation->check_out = Carbon::parse($request->checkoutdate)->format('Y-m-d');
            $reservation->check_in_time = $request->checkintime;
            $reservation->check_out_time = $request->checkouttime;
            $reservation->room_number = $request->room;
            $reservation->room_type = $room_type;
            $reservation->instructions = $request->instructions;
            $reservation->save();

            $message = [
                "status" => "200",
                "success" => true,
            ];
        } else {
            $message = [
                "status" => "401",
                "success" => false,
            ];
    
        }
        return response()->json($message);

    }

    public function view_by_id(Request $request,$id){
        $email = $request->header('email');
        $reservation = Reservation::where('id', '=', $id)->first();
        $user = User::where('email', '=', $email)->first();
        if($user !== null){
            if ($reservation !== null) {
                $message = [
                    "status" => "200",
                    "success" => true,
                    "data" => $reservation
                ];
            } else {
                $message = [
                    "status" => "403",
                    "success" => false,
                ];
            }
        } else {
            $message = [
                "status" => "401",
                "success" => false,
            ];
        }
        return response()->json($message);
    }


    public function delete(Request $request,$id){
        $email = $request->header('email');
        $user = User::where('email', '=', $email)->first();
        if($user !== null){
            $reservation = Reservation::where('id', '=', $id)->first();

            if($reservation !== null){
                $reservation->delete();
    
                $message = [
                    "status" => "200",
                    "success" => true,
                    "data" => $reservation
                ];
            } else {
                $message = [
                    "status" => "403",
                    "success" => false,
                ];
            }
        } else {
            $message = [
                "status" => "401",
                "success" => false,
            ];
        }
       

        return response()->json($message);
    }
}
