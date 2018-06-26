<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\Page;
use Mail, Session;
class ContactController extends Controller
{
   public function email_form (Request $request) {
		  $name =  $request->input('name');
          $email=  $request->input('email');

    //   Mail::send('frontend/mail_content', $data, function ($message)use ($to_email, $name) {
		Mail::send('frontend.mail_content', [
			'client_name' => $request->input('name'),
			'email'       => $request->input('email'),
			'phone'       => $request->input('phone'),
			'resource'    => $request->input('resource'),
			'content'     => $request->input('message')],
		function($message) use ($name, $email){ 

			$message->from('papvbiotech@gmail.com', '泛亞太谷生物科技');
			$message->to('papvbiotech@gmail.com', '泛亞太谷生物科技')->subject('【泛亞太谷生物科技】您有一封來自'.$name.'的聯絡訊息');    
		});
		Mail::send('frontend.mail_to_sender', [
		  'client_name' => $request->input('name'),
          'email'       => $request->input('email'),
          'phone'       => $request->input('phone'),
          'resource'    => $request->input('resource'),
		  'content'     => $request->input('message')],
	 	function($message) use ($name, $email){ 

          $message->from('papvbiotech@gmail.com', '泛亞太谷生物科技');
          $message->to($email, $name)->subject('【泛亞太谷生物科技】您剛剛送出了一封聯絡訊息');    
        });	
		Session::flash('message', '感謝您留下聯絡訊息，我們會盡快與您聯繫');
		return redirect()->route('contact_us');

	}
	
}
