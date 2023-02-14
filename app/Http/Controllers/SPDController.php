<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use NetSuite\NetSuiteService;


class SPDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        define("NETSUITE_URL", 'https://5559866-sb2.restlets.api.netsuite.com/app/site/hosting/restlet.nl');
        define("NETSUITE_SCRIPT_ID", '563');
        define("NETSUITE_DEPLOY_ID", '1');
        define("NETSUITE_ACCOUNT", '5559866_SB2');
        define("NETSUITE_CONSUMER_KEY", 'dcd919c759330e632f4099c0bdb52a87ac92dc8ac1c59c6b352a6e24b7e458d0');
        define("NETSUITE_CONSUMER_SECRET", 'a379f8395750c76451c16fdb705907858ea4b157fb294d3d94a3b7b76b38451a');
        define("NETSUITE_TOKEN_ID", 'f41dd49b17111fa6e3cdd3ebb386d7a150126372b580183274f69b30c6bf8e2e');
        define("NETSUITE_TOKEN_SECRET", '8765b14788793290a489e840c4ce6e57bb1bd0592ca9cbafe7b7275b3e9267e1');

        $details = array(
            'status' => 'Testing'
        );

        sendOrderToNS($details);
    }

    function sendOrderToNS($details)
    {
        $data_string = json_encode($details);

        $oauth_nonce = md5(mt_rand());
        $oauth_timestamp = time();
        $oauth_signature_method = 'HMAC-SHA1';
        $oauth_version = "1.0";

        $base_string = "POST&" . urlencode(NETSUITE_URL) . "&" . urlencode("deploy=" . NETSUITE_DEPLOY_ID . "&oauth_consumer_key=" . NETSUITE_CONSUMER_KEY . "&oauth_nonce=" . $oauth_nonce . "&oauth_signature_method=" . $oauth_signature_method . "&oauth_timestamp=" . $oauth_timestamp . "&oauth_token=" . NETSUITE_TOKEN_ID . "&oauth_version=" . $oauth_version . "&realm=" . NETSUITE_ACCOUNT . "&script=" . NETSUITE_SCRIPT_ID);
        $sig_string = urlencode(NETSUITE_CONSUMER_SECRET) . '&' . urlencode(NETSUITE_TOKEN_SECRET);
        $signature = base64_encode(hash_hmac("sha1", $base_string, $sig_string, true));

        $auth_header = "OAuth " . 'oauth_signature="' . rawurlencode($signature) . '", ' . 'oauth_version="' . rawurlencode($oauth_version) . '", ' . 'oauth_nonce="' . rawurlencode($oauth_nonce) . '", ' . 'oauth_signature_method="' . rawurlencode($oauth_signature_method) . '", ' . 'oauth_consumer_key="' . rawurlencode(NETSUITE_CONSUMER_KEY) . '", ' . 'oauth_token="' . rawurlencode(NETSUITE_TOKEN_ID) . '", ' . 'oauth_timestamp="' . rawurlencode($oauth_timestamp) . '", ' . 'realm="' . rawurlencode(NETSUITE_ACCOUNT) . '"';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, NETSUITE_URL . '?&script=' . NETSUITE_SCRIPT_ID . '&deploy=' . NETSUITE_DEPLOY_ID);
        curl_setopt($ch, CURLOPT_POST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: ' . $auth_header, 'Content-Type: application/json', 'Content-Length: ' . strlen($data_string) ]);

        $content = curl_exec($ch);
        print_r($content);
        curl_close($ch);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
