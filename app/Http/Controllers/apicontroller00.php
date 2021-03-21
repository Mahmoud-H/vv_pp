<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apicontroller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
        public function visitorsapi($ident)
       {
        $url = 'http://eservices.mtit.gov.ps/ws/gov-services/ws/getData';
//$data = array('key1' => 'value1', 'key2' => 'value2');
           // $ident = 400271524;
$data = '{
"WB_USER_NAME_IN":"MNE",
"WB_USER_PASS_IN":"1GT619A72669856214752DDB80DD87E9",
"DATA_IN": {
"package":"MOI_GENERAL_PKG",
"procedure":"CITZN_INFO",
"ID": '.$ident.'
}
}';

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => $data
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

//var_dump($result);
            echo $result;
//            $array = explode(' ', $result);
//
// echo  $array[0]    ;
           
        
       }
}
