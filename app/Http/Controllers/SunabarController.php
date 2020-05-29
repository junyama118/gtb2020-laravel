<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TransferRequest;

use App\User;
use App\Transfer;
use App\Account;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;

class SunabarController extends Controller
{

    // 振込依頼のAPIを叩きます
    public function post(Request $request)
    {
        $url = 'https://api.sunabar.gmo-aozora.com/personal/v1/transfer/request';

        // postされた値を受け取る
        $amount = $request->input('amount');
        $comment = $request->input('comment');
        $distUser_id = $request->input('distUser_id');

        $srcUser_id = Auth::id();

        // 送金履歴の保存
        Transfer::create([
            'srcUser_id' => $srcUser_id,
            'distUser_id' => $distUser_id,
            'amount'=> $amount,
            'comment' => $comment,
            'ogoriFlag' => '1',
        ]);
        
        // DBからsrcのデータ抽出
        $srcQuery = Account::query();
        $srcQuery->where('user_id', $srcUser_id);
        $srcTemp = $srcQuery -> get();

        // DBからdistのデータ抽出
        $distQuery = Account::query();
        $distQuery->where('user_id', $distUser_id);
        $distTemp = $distQuery -> get();

        if (isset($srcTemp) || isset($distTemp)) {
            echo "相手が口座情報登録してないよ：登録させてね";
            // ページ遷移、多分こんな感じ
            return view('layouts/contact');
        }

        // 抽出したデータから使うものをさらに抽出
        $srcData = $srcTemp[0];

        $token = $srcData['token'];
        $accountId = $srcData['account_id'];

        $distData = $distTemp[0];
        // echo $distData;
        
        // 口座番号
        $accountNumber = $distData['accountNumber'];
        // 支店番号
        $beneficiaryBranchCode = $distData['beneficiaryBranckCode'];
        // 金融機関番号、あおぞらは0310
        $beneficiaryBankCode = '0310';

        // 送金先口座データ
        $transfer = [
            [
                'itemId' => '1',
                'transferAmount' => $amount,
                'beneficiaryBankCode' => $beneficiaryBankCode,
                'beneficiaryBranchCode' => $beneficiaryBranchCode,
                'accountTypeCode' => '1',
                'accountNumber' => $accountNumber,
                'beneficiaryName' => 'ｶ)ｱｵｿﾞﾗｻﾝ' //直したい
            ]
        ];
            
        $postfields = [
            'accountId' => $accountId,
            'remitterName' => 'ｱｵｿﾞﾗ ﾃｽﾄ', //直したい
            'transferDesignatedDate' => date("Y-m-t"),
            'transferDateHolidayCode' => '1',
            'totalCount' => '1',
            'totalAmount' => $amount,
            'transfers' => $transfer
        ];

        // データの整形
        $encode = json_encode($postfields, JSON_UNESCAPED_UNICODE);
        $accessToken = "x-access-token:" . $token;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.sunabar.gmo-aozora.com/personal/v1/transfer/request",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $encode,
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json;charset=UTF-8",
                "Content-Type: application/json",
                $accessToken
                )
          ));
          
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        $user = User::findOrFail($distUser_id);
        $name = $user['name'];

        if ($err) {
            echo "cURL Error #:" . $err;
            // ページ遷移、多分こんな感じ
            return view('layouts/contact');
        } else {
            
            // echo $response;
            return view('layouts/soukin_finish', compact('name'));
        }
    }    

    /**
     */
    // base_urlとuri分けていい感じにしたい
    public function get()
    {

        $base_url = ' https://api.sunabar.gmo-aozora.com/personal/v1/';
        $client = new \GuzzleHttp\Client([
            'base_uri' => $base_url,
            //\GuzzleHttp\RequestOptions::VERIFY => false
        ]);
        $method = 'GET';
        $uri = 'accounts/balances';
        $response_url = $base_url . $uri;
        echo $response_url;
        $token = 'add your token';
        $response = $client->request($method, 'https://api.sunabar.gmo-aozora.com/personal/v1/accounts' ,[
            'headers' => [
                'Accept' => 'application/json',
                'x-access-token' => $token
            ]
        ]);
        $response_body = (string) $response->getBody();
        // echo $response_body;
        // echo $response->getStatusCode();
    }

    public function return(Request $request)
    {
        $amount = $request->input('amount');
        $id = $request->input('id');

        $user = User::findOrFail($id);
        $name = $user['name'];

        return view('layouts/soukin_comment', compact('name', 'amount', 'id'));
    }

    // test
    public function show()
    {

        $temp = Transfer::findOrFail(2);
        $amount = $temp["amount"];
        // echo "hello";
        // echo $temp;
        // echo $amount;
        return view('layouts/contact');
    }

    public function test(TransferRequest $request)
    {
        $transfer = Transfer::create([
            'srcUser_id' => $request -> input('srcUser_id'),
            'distUser_id' => $request -> input('distUser_id'),
            'amount'=> $request -> input('amount') ,
            'comment' => $request -> input('comment'),
        ]);
        return response()->json($transfer, 201);

    }
}
