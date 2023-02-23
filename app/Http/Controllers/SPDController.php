<?php

namespace App\Http\Controllers;
// require_once __DIR__ . '/../../vendor/league/oauth1-client/src/Credentials/Credentials.php';


use Illuminate\Http\Request;
use GuzzleHttp\Client;
use NetSuite\NetSuiteService;
use Illuminate\Support\Facades\Http;
        // use OAuth\Common\Consumer\Credentials
        // use OAuth\Common\Http\Uri\UriFactory;
        // use OAuth\OAuth1\Signature\Signature;

class SPDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Surat Perjalanan Dinas',
        ];
        return view('spd.index', $data);
    }

    public function index5() {
        $httpMethod ="GET"; 
        $projectid = "xxx";
        $taskid = "xxx";
        $script = "563";
        $accountID = '5559866-SB2';
        $realm = "5559866_SB2";
        $url = 'https://'.$accountID.'.restlets.api.netsuite.com/app/site/hosting/restlet.nl';
        $url_params = "?script=$script&deploy=1";
        $ckey = "dcd919c759330e632f4099c0bdb52a87ac92dc8ac1c59c6b352a6e24b7e458d0"; //Consumer Key
        $csecret = "a379f8395750c76451c16fdb705907858ea4b157fb294d3d94a3b7b76b38451a"; //Consumer Secret
        $tkey = "f41dd49b17111fa6e3cdd3ebb386d7a150126372b580183274f69b30c6bf8e2e"; //Token ID
        $tsecret = "8765b14788793290a489e840c4ce6e57bb1bd0592ca9cbafe7b7275b3e9267e1"; //Token Secret
        $timestamp= time();
        $nonce= uniqid(mt_rand(1, 1000));
        $baseString = $httpMethod . '&' . rawurlencode($url) . "&"
        . rawurlencode("oauth_consumer_key=" . rawurlencode($ckey)
            . "&oauth_nonce=" . rawurlencode($nonce)
            . "&oauth_signature_method=HMAC-SHA256"
            . "&oauth_timestamp=" . rawurlencode($timestamp)
            . "&oauth_token=" . rawurlencode($tkey)
            . "&oauth_version=1.0" 
            . "&script=" . rawurlencode($script) 
        );
        $key = rawurlencode($csecret) . '&' . rawurlencode($tsecret);

        $signature = rawurlencode(base64_encode(hash_hmac('sha256', $baseString, $key, true)));
        echo "signature: $signature\n\n";
        $header = array(
            "Content-Type: application/json",
            "Authorization: OAuth realm=\"$realm\", oauth_consumer_key=\"$ckey\", oauth_token=\"$tkey\", oauth_signature_method=\"HMAC-SHA256\", oauth_timestamp=\"$timestamp\", oauth_nonce=\"$nonce\", oauth_version=\"1.0\", oauth_signature=\"$signature\"",
        );

        /**
         * OAuth realm="5559866_SB2",oauth_consumer_key="dcd919c759330e632f4099c0bdb52a87ac92dc8ac1c59c6b352a6e24b7e458d0",oauth_token="f41dd49b17111fa6e3cdd3ebb386d7a150126372b580183274f69b30c6bf8e2e",oauth_signature_method="HMAC-SHA256",oauth_timestamp="1676434199",oauth_nonce="CUZl5N8k7zH",oauth_version="1.0",oauth_signature="qwFvuewVV15i%2BQ1GBPdDOQd9vBujbjT4nnPc6weU12M%3D"
         */
        // OAuth realm="5559866_SB2",oauth_consumer_key="dcd919c759330e632f4099c0bdb52a87ac92dc8ac1c59c6b352a6e24b7e458d0",oauth_token="f41dd49b17111fa6e3cdd3ebb386d7a150126372b580183274f69b30c6bf8e2e",oauth_signature_method="HMAC-SHA256",oauth_timestamp="1676434199",oauth_nonce="CUZl5N8k7zH",oauth_version="1.0",oauth_signature="qwFvuewVV15i%2BQ1GBPdDOQd9vBujbjT4nnPc6weU12M%3D"

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . $url_params,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $httpMethod,
            CURLOPT_HTTPHEADER => $header,
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        var_dump($response);
    }

    public function index2() {
         // DEVELOPMENT CREDENTIALS
        //  $NETSUITE_CONSUMER_KEY = 'dcd919c759330e632f4099c0bdb52a87ac92dc8ac1c59c6b352a6e24b7e458d0';
        //  $NETSUITE_ACCOUNT = '5559866-sb2';
        //  $NETSUITE_CONSUMER_SECRET = 'a379f8395750c76451c16fdb705907858ea4b157fb294d3d94a3b7b76b38451a';
        //  $NETSUITE_TOKEN_ID = 'f41dd49b17111fa6e3cdd3ebb386d7a150126372b580183274f69b30c6bf8e2e';
        //  $NETSUITE_TOKEN_SECRET = '8765b14788793290a489e840c4ce6e57bb1bd0592ca9cbafe7b7275b3e9267e1';

         $url = "https://5559866-sb2.restlets.api.netsuite.com/app/site/hosting/restlet.nl?script=636&deploy=1&record_type=master_item";
         $response = $this->callRestApi($url);
         echo json_encode($response);
    }

    public function callRestApi($url){

        // DEVELOPMENT CREDENTIALS
         $NETSUITE_CONSUMER_KEY = 'dcd919c759330e632f4099c0bdb52a87ac92dc8ac1c59c6b352a6e24b7e458d0';
         $NETSUITE_ACCOUNT = '5559866-sb2';
         $NETSUITE_CONSUMER_SECRET = 'a379f8395750c76451c16fdb705907858ea4b157fb294d3d94a3b7b76b38451a';
         $NETSUITE_TOKEN_ID = 'f41dd49b17111fa6e3cdd3ebb386d7a150126372b580183274f69b30c6bf8e2e';
         $NETSUITE_TOKEN_SECRET = '8765b14788793290a489e840c4ce6e57bb1bd0592ca9cbafe7b7275b3e9267e1';

  
        $oauth_nonce = md5(mt_rand());
        $oauth_timestamp = time();
        $oauth_signature_method = 'HMAC-SHA256';
        $oauth_version = "1.0";
        
        // generate Signature 
        $baseString = $this->restletBaseString("GET",
        $url,
        $NETSUITE_CONSUMER_KEY,
        $NETSUITE_TOKEN_ID,
        $oauth_nonce,
        $oauth_timestamp,
        $oauth_version,
        $oauth_signature_method,null);
        
        
        $key = rawurlencode($NETSUITE_CONSUMER_SECRET) .'&'. rawurlencode($NETSUITE_TOKEN_SECRET);
    
    
         $signature = base64_encode(hash_hmac('sha256', $baseString, $key, true)); 
         
         // GENERATE HEADER TO PASS IN CURL
         $header = 'Authorization: OAuth '
                 .'realm="' .rawurlencode($NETSUITE_ACCOUNT) .'", '
                 .'oauth_consumer_key="' .rawurlencode($NETSUITE_CONSUMER_KEY) .'", '
                 .'oauth_token="' .rawurlencode($NETSUITE_TOKEN_ID) .'", '
                 .'oauth_nonce="' .rawurlencode($oauth_nonce) .'", '
                 .'oauth_timestamp="' .rawurlencode($oauth_timestamp) .'", '
                 .'oauth_signature_method="' .rawurlencode($oauth_signature_method) .'", '
                 .'oauth_version="' .rawurlencode($oauth_version) .'", '
                 .'oauth_signature="' .rawurlencode($signature) .'"';
             
             
        return  $this->callCurl($header,$url);
    
    }

    public function callCurl($header,$url){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYHOST=>false,
        CURLOPT_SSL_VERIFYPEER=>false,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        $header,
        "content-type: application/json"
        ),
        
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $product = json_decode($response, true);
        return $product;        
    }

    public function restletBaseString($httpMethod, $url, $consumerKey, $tokenKey, $nonce, $timestamp, $version, $signatureMethod, $postParams){
        //http method must be upper case
        $baseString = strtoupper($httpMethod) .'&';
        
        //include url without parameters, schema and hostname must be lower case
        if (strpos($url, '?')){
          $baseUrl = substr($url, 0, strpos($url, '?'));
          $getParams = substr($url, strpos($url, '?') + 1);
        } else {
         $baseUrl = $url;
         $getParams = "";
        }
        $hostname = strtolower(substr($baseUrl, 0,  strpos($baseUrl, '/', 10)));
        $path = substr($baseUrl, strpos($baseUrl, '/', 10));
        $baseUrl = $hostname . $path;
        $baseString .= rawurlencode($baseUrl) .'&';
        
        //all oauth and get params. First they are decoded, next alphabetically sorted, next each key and values is encoded and finally whole parameters are encoded
        $params = array();
        $params['oauth_consumer_key'] = array($consumerKey);
        $params['oauth_token'] = array($tokenKey);
        $params['oauth_nonce'] = array($nonce);
        $params['oauth_timestamp'] = array($timestamp);
        $params['oauth_signature_method'] = array($signatureMethod);
        $params['oauth_version'] = array($version);
         
        foreach (explode('&', $getParams ."&". $postParams) as $param) {
          $parsed = explode('=', $param);
          if ($parsed[0] != "") {
            $value = isset($parsed[1]) ? urldecode($parsed[1]): "";
            if (isset($params[urldecode($parsed[0])])) {
              array_push($params[urldecode($parsed[0])], $value);
            } else {
              $params[urldecode($parsed[0])] = array($value);
            }
          }
        }
         
        //all parameters must be alphabetically sorted
        ksort($params);
         
        $paramString = "";
        foreach ($params as $key => $valueArray){
          //all values must be alphabetically sorted
          sort($valueArray);
          foreach ($valueArray as $value){
            $paramString .= rawurlencode($key) . '='. rawurlencode($value) .'&';
          }
        }
        $paramString = substr($paramString, 0, -1);
         $baseString .= rawurlencode($paramString);
        
        return $baseString;
    }

    public function index3() {
        $httpMethod ="GET"; 
        $projectid = "xxx";
        $taskid = "xxx";
        $script = "636";
        $accountID = '5559866-sb2';
        $realm = "5559866_SB2";
        $url = 'https://'.$accountID.'.restlets.api.netsuite.com/app/site/hosting/restlet.nl';
        $url_params = "?script=$script&deploy=1";
        $ckey = "dcd919c759330e632f4099c0bdb52a87ac92dc8ac1c59c6b352a6e24b7e458d0"; //Consumer Key
        $csecret = "a379f8395750c76451c16fdb705907858ea4b157fb294d3d94a3b7b76b38451a"; //Consumer Secret
        $tkey = "f41dd49b17111fa6e3cdd3ebb386d7a150126372b580183274f69b30c6bf8e2e"; //Token ID
        $tsecret = "8765b14788793290a489e840c4ce6e57bb1bd0592ca9cbafe7b7275b3e9267e1"; //Token Secret

        // URL endpoint API
        $url = "https://".$accountID.".restlets.api.netsuite.com/app/site/hosting/restlet.nl?script=".$script."&deploy=1&record_type=master_item";

        // Method HTTP yang digunakan
        $method = "GET";

        // Inisialisasi cURL
        $ch = curl_init();

        // Tambahkan header autentikasi ke permintaan
        $headers = array(
            'Authorization: OAuth realm='.$realm.',oauth_consumer_key='.$ckey.',oauth_token='.$tkey.',oauth_signature_method="HMAC-SHA256",oauth_timestamp="1676522288",oauth_nonce="r5x15DLC9TH",oauth_version="1.0",oauth_signature="bDUhfrmYFSb6GjDRObIynxVSNr%2Fwkdq6eVNxe1RWMBM%3D"',
            'Content-Type: application/json'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Set URL endpoint dan method HTTP yang digunakan
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        // Eksekusi permintaan
        $result = curl_exec($ch);

        // Tutup koneksi cURL
        curl_close($ch);

        // Cetak hasil permintaan
        echo $result;
    }

    public function index4() {

        $httpMethod ="GET"; 
        $projectid = "xxx";
        $taskid = "xxx";
        $script = "636";
        $accountID = '5559866-sb2';
        $realm = "5559866_SB2";
        // Kredensial OAuth
        $consumerKey = 'dcd919c759330e632f4099c0bdb52a87ac92dc8ac1c59c6b352a6e24b7e458d0';
        $consumerSecret = 'a379f8395750c76451c16fdb705907858ea4b157fb294d3d94a3b7b76b38451a';
        $accessToken = 'f41dd49b17111fa6e3cdd3ebb386d7a150126372b580183274f69b30c6bf8e2e';
        $accessTokenSecret = '8765b14788793290a489e840c4ce6e57bb1bd0592ca9cbafe7b7275b3e9267e1';

        // URL endpoint API
        $url = 'https://'.$accountID.'.restlets.api.netsuite.com/app/site/hosting/restlet.nl?script='.$script.'&deploy=1&record_type=master_item';

        // Tanggal sekarang dalam format GMT
        $timestamp = time();

        // Generate nonce secara acak
        $nonce = md5(microtime() . mt_rand());

        
        // Tandatangani permintaan
        $signatureMethod = 'HMAC-SHA256';
        $signatureKey = rawurlencode($consumerSecret) . '&' . rawurlencode($accessTokenSecret);
        $signatureParams = array(
            'oauth_consumer_key' => $consumerKey,
            'oauth_nonce' => $nonce,
            'oauth_signature_method' => $signatureMethod,
            'oauth_timestamp' => $timestamp,
            'oauth_token' => $accessToken,
            'oauth_version' => '1.0',
        );
        ksort($signatureParams);
        $signatureParamsString = http_build_query($signatureParams, '', '&', PHP_QUERY_RFC3986);
        $signatureBaseString = strtoupper('GET') . '&' . rawurlencode($url) . '&' . rawurlencode($signatureParamsString);
        $signature = base64_encode(hash_hmac('sha256', $signatureBaseString, $signatureKey, true));

        // Tambahkan header OAuth ke permintaan
        $oauthHeaderParams = array(
            'oauth_consumer_key="' . $consumerKey . '"',
            'oauth_token="' . $accessToken . '"',
            'oauth_signature_method="' . $signatureMethod . '"',
            'oauth_timestamp="' . $timestamp . '"',
            'oauth_nonce="' . $nonce . '"',
            'oauth_version="1.0"',
            'oauth_signature="' . rawurlencode($signature) . '"'
        );
        $oauthHeader = 'Authorization: OAuth ' . implode(', ', $oauthHeaderParams);
        // $header = array(
        //     "Content-Type: application/json",
        //     "Authorization: OAuth realm=\"$realm\", oauth_consumer_key=\"$ckey\", oauth_token=\"$tkey\", oauth_signature_method=\"HMAC-SHA256\", oauth_timestamp=\"$timestamp\", oauth_nonce=\"$nonce\", oauth_version=\"1.0\", oauth_signature=\"$signature\"",
        // );
        // Inisialisasi koneksi cURL
        $ch = curl_init();

        // Set URL endpoint dan header permintaan
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array($oauthHeader));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Eksekusi permintaan
        $response = curl_exec($ch);

        // Tutup koneksi cURL
        curl_close($ch);

        // Cetak hasil permintaan
        echo $response;
    }

    public function index6() {
        // set up the OAuth credentials
        $credentials = new Credentials(
            'dcd919c759330e632f4099c0bdb52a87ac92dc8ac1c59c6b352a6e24b7e458d0',
            'a379f8395750c76451c16fdb705907858ea4b157fb294d3d94a3b7b76b38451a',
            'f41dd49b17111fa6e3cdd3ebb386d7a150126372b580183274f69b30c6bf8e2e',
            '8765b14788793290a489e840c4ce6e57bb1bd0592ca9cbafe7b7275b3e9267e1'
        );

        // set up the signature method
        $signature = new Signature($credentials);

        // set up the URI factory
        $uriFactory = new UriFactory();

        // set up the request URI
        $url = 'https://5559866-sb2.restlets.api.netsuite.com/app/site/hosting/restlet.nl?script=563&deploy=1';
        $uri = $uriFactory->createFromAbsolute($url);

        // set up the request parameters
        $params = [
            'record_type' => 'master_item',
            // 'param2' => 'value2',
            // add more parameters as needed
        ];

        // sign the request using OAuth 1.0
        $signedRequest = $signature->signRequest('GET', $uri, $params);

        // send the signed request
        $response = Http::withHeaders([
            'Authorization' => $signedRequest->toHeader(),
        ])->get($url, $params);

        // get the response body
        $body = $response->body();

        // do something with the response
        // e.g. parse the JSON body
        $data = json_decode($body, true);
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
