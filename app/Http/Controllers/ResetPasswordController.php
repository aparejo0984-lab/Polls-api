<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Notifications\ResetPasswordNotification;

class ResetPasswordController extends Controller
{
    public function send(Request $request)
    {
        try{
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found'
                ], 200);
            }

            //generate random password
            $random_password = uniqid();
            $user->update(['password' => Hash::make($random_password)]);

            $data = [
                'email' => $user->email,
                'name' => $user->name,
                'password' => $random_password
            ];

            $user->notify(new ResetPasswordNotification($data));

            return response()->json([
                'status' => true,
                'message' => 'Check you email for the temporary password'
            ], 200);

        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }

    }
}
