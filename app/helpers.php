<?php 
use Illuminate\Support\Facades\Auth;
use App\Models\Common;

if(!function_exists('user')){
    function user(){
        $user = Auth::user();
        return $user;
    }
}

if(!function_exists('user_info')){
    function user_info($id){
        $data = DB::table('users')->where('id','=',$id)->first();
        return $data;
    }
}

if(!function_exists('single_user_id')){
    function single_user_id($user_id,$table){
        $data = DB::table($table)->where('user_id','=',$user_id)->first();
        return $data;
    }
}
