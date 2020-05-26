<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;

class SunabarController extends Controller
{

    // 振込依頼のAPIを叩きます
    public function post($amount)
    {
        $url = 'https://api.sunabar.gmo-aozora.com/personal/v1/transfer/request';
        // 送金元データ
        $token = 'add your token';
        $accountId = '301010000864';
        
        // 送金先データ
        // 口座番号
        $accountNumber ='0000857';
        // 支店番号
        $beneficiaryBranchCode = '301';
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
                'beneficiaryName' => 'ｶ)ｱｵｿﾞﾗｻﾝ' 
            ]
        ];
            
        $postfields = [
            'accountId' => $accountId,
            'remitterName' => 'ｱｵｿﾞﾗ ﾃｽﾄ',
            'transferDesignatedDate' => date("Y-m-t"),
            'transferDateHolidayCode' => '1',
            'totalCount' => '1',
            'totalAmount' => $amount,
            'transfers' => $transfer
        ];

        // データの整形
        $temp = json_encode($postfields, JSON_UNESCAPED_UNICODE);
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
            CURLOPT_POSTFIELDS => $temp,
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json;charset=UTF-8",
                "Content-Type: application/json",
                $accessToken
                )
          ));
          
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     echo $response;
        // }
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
}
