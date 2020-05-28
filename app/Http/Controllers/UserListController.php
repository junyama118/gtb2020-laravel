<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use App\Transfer;

use \GuzzleHttp\Client;

class UserListController extends Controller
{
    //
    public function get_userlist(){

        // flagチェック
        // if(flgaが上がっている)->おごられましたページへ！
        $id = Auth::id();
        
        $temp = Transfer::where('distUser_id', $id)
        ->where('ogoriFlag', '1') -> get();

        try{
            $flag = $temp[0]['ogoriFlag'];
            // flag下げる
            $data = Transfer::where('distUser_id', $id)
                ->where('ogoriFlag', '1')->update(['ogoriFlag' => '0']);
            $comment = $temp[0]['comment'];
            $srcUser = User::findOrFail($temp[0]['srcUser_id']);
            $name = $srcUser['name'];

            return view('', compact('name', 'comment')); 
        }
        catch ( \Exception $ex){
            $users = User::all();
            return view('list')->with('users',$users);
        }
    }

    public function create(Request $request)
    {
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
        // var_dump($obj->accounts[0]->accountId);

        Account::create([
            'user_id' => Auth::id(),
            'token' => $request -> input('token'),
            'account_id'=> $obj->accounts[0]->accountId,
            'accountNumber' => $request -> input('accountNumber'),
            'beneficiaryBranckCode'=>$request -> input('BranckCode'),
        ]);

        return redirect('/users');
    }

    public function postUserID(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        return view('layouts/soukin_input', compact('id', 'name'));
    }
    
}
