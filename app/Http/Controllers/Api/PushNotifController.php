<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PushNotifController extends Controller {
    public function pushNotif(Request $requset) {

        $mData = [
            'title' => $requset->title,
            'body' => $requset->message
        ];

        $fcm[] = "eD1pxzSYTe-5mffF1N4E8L:APA91bGRwDueJcNupg7S2yBevBjILkolN_LNthANR3-1OE5Y7TdekvBTw1U6o1tHH5kQyXa5MRwH31iuxmdkKUkQHtzFURAOhhseUBwVya4-XjqLQ6XZgdeo8j34rJEXvntQhkJIh_Nf";

        $payload = [
            'registration_ids' => $fcm,
            'notification' => $mData
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Content-type: application/json",
                "Authorization: key=AAAAcv1o4p8:APA91bGntzKph5P-OQXUvLqBnn3simMe7fW5B-vmki1HsFHOGAD2pu4ZQYKuaJzawAHqmSwWGeO_g3Abin_tWrYSOPShbByNlZ7-YwGk4JZC2oXXTIBWVbdwtNRTMKk6gA1IAXccoY8B"
            ),
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = [
            'success' => 1,
            'message' => "Push notif success",
            'data' => $mData,
            'firebase_response' => json_decode($response)
        ];
        return $data;
    }
}
