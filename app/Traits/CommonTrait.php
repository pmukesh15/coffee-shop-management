<?php
  
namespace App\Traits;
  
use Illuminate\Http\Request;
use \GuzzleHttp\Client;
  
trait CommonTrait {
  
    /**
     * @param Request $request
     * @return $this|false|string
     */
    //calling api
    public function ApiCall($route,$params,$responseType){
        $client = new Client([
            "headers"=>["content-type"=>"application/json","accept"=>"application/json"],
        ]);
        $url      = url('/');
        $response = $client->request('GET', $url.$route, [
                        'json' => $params
                    ]);
        if($responseType=="object"){
            $result    = json_decode($response->getBody());
        }
        else{
            $result    = json_decode($response->getBody(),true);
        }
        return  $result;
    }
  
}