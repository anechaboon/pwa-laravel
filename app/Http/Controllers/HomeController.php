<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function test(Request $request)
    {
        // test send request fcm send notification
        $DeviceToken = "fwQMishWMeDqQIC_COxf8X:APA91bE-uysx0MAsEdHME6LpDYdpPDRt17HfyecYkdKBNiszL1edMU7qtIwWtdIOpZ5cq-UQr19FjG3q1FXxfBkT8nXEYFvFlprbQ_p-3g3WbKcv3IiSclM5W6fGGBfBtsImSe7SptfQ";
        $message = "test send Message";
        $url = 'https://fcm.googleapis.com/fcm/send';
    
        $fields = array (
                'notification' => array(
                    "title" => "Your Title",
                    "body" => "Your Text",
                    "click_action" => "OPEN_ACTIVITY_1"
                ),
                'to' => $DeviceToken
        );
        $fields = json_encode ( $fields );
        $serverKey = "AAAA6mZK9sc:APA91bH8xkybmTQMnZRbLEWVKqE12468aiwlVU9zdwh00JtXtqSvBxc5Aab_GV7GCEXFmTKAIrBMpVpa9N_jgmpOsaEOCfKskG8exQZtdNuJLecns1VwfCs6-0jpGgV_OuyVNRqISMuB";
        $headers = array (
                'Authorization: key=' . $serverKey,
                'Content-Type: application/json'
        );
    
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
    
        $result = curl_exec ( $ch );
        echo $result;
        curl_close ( $ch );
        
    }

}
