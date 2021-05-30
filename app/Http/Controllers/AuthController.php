<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Validator;
use App\AdminNotification;
use App\UserNotification;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Verified;
use App\Jobs\WelcomeEmailJob;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validator =  Validator::make($request->all(),[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'user_type' => 'required',
            'mobile_no' => 'required',
            'address' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                "status"=>422,
                "message" => $validator->errors(),
            ], 422);
        } 
        
        $checkEmailExist = User::where('email',$request->email)->exists();
        if($checkEmailExist === true){
            return response()->json([
                "status"=>409,
                "message" => 'User with this email already exist'
            ], 409);
        }

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => $request->user_type,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
        ]);
        
        if($user){
            event(new Registered($user));
            $token = $user->createToken('PetApp')->accessToken;
            $url = url("/api/admin/get_user/{$user->id}");

            $notification = new AdminNotification;
            $notification->user_id = $user->id;
            $notification->text = $user->firstname . ' as a user has joined';
            $notification->url = $url;
            $notification->seen = 'No';
            $notification->type = 'register';
            $notification->save();

            return response()->json(['status'=>200, 'message'=>'User registered successfully','token' => $token], 200);
        }else{
            return response()->json(['status'=>500, 'message' => 'something went wromg'], 500);
        }
    }

    public function login(Request $request)
    {
        $validator =  Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                "status"=>422,
                "message" => $validator->errors(),
            ], 422);
        }   
        
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (auth()->attempt($data)) {
            if(auth()->user()->email_verified_at == NULL){
                return response()->json(['status'=>401, 'message'=>'Please Verify Email', 'status'=>401],401);
            }
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token,'status'=>200], 200);
        } else {
            return response()->json(['message' => 'email and password does not match', 'status'=>404], 404);
        }
    }

    public function verify(Request $request): RedirectResponse
    {
        $user = User::find($request->route('id'));
        if ($user->hasVerifiedEmail()) {
            return redirect(env('FRONT_URL') . '/email/verify/already-success');
        }
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        WelcomeEmailJob::dispatch($user);

        return redirect(env('FRONT_URL') . '/email/verify/success');
    }

    public function logout(Request $request)
    {
       $logout = $request->user()->token()->revoke(); 
       if($logout){       
        return response()->json(['status'=>1, 'message' => 'Successfully logged out'],200);
       }else{
        return response()->json(['status'=>0, 'message' => 'Something Went wrong'],500); 
       }
    }
}
