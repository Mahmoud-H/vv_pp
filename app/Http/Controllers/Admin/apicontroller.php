<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVisitorRequest;
use App\Http\Requests\StoreVisitorRequest;
use App\Http\Requests\UpdateVisitorRequest;
use App\Models\Departement;
use App\Models\Governorate;
use App\Models\Visitor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

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
    
  public function  sss()
  {
      $user = Auth::user();
         $depts = Departement::all()->pluck('dept_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        
       // dd(count($user->team->governorates));
           if($user->team == null)
        {
      $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
             return view('xx', compact('governorates', 'depts'));
        }
        elseif(count($user->team->governorates) == 0)
        {
      $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
             return view('xx', compact('governorates', 'depts'));
  
        }
        else{
              // dd($user->team->governorates );
       $governorates = $user->team->governorates()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
         return view('xx', compact('governorates', 'depts'));
      
  }}
    
        public function visrsapi($ident)
         {
                    $url = 'http://eservices.mtit.gov.ps/ws/gov-services/ws/getData';
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
            $resultt = json_decode($result, true);
// access title of $book array
//dd($book['DATA'])  ;
//dd($book['DATA'][0]['ENG_NAME'])  ;
     $res = $resultt['DATA'][0]['FNAME_ARB']." ".$resultt['DATA'][0]['SNAME_ARB']." ".$resultt['DATA'][0]['TNAME_ARB']." ".$resultt['DATA'][0]['LNAME_ARB'];
            //dd($res);
              echo $res ;
            // JavaScript: The Definitive Guide

//              echo $result ;
//              echo $result[10];
//           // json_decode($result, true);
// $resultt = explode(', ', $result);
//
          //echo $resultt[0];
            
            
        }
    
        public function visitorsapi(Request $request)
       {
           $ident = $request->ident ;
        $url = 'http://eservices.mtit.gov.ps/ws/gov-services/ws/getData';
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
  $resultt = json_decode($result, true);
                 $res = $resultt['DATA'][0]['FNAME_ARB']." ".$resultt['DATA'][0]['SNAME_ARB']." ".$resultt['DATA'][0]['TNAME_ARB']." ".$resultt['DATA'][0]['LNAME_ARB'];
             echo $res ;

         //  echo $result;
         //   return  $result; 
      //  var_dump(json_decode($result, true));

       }
}
