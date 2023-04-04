<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;
use App\Models\SmsQeue;
class SmsApiController extends Controller
{
    //
    function smssend(){
        $sms = DB::table('SMS_QUEUE')
        ->select('ID', 'IN_DATE', 'OUT_DATE', 'MOBILE_NO', 'SMS_TEXT', 'STATUS', 'RESPONSE', 'MODULE', 'CODE', 'TRACKING_NO')
        ->where('STATUS','=','SENT')
        ->orderBy('ID', 'DESC')
        ->get();
 
        return view('smsapi',['smssent'=>$sms]);
    }

    function smsqeueapi(){
        $sms = DB::table('SMS_QUEUE')
        ->select('ID', 'IN_DATE', 'OUT_DATE', 'MOBILE_NO', 'SMS_TEXT', 'STATUS', 'RESPONSE', 'MODULE', 'CODE', 'TRACKING_NO')
        ->where('STATUS','=','PENDING')
        ->get()
        ->first();
    

       // $mynames = collect([$sms->mobile_no??]);

      //  $apiURL = 'http://66.45.237.70/api.php?';
        $apiURL = 'http://login.bulksmsbd.com/maskingapi.php?';

     
        $postInput = [
            'username'=>'01985702804',
            'password'=>'Four1234',
            'number' =>optional($sms)->mobile_no,
            'message'=>optional($sms)->sms_text,
            'senderid'=>'FOURDESIGN'
            
            
         
        ];

     if (count((array)optional($sms)->mobile_no)==1) {
       //$response = Http::get($apiURL, $postInput);
       $response = Http::get('http://login.bulksmsbd.com/maskingapi.php?username=01985702804&password=Four1234&number='.optional($sms)->mobile_no.'&&message='.optional($sms)->sms_text.'&senderid=FOURDESIGN');
      

        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
      
//echo optional($sms)->mobile_no;

     //   dd($responseBody); // body response

if(substr($response ,0,4)==1101){

    try {

        $smsqeue = new SmsQeue;

        $smsqeue = SmsQeue::find($sms->id);
        $smsqeue->status='SENT';
        $smsqeue->out_date=date('Y-m-d H:i:s');
        $smsqeue->code=substr($response ,0,4);
        $smsqeue->response=''.$response;

     //   $input = $request->all();

        $smsqeue -> save();

     //  echo 'Sent Code :  '.$statusCode;
     return redirect('sms')->with('status',"SMS SENT Successfully");

}catch(Exception $e){

    return redirect('sms')->with('eror',"SMS SENT UnSuccessfull  Response COde =   ".$response);

}
    
}else{


    return redirect('sms')->with('eror',"SMS SENT UnSuccessfull  Response COde =   ".$response);

}
       
     } else {
         echo 'Sms Not Sned';
        return redirect('sms')->with('noque',"No Pending Sms");;
     }
      


    }
    }




