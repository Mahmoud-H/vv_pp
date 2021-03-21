@extends('layouts.admin')
@section('content')
<style>

.existvisit{
    
    color: white;
    padding: 11px;
}
    .existvisit:hover{
    text-decoration: none;
    
}
        .hidden{
/*           display: none;*/
/*
            height: 50px;
            width: 50px;
*/
        }
/*
    .hidden a{
        display:inline;
         width: 20px;
        height: 20px;
    }
*/
    .px-4{
/*        display: none;*/
    }
/*
    .hidden .w-5{
        width: 20px;
        height: 20px;
    }
*/
    .dataTables_paginate{
         display: none;
    }
    .dataTables_info
    {
        display: none; 
    }
/*
    li{
display:inline-block;
        }
*/

</style>
@can('visitor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.visitors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.visitor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.visitor.title_singular') }} {{ trans('global.list') }}
    </div>
    
    
        <form method="POST" action="/visitorsrecord/public/admin/visitors/visitors-search">
        @csrf
     <div class="container-fluid ">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                <label class="" for="visitor_id_num">{{ trans('cruds.visitor.fields.visitor_id_num') }}</label>
                <input class="form-control {{ $errors->has('visitor_id_num') ? 'is-invalid' : '' }}" type="text" name="visitor_id_num" id="visitor_id_num" value="{{ old('visitor_id_num', '') }}" >
                @if($errors->has('visitor_id_num'))
                    <span class="text-danger">{{ $errors->first('visitor_id_num') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.visitor_id_num_helper') }}</span>
            </div>
                
            </div>

            <div class="col-4">
       
                 <div class="form-group">
                <label for="in_date_time">{{ trans('cruds.visitor.fields.in_date_time') }}</label>
       <input  class="form-control    {{ $errors->has('in_date_time') ? 'is-invalid' : '' }}" type="datetime-local" name="in_date_time" id="in_date_time" value="{{ old('in_date_time') }}">
<!--       <input  class="form-control datetime enddate datepicker  {{ $errors->has('in_date_time') ? 'is-invalid' : '' }}" type="text" name="in_date_time" id="in_date_time" value="{{ old('in_date_time') }}">-->
                 @if($errors->has('in_date_time'))
                    <span class="text-danger">{{ $errors->first('in_date_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.in_date_time_helper') }}</span>
            </div>
          

            </div>
              <div class="col-4">
       
                 <div class="form-group">
                <label for="in_date_time">{{ trans('cruds.visitor.fields.in_date_time') }}</label>
       <input  class="form-control  {{ $errors->has('in_date_time_to') ? 'is-invalid' : '' }}" type="datetime-local" name="in_date_time_to" id="in_date_time_to" value="{{ old('in_date_time_to') }}">
<!--       <input  class="form-control datetime enddate datepicker  {{ $errors->has('in_date_time_to') ? 'is-invalid' : '' }}" type="text" name="in_date_time_to" id="in_date_time_to" value="{{ old('in_date_time_to') }}">-->
                 @if($errors->has('in_date_time'))
                    <span class="text-danger">{{ $errors->first('in_date_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.in_date_time_helper') }}</span>
            </div>
          

            </div>
            </div>
            
            <div class="row">
                  <div class="col-4">
         <div class="form-group">
                <label class="" for="governorate_id">{{ trans('cruds.visitor.fields.governorate') }}</label>
                <select class="form-control select2 {{ $errors->has('governorate') ? 'is-invalid' : '' }}" name="governorate_id" id="governorate_id" >
                    @foreach($governorates as $id => $governorate)
                        <option value="{{ $id }}" {{ old('governorate_id') == $id ? 'selected' : '' }}>{{ $governorate }}</option>
                    @endforeach
                </select>
                @if($errors->has('governorate'))
                    <span class="text-danger">{{ $errors->first('governorate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.governorate_helper') }}</span>
            </div>
                
            </div>
            <div class="col-4"> 
           <div class="form-group">
                <label for="out_date_time">{{ trans('cruds.visitor.fields.out_date_time') }}</label>
         <input class="form-control  {{ $errors->has('out_date_time') ? 'is-invalid' : '' }}" type="datetime-local" name="out_date_time" id="out_date_time" value="{{ old('out_date_time') }}"> 
<!--         <input class="form-control datetime {{ $errors->has('out_date_time') ? 'is-invalid' : '' }}" type="text" name="out_date_time" id="out_date_time" value="{{ old('out_date_time') }}"> -->
 
                @if($errors->has('out_date_time'))
                    <span class="text-danger">{{ $errors->first('out_date_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.out_date_time_helper') }}</span>
            </div>
          
         </div>
            
             <div class="col-4"> 
           <div class="form-group">
                <label for="out_date_time">{{ trans('cruds.visitor.fields.out_date_time') }}</label>
                <input class="form-control  {{ $errors->has('out_date_time_to') ? 'is-invalid' : '' }}" type="datetime-local" name="out_date_time_to" id="out_date_time_to" value="{{ old('out_date_time_to') }}"> 
<!--                <input class="form-control datetime {{ $errors->has('out_date_time_to') ? 'is-invalid' : '' }}" type="text" name="out_date_time_to" id="out_date_time_to" value="{{ old('out_date_time_to') }}"> -->
 
                @if($errors->has('out_date_time'))
                    <span class="text-danger">{{ $errors->first('out_date_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.out_date_time_helper') }}</span>
            </div>
          
         </div>
            
            
            
            
        </div>
         
         
         
               <div class="row">
<!--
            <div class="col-4">
         <div class="form-group">
                <label class="" for="governorate_id">{{ trans('cruds.visitor.fields.governorate') }}</label>
                <select class="form-control select2 {{ $errors->has('governorate') ? 'is-invalid' : '' }}" name="governorate_id" id="governorate_id" >
                    @foreach($governorates as $id => $governorate)
                        <option value="{{ $id }}" {{ old('governorate_id') == $id ? 'selected' : '' }}>{{ $governorate }}</option>
                    @endforeach
                </select>
                @if($errors->has('governorate'))
                    <span class="text-danger">{{ $errors->first('governorate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.governorate_helper') }}</span>
            </div>
                
            </div>
-->
                   
                    <div class="col-4"> 
                         <div class="form-group">
                <label class=" " for="office_id">{{ trans('cruds.visitor.fields.office') }}</label>
                <select class="form-control select2 {{ $errors->has('office') ? 'is-invalid' : '' }}" name="office_id" id="office_id"  >
                    @foreach($offices as $id => $office)
                        <option value="{{ $id }}" {{ old('office_id') == $id ? 'selected' : '' }}>{{ $office }}</option>
                    @endforeach
                </select>
                @if($errors->has('office'))
                    <span class="text-danger">{{ $errors->first('office') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.office_helper') }}</span>
            </div>
                  </div>  
                       <div class="col-4"> 
                <div class="form-group">
               <label   for="date_from"> </label>
                    <br>   

                    <button class="btn-lg btn-primary" type="submit">
                        {{ trans('global.search') }}
                    </button>
                     
                     <a  class="btn-lg btn-warning existvisit" href="/visitorsrecord/public/admin/visitors/visitors-exist">
                                        {{ trans('global.Existing') }}
                                    </a>
                          
                </div>
            </div>
                   
<!--
                   <div class="col-4"> 
                <div class="form-group">
                    <label   for="date_from"> </label>
                    <br> 
                    <button> <a class="btn btn-xs  btn-warning" href="/admin/visitors/visitors-exist">
                                        {{ trans('global.Existing') }}
                                    </a>  </button>
                   
                    </div>
            </div>
-->
                   

         </div> 
         
         
         
         
         
    
<!--
        <div class="row">
 
             <div class="col-4"> 
                <div class="form-group">
               <label   for="date_from"> </label>
                    <br>   

                    <button class="btn-lg btn-primary" type="submit">
                        {{ trans('global.search') }}
                    </button>
                </div>
            </div>
              </div>
-->
         
          </div>
   
        </form>
    
    

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Visitor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
<!--
                        <th>
                            {{ trans('cruds.visitor.fields.id') }}
                        </th>
-->
                        <th>
                            {{ trans('cruds.visitor.fields.visitor_id_num') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.visitor_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.mobile_num') }}
                        </th>
<!--
                        <th>
                            {{ trans('cruds.visitor.fields.governorate') }}
                        </th>
-->
                        <th>
                            {{ trans('cruds.visitor.fields.dept') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.in_date_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.out_date_time') }}
                        </th>
<!--
                        <th>
                            {{ trans('cruds.visitor.fields.deposit') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.notes') }}
                        </th>
-->
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visitors as $key => $visitor)
                        <tr data-entry-id="{{ $visitor->id }}">
                            <td>

                            </td>
<!--
                            <td>
                                {{ $visitor->id ?? '' }}
                            </td>
-->
                            <td>
                                {{ $visitor->visitor_id_num ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->visitor_name ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->mobile_num ?? '' }}
                            </td>
<!--
                            <td>
                                {{ $visitor->governorate->governorate_name ?? '' }}
                            </td>
-->
                            <td>
                                {{ $visitor->dept->dept_name ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->in_date_time ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->out_date_time ?? '' }}
                            </td>
<!--
                            <td>
                                {{ $visitor->deposit ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->notes ?? '' }}
                            </td>
-->
                            <td>
                                @can('visitor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.visitors.show', $visitor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('visitor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.visitors.edit', $visitor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                               
                                
                              
                                 @if(empty($visitor->out_date_time))
                                 @can('visitor_out')
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.visitorsleav.edit', $visitor->id) }}">
                                        {{ trans('global.leaving') }}
                                    </a>
                                @endcan
                                  @endif
                             
                                

                                @can('visitor_delete')
                                    <form action="{{ route('admin.visitors.destroy', $visitor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                       
                </tbody>
           
 

            </table>
          
        </div>
         
    </div>
     {{$visitors->links("pagination::bootstrap-4")}}
</div>
 



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('visitor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.visitors.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Visitor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection