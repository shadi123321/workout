<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
    $validator=Validator::make($request->all(),
        [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    if ( $validator->fails())
    {
        return response()->json(['status'=>422,'errors'=>$validator->messages()],422);
    }
$user=User::create([
'gender_id'=>1,
'goal_id'=>1,
    'name'=> $request->name,
    'email'=> $request->email,
    'password'=> Hash::make($request->password),
]);
$token=$user->createToken('shadi')->plainTextToken;
$response=[
    'user'=>$user,
'token'=>$token,
];
return response($response,201);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response(['message'=>'out successfully' ],200);
    }
    public function login(Request $request )
    {
        $data=$request->validate([
            'email' => 'required|email',
            'password'=>'required',
            ]);
            $user=User::where('email',$data['email'])->first();
if(!$user||!Hash::check($data['password'],$user->password))
return response(['message'=>'Invalid'],401);
else
{
    $token=$user->createToken('shadi login')->plainTextToken;
return response()->json(['user'=>$user,'token'=>$token,'message'=>'done']);
}
    }



}
