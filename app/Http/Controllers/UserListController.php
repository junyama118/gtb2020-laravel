<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Account;

use \GuzzleHttp\Client;

class UserListController extends Controller
{
    //
    public function get_userlist(){
        $users = User::all();
        return view('list')->with('users',$users);
    }

    public function create(Request $request){
        {
            // inputaccountinfoのPOSTの修正]
            // 入力の確認
            // API叩いてaccount_idの取得
            
            // やること
            // Authで本人のid確認
            
            // echo $request -> input('token');
            // echo $request -> input('branckCode');
            // echo $request -> input('accountNumber');

            // get accountId
            $base_url = ' https://api.sunabar.gmo-aozora.com/personal/v1/accounts';
            $client = new \GuzzleHttp\Client([
                'base_uri' => $base_url,
                //\GuzzleHttp\RequestOptions::VERIFY => false
            ]);
            $method = 'GET';
            $uri = 'accounts';
            $response_url = $base_url . $uri;
            // echo $response_url;
            $token = $request -> input('token');
            $response = $client->request($method, 'https://api.sunabar.gmo-aozora.com/personal/v1/accounts' ,[
                'headers' => [
                    'Accept' => 'application/json',
                    'x-access-token' => $token
                ]
            ]);
            $response_body = $response->getBody();
            // objectに変換
            $obj = json_decode($response_body);
            var_dump($obj->accounts[0]->accountId);

            
            // dd($response_body);

            return;

            $transfer = Account::create([
                'srcUser_id' => $request -> input('srcUser_id'),
                'distUser_id' => $request -> input('distUser_id'),
                'amount'=> $request -> input('amount') ,
                'comment' => $request -> input('comment'),
            ]);

            return response()->json($transfer, 201);
        }
    }
}
