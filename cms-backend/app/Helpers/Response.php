<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Response as Resp;

class Response {
	public static $TYPE = 'JSON';
	
	public static function Success($msg='Operation Successfull', $data=null){
		return Resp::json([
			'success'	=>	true, 
			'data'		=> 	$data,
			'msg'		=> 	$msg
		], 200);
	}

	public static function ValidationError($errors){
		$firstError = $errors->first();
		$errors = $errors->toArray();
		$errors['msg'] = $firstError;
		
		return Resp::json([
			'success'	=>	false, 
			'errors' 	=> 	$errors,
        ],422);
	}

	public static function SimpleError($msg,$key_="general"){
        $errors= $msg;
        return Resp::json([
           'success'=>false,
           'errors'=>$errors
        ],401);
    }

	public static function returnWithError($error, $path=null){
		$errors = new \Illuminate\Support\MessageBag;
		$errors->add('field_name', $error);
		if($path == null)
			return back()->withErrors($error);
		else 
			return redirect($path)->withErrors($error);
	}

	public static function returnWithErrors($error, $path=null){
		$errors = new \Illuminate\Support\MessageBag;
		$errors->add('field_name', $error);
		if($path == null)
			return back()->withErrors($error);
		else 
			return redirect($path)->withErrors($error);
	}
}