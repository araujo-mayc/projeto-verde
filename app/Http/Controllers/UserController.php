<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getSellerInfo($id)
    {
        $user = User::findOrFail($id);
    
        $sellerInfo = User::where('id', $id)
            ->select(['name', 'average_rating', 'rating_count', 'email_verified_at', 'phone_verified_at', 'created_at'])
            ->first();
    
        if ($sellerInfo) {
            $sellerInfo->email_verified = !is_null($sellerInfo->email_verified_at);
            $sellerInfo->phone_verified = !is_null($sellerInfo->phone_verified_at);
    
            unset($sellerInfo->email_verified_at, $sellerInfo->phone_verified_at);
    
            $session = DB::table('sessions')->where('user_id', $id)->first();
            $lastActivity = $session->last_activity;
            $sellerInfo->last_activity = $lastActivity;
        }
    
    
        return $sellerInfo;
    }
}
