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
use Carbon\Carbon;
use App\Models\Office;
use App\Models\DepositType;
use App\Models\User;
class VisitorsController extends Controller
{
    
    
    public function visitorsapi()
       {
//        $url = 'http://eservices.mtit.gov.ps/ws/gov-services/ws/getData';
////$data = array('key1' => 'value1', 'key2' => 'value2');
//$data = '{
//"WB_USER_NAME_IN":"MNE",
//"WB_USER_PASS_IN":"1GT619A72669856214752DDB80DD87E9",
//"DATA_IN": {
//"package":"MOI_GENERAL_PKG",
//"procedure":"CITZN_INFO",
//"ID":400271524
//}
//}';
//
//// use key 'http' even if you send the request to https://...
//$options = array(
//    'http' => array(
//        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
//        'method'  => 'POST',
//        'content' => $data
//    )
//);
//$context  = stream_context_create($options);
//$result = file_get_contents($url, false, $context);
//if ($result === FALSE) { /* Handle error */ }
//
//var_dump($result);

        
       }
    
            public function search(Request $request)
    {
        // dd($request->all());
//                echo $request->in_date_time;
//                echo "<br>";
//                echo $request->in_date_time_to;
//                echo "<br>"; 
//
//              echo date("Y-d-m\TH:i", strtotime($request->in_date_time));
            //  echo date("Y-d-m h:i:s", strtotime($request->in_date_time));
//               // $newDate = date("Y-d-m h:i:s", strtotime($request->in_date_time));
//                  //echo $newDate;
//      // echo Carbon::createFromFormat('Y-m-d H', $request->in_date_time)->toDateTimeString();
              //  die();
       if($request->visitor_id_num==""&$request->in_date_time==""&$request->in_date_time_to==""&$request->out_date_time==""&$request->out_date_time_to==""&$request->governorate_id==""&$request->office_id=="")
       {
                 // $visitors = Visitor::all();
            $user = Auth::user();
//                foreach($user->team->offices as $team)
//        {
//            $office_id = $team->pivot->office_id;
//        }
//   // echo $office_id;
//       $visitors =  Visitor::where('office_id', $office_id)->get();

      //  $user = Auth::user();
        
        
//                if($user->team == null)
//        {
//      $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
//      $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
//             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
//        }
//        elseif(count($user->team->offices) == 0)
//        {
//       $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
//      $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
//             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
//  
//        }
//        else{
//              // dd($user->team->governorates );
//         $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
//       $governorates = $user->team->governorates()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
//         return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
//
//              
//        } 
           
               $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
           
                   foreach($user->roles as $r)
        {
            $title_role = $r->title;
        }
        
        if($title_role == "Manager")
        {
           // dd("qq");
                  //  $visitors = Visitor::all();
                    $visitors = Visitor::paginate(10);
    //  $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
      $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');

            return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
            //  return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));

        }
  
                if($user->team == null)
        {
          //  dd("dd");
                  // $visitors = Visitor::all();
                      $visitors = Visitor::paginate(10);
    //  $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
      $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
//dd($visitors);
             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
             //  return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));
            // return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));
        }
        elseif(count($user->team->offices) == 0)
        {
           // $visitors = Visitor::all();
             $visitors = Visitor::paginate(10);
   //   $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
     $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
               return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
           //  return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));
  
        }
        else{
            
                            foreach($user->team->offices as $team)
        {
            $office_id = $team->pivot->office_id;
        }
   // echo $office_id;
      //   $visitors =  Visitor::where('office_id', $office_id)->get();
           $visitors =  Visitor::where('office_id', $office_id)->paginate(10);

              // dd($user->team->governorates );
//       $governorates = $user->team->governorates()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
   $offices = $user->team->offices()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');

           return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
       //  return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));

              
        }
           
           
       }
            
        else{
//         $date_form = $request->date_from;
//$date_to = $request->date_to;
//
// $case_ref_code = $request->case_ref_code;
// $dept_id = $request->dept_id;
//$status_id = $request->status_id;
//$staff_id = $request->staff_id;
//$case_type_id = $request->case_type_id;
//$case_name = $request->case_name;
//            echo $request->in_date_time."<br>".$request->in_date_time_to."<br>";
//            echo $request->out_date_time."<br>".$request->out_date_time_to."<br>";
//            die();
    $visitors = Visitor::

when($request->visitor_id_num, function($query) use ($request){
    $query->where('visitor_id_num', '=', $request->visitor_id_num);
})
//->when($request->in_date_time, function($query) use ($request){
//    $query->where('in_date_time', '=', $request->in_date_time);
//})
//    
//->when($request->out_date_time, function($query) use ($request){
//    $query->where('out_date_time', '=', $request->out_date_time);
//})
    
    
    
      ->when(($request->in_date_time &&  $request->in_date_time_to), function($query) use ($request){
    $query->whereBetween('in_date_time', [ $request->in_date_time,$request->in_date_time_to  ]);
})  
    
//    ->when((date("Y-d-m\TH:i", strtotime($request->in_date_time)) &&  date("Y-d-m\TH:i", strtotime($request->in_date_time_to))), function($query) use ($request){
//    $query->whereBetween('in_date_time', [ date("Y-d-m\TH:i", strtotime($request->in_date_time)),date("Y-d-m\TH:i", strtotime($request->in_date_time_to))  ]);
//})  
   
      ->when(($request->out_date_time &&  $request->out_date_time_to), function($query) use ($request){
    $query->whereBetween('out_date_time', [ $request->out_date_time,$request->out_date_time_to  ]);
})  
     
  ->when($request->governorate_id, function($query) use ($request){
    $query->whereHas('governorate', function($q) use ($request) {
        
            $q->whereIn('governorate_id', [$request->governorate_id]);
        
    });
})
      ->when($request->office_id, function($query) use ($request){
    $query->whereHas('office', function($q) use ($request) {
        
            $q->whereIn('office_id', [$request->office_id]);
        
    });
})
    ->paginate(10);
  // ->get();
             
//          echo $visitors;
//            die();
            
   
       $user = Auth::user();
        
           $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
              foreach($user->roles as $r)
        {
            $title_role = $r->title;
        }
        
        if($title_role == "Manager")
        {
           // dd("qq");
                   // $visitors = Visitor::all();
                   // $visitors = Visitor::paginate(10);
    //  $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
      $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');

             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
            // return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));

        }
  
                if($user->team == null)
        {
    //  $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
      $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');

             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
            // return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));
        }
        elseif(count($user->team->offices) == 0)
        {
   //   $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
     $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
          //   return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));
  
        }
        else{
              // dd($user->team->governorates );
//       $governorates = $user->team->governorates()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
   $offices = $user->team->offices()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');

         return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
      //   return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));

              
        }   
//                if($user->team == null)
//        {
//        $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
//       $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
//             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
//        }
//        elseif(count($user->team->governorates) == 0)
//        {
//      $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
//      $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
//             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
//  
//        }
//        else{
//              // dd($user->team->governorates );
//        $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
//       $governorates = $user->team->governorates()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
//         return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
//
//              
//        }    
        
        
        }
        
    }
            public function exist()
             {
               // echo "test"; 
                
                
                $user = Auth::user();
                
//                foreach($user->team->offices as $team)
//        {
//            $office_id = $team->pivot->office_id;
//        }
//         $visitors =  Visitor::whereDate('in_date_time', Carbon::today())->whereNull('out_date_time')->where('office_id', $office_id)->get();

   // echo $office_id;
//       $visitors =  Visitor::where('office_id', $office_id)->get();
//                
//           $visitors = Visitor::whereDate('in_date_time', Carbon::today())->whereNull('out_date_time')->get();
                 
//        $visitors =  Visitor::where('office_id', $office_id)
//            ->where('office_id', $office_id)->orWhere('in_date_time', Carbon::today())
//            ->get();
                
//        $visitors =  Visitor::where([['office_id', $office_id],['office_id', $office_id],['in_date_time', Carbon::today()]])
//            ->get();
        
                

          // $visitors =  Visitor::where('office_id', $office_id)->orWhere('in_date_time', Carbon::today())->get();

//             echo $visitors;
//                die();
                $user = Auth::user();
                   $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
                  foreach($user->roles as $r)
        {
            $title_role = $r->title;
        }
        
        if($title_role == "Manager")
        {
           // dd("qq");
                   //  $visitors = Visitor::all();
                   $visitors = Visitor::paginate(10);
    //  $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
      $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');

               return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
            // return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));

        }
  
                if($user->team == null)
        {
       //  $visitors = Visitor::whereDate('in_date_time', Carbon::today())->whereNull('out_date_time')->get();            
         $visitors = Visitor::whereDate('in_date_time', Carbon::today())->whereNull('out_date_time')->paginate(10);            
    //  $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
      $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');

             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
           //  return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));
        }
        elseif(count($user->team->offices) == 0)
        {
     //  $visitors = Visitor::whereDate('in_date_time', Carbon::today())->whereNull('out_date_time')->get();     
         $visitors = Visitor::whereDate('in_date_time', Carbon::today())->whereNull('out_date_time')->paginate(10);     
   //   $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
     $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
         //    return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));
  
        }
        else{
              // dd($user->team->governorates );
//       $governorates = $user->team->governorates()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
                    foreach($user->team->offices as $team)
        {
            $office_id = $team->pivot->office_id;
        }
     //  $visitors =  Visitor::whereDate('in_date_time', Carbon::today())->whereNull('out_date_time')->where('office_id', $office_id)->get();
           $visitors =  Visitor::whereDate('in_date_time', Carbon::today())->whereNull('out_date_time')->where('office_id', $office_id)->paginate(10);
        
            
   $offices = $user->team->offices()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');

         return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
       //  return view('admin.visitors.index_search_ex', compact('offices','governorates', 'visitors'));

              
        }

             }
    
    public function index()
    {
        abort_if(Gate::denies('visitor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       // $visitors = Visitor::all();
        
        $user = Auth::user();
       // echo $visitors;
        //echo $user->team->offices;
//        foreach($user->team->offices as $team)
//        {
//            $office_id = $team->pivot->office_id;
//        }
//   // echo $office_id;
//       $visitors =  Visitor::where('office_id', $office_id)->get();
//        echo $visitors;
      //  die();
      //  $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
       $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
//  echo $user->roles;
        foreach($user->roles as $r)
        {
            $title_role = $r->title;
        }
        
        if($title_role == "Manager")
        {
           // dd("qq");
                    //$visitors = Visitor::all();
             $visitors = Visitor::paginate(10);
    //  $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
      $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');

             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));

        }
     //   die();
        
        
                if($user->team == null)
        {
        // $visitors = Visitor::all();
         $visitors = Visitor::paginate(10);
                    
    //  $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
      $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
 
//      echo count($visitors);
//            die();
             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
        }
        elseif(count($user->team->offices) == 0)
        {
            //$visitors = Visitor::all();
             $visitors = Visitor::paginate(10);
   //   $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
     $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
//            echo $visitors;
//            die();
             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));
  
        }
        else{
          // dd("22");
              // dd($user->team->governorates );
//       $governorates = $user->team->governorates()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
             foreach($user->team->offices as $team)
        {
            $office_id = $team->pivot->office_id;
        }
   // echo $office_id;
       //$visitors =  Visitor::where('office_id', $office_id)->get();
       $visitors =  Visitor::where('office_id', $office_id)->paginate(10);
//       echo $visitors;
//            die();
            
   $offices = $user->team->offices()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');

         return view('admin.visitors.index', compact('offices','governorates', 'visitors'));

              
        }

      //  return view('admin.visitors.index', compact('visitors'));
    }

    public function create()
    {
        abort_if(Gate::denies('visitor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
//         $user = Auth::user();
//        $governorates = $user->team->governorates;
//        echo $governorates;
//        die();
//        foreach($gov as $g)
//        {
//            echo $g->governorate_name;
//        }
//        die();

        
        $user = Auth::user();
        
       // $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
         $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
         $deposit_types = DepositType::all()->pluck('deposit_type_desc', 'id')->prepend(trans('global.pleaseSelect'), '');
          $acreated_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        
     //   dd($user->team->governorates());
      

   
       // ->whereIn('id', [1, 2, 3])
//         $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        // $governorates = Governorate::whereIn('id',$governorates)->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
//dd($governorates);
        $depts = Departement::all()->pluck('dept_name', 'id')->prepend(trans('global.pleaseSelect'), '');

                     foreach($user->roles as $r)
        {
            $title_role = $r->title;
        }
        
        if($title_role == "Manager")
        {
           // dd("qq");
                  //  $visitors = Visitor::all();
                    $visitors = Visitor::paginate(10);
    //  $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
      $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');

             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));

        }
       // dd(count($user->team->governorates));
           if($user->team == null)
        {
        $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
             return view('admin.visitors.create', compact('offices','deposit_types', 'acreated_bies','governorates', 'depts'));
        }
      //  elseif(count($user->team->governorates) == 0)
        elseif(count($user->team->offices) == 0)
        {
        $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
             return view('admin.visitors.create', compact('offices','deposit_types', 'acreated_bies','governorates', 'depts'));
  
        }
        else{
              // dd($user->team->governorates );
//       $governorates = $user->team->governorates()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
       $offices = $user->team->offices()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
            
            
 
         return view('admin.visitors.create', compact('offices','deposit_types', 'acreated_bies','governorates', 'depts'));

              
        }
        
        
        
    }

     public function store(StoreVisitorRequest $request)
     {
        //dd($request->all());
         
         
        $visitor = Visitor::create($request->all());
         

        return redirect()->route('admin.visitors.index');
    }

    public function edit(Visitor $visitor)
    {
       // dd($visitor->acreated_by_id);
       $us = User::find($visitor->acreated_by_id);
        $us_name = $us->name;
       // die();
        abort_if(Gate::denies('visitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
  $user = Auth::user();
        $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $depts = Departement::all()->pluck('dept_name', 'id')->prepend(trans('global.pleaseSelect'), '');
 $deposit_types = DepositType::all()->pluck('deposit_type_desc', 'id')->prepend(trans('global.pleaseSelect'), '');
        $visitor->load('governorate', 'dept', 'team');
 $acreated_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
//        return view('admin.visitors.edit', compact('governorates', 'depts', 'visitor'));
        
                     foreach($user->roles as $r)
        {
            $title_role = $r->title;
        }
        
        if($title_role == "Manager")
        {
           // dd("qq");
                  //  $visitors = Visitor::all();
                    $visitors = Visitor::paginate(10);
    //  $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
      $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');

             return view('admin.visitors.index', compact('offices','governorates', 'visitors'));

        }
        
        
                 if($user->team == null)
        {
        $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.visitors.edit', compact('us_name','acreated_bies','deposit_types','offices','governorates', 'depts', 'visitor'));   
        }
      //  elseif(count($user->team->governorates) == 0)
        elseif(count($user->team->offices) == 0)
        {
        $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.visitors.edit', compact('us_name','acreated_bies','deposit_types','offices','governorates', 'depts', 'visitor'));   
  
        }
        else{
              // dd($user->team->governorates );
//       $governorates = $user->team->governorates()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $offices = $user->team->offices()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
         //   $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.visitors.edit', compact('us_name','acreated_bies','deposit_types','offices','governorates', 'depts', 'visitor'));     
            
 
      //   return view('admin.visitors.create', compact('offices','deposit_types', 'acreated_bies','governorates', 'depts'));

              
        } 
        
        
        
        
    }

    public function update(UpdateVisitorRequest $request, Visitor $visitor)
    {
         //dd($visitor);
        $visitor->update($request->all());

        return redirect()->route('admin.visitors.index');
    }

    public function show(Visitor $visitor)
    {
        abort_if(Gate::denies('visitor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visitor->load('governorate', 'dept', 'team');

        return view('admin.visitors.show', compact('visitor'));
    }

    public function destroy(Visitor $visitor)
    {
        abort_if(Gate::denies('visitor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visitor->delete();

        return back();
    }

    public function massDestroy(MassDestroyVisitorRequest $request)
    {
        Visitor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
