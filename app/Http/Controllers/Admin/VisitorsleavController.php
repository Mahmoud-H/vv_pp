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
class VisitorsleavController extends Controller
{
    

    

    


  

    public function edit(Visitor $visitorsleav)
    {
        abort_if(Gate::denies('visitor_out'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $us = User::find($visitorsleav->acreated_by_id);
        $us_name = $us->name;
      //  dd($visitor);
  $user = Auth::user();
        $governorates = Governorate::all()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $depts = Departement::all()->pluck('dept_name', 'id')->prepend(trans('global.pleaseSelect'), '');
 $deposit_types = DepositType::all()->pluck('deposit_type_desc', 'id')->prepend(trans('global.pleaseSelect'), '');
        $visitorsleav->load('governorate', 'dept', 'team');
 $acreated_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
//        return view('admin.visitors.edit', compact('governorates', 'depts', 'visitor'));
        
                 if($user->team == null)
        {
        $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.visitors.editleav', compact('us_name','acreated_bies','deposit_types','offices','governorates', 'depts', 'visitorsleav'));   
        }
      //  elseif(count($user->team->governorates) == 0)
        elseif(count($user->team->offices) == 0)
        {
        $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.visitors.editleav', compact('us_name','acreated_bies','deposit_types','offices','governorates', 'depts', 'visitorsleav'));   
  
        }
        else{
              // dd($user->team->governorates );
//       $governorates = $user->team->governorates()->pluck('governorate_name', 'id')->prepend(trans('global.pleaseSelect'), '');
       $offices = $user->team->offices()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        //  $offices = Office::all()->pluck('office_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.visitors.editleav', compact('us_name','acreated_bies','deposit_types','offices','governorates', 'depts', 'visitorsleav'));     
            
 
      //   return view('admin.visitors.create', compact('offices','deposit_types', 'acreated_bies','governorates', 'depts'));

              
        } 
        
        
        
        
    }

    public function update(UpdateVisitorRequest $request, Visitor $visitorsleav)
    {
       // dd($visitorsleav);
        //dd($request->deposit_taken);5
        if($request->deposit != null || $request->deposit_type_id != null )
        {
            
       
        if( $request->deposit_taken == 0)
        {
          return back();  
        }
             }
         
            
        $visitorsleav->update($request->all());
 //dd($visitor);   
        return redirect()->route('admin.visitors.index');
        
        
    }


 

     
}
