<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

use App\Http\Requests\ForgetRequest;
use DB;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\ForgetMail;

class ForgetController extends Controller
{
    public function Forget(ForgetRequest $request){

        $email = $request->email;

        if(User::where('email', $email)->doesntExist()){
            return response([
                'message'   => 'Invalid Email',
            ],401);
        }
        $token = rand(10,1000000);

        try{

            DB::table('password_resets')->insert([

                'email' => $email,
                'token' => $token,
            ],200);

            Mail::to($email)->send(new ForgetMail($token));

            return response([

                'message'   => 'Password Reset Link Has Been Sent to Your Eamil',
            ],200);
        }
        catch(Exception $exception){
            return response([
                'message'   => $exception->getMessage(),
            ],400);
        }

    } //end
}
