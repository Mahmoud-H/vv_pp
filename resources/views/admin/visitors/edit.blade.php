@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.visitor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.visitors.update", [$visitor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="visitor_id_num">{{ trans('cruds.visitor.fields.visitor_id_num') }}</label>
                <input class="form-control {{ $errors->has('visitor_id_num') ? 'is-invalid' : '' }}" type="text" name="visitor_id_num" id="visitor_id_num" value="{{ old('visitor_id_num', $visitor->visitor_id_num) }}" required>
                @if($errors->has('visitor_id_num'))
                    <span class="text-danger">{{ $errors->first('visitor_id_num') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.visitor_id_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="visitor_name">{{ trans('cruds.visitor.fields.visitor_name') }}</label>
                <input class="form-control {{ $errors->has('visitor_name') ? 'is-invalid' : '' }}" type="text" name="visitor_name" id="visitor_name" value="{{ old('visitor_name', $visitor->visitor_name) }}" required>
                @if($errors->has('visitor_name'))
                    <span class="text-danger">{{ $errors->first('visitor_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.visitor_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile_num">{{ trans('cruds.visitor.fields.mobile_num') }}</label>
                <input class="form-control {{ $errors->has('mobile_num') ? 'is-invalid' : '' }}" type="text" name="mobile_num" id="mobile_num" value="{{ old('mobile_num', $visitor->mobile_num) }}">
                @if($errors->has('mobile_num'))
                    <span class="text-danger">{{ $errors->first('mobile_num') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.mobile_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="office_id">{{ trans('cruds.visitor.fields.office') }}</label>
                <select class="form-control select2 {{ $errors->has('office') ? 'is-invalid' : '' }}" name="office_id" id="office_id" required>
                    @foreach($offices as $id => $office)
                        <option value="{{ $id }}" {{ (old('office_id') ? old('office_id') : $visitor->office_id ?? '') == $id ? 'selected' : '' }}>{{ $office }}</option>
                    @endforeach
                </select>
                @if($errors->has('office'))
                    <span class="text-danger">{{ $errors->first('office') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.office_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="governorate_id">{{ trans('cruds.visitor.fields.governorate') }}</label>
                <select class="form-control select2 {{ $errors->has('governorate') ? 'is-invalid' : '' }}" name="governorate_id" id="governorate_id" required>
                    @foreach($governorates as $id => $governorate)
                        <option value="{{ $id }}" {{ (old('governorate_id') ? old('governorate_id') : $visitor->governorate->id ?? '') == $id ? 'selected' : '' }}>{{ $governorate }}</option>
                    @endforeach
                </select>
                @if($errors->has('governorate'))
                    <span class="text-danger">{{ $errors->first('governorate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.governorate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dept_id">{{ trans('cruds.visitor.fields.dept') }}</label>
                <select class="form-control select2 {{ $errors->has('dept') ? 'is-invalid' : '' }}" name="dept_id" id="dept_id">
                    @foreach($depts as $id => $dept)
                        <option value="{{ $id }}" {{ (old('dept_id') ? old('dept_id') : $visitor->dept->id ?? '') == $id ? 'selected' : '' }}>{{ $dept }}</option>
                    @endforeach
                </select>
                @if($errors->has('dept'))
                    <span class="text-danger">{{ $errors->first('dept') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.dept_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="in_date_time">{{ trans('cruds.visitor.fields.in_date_time') }}</label>
                
                 @can('edit_in_date_time')
               <input class="form-control datetime {{ $errors->has('in_date_time') ? 'is-invalid' : '' }}" type="text" name="in_date_time" id="in_date_time" value="{{ old('in_date_time', $visitor->in_date_time) }}"> 
                 @else
                <input readonly class="form-control  {{ $errors->has('in_date_time') ? 'is-invalid' : '' }}" type="text" name="in_date_time" id="in_date_time" value="{{ old('in_date_time', $visitor->in_date_time) }}">
                 @endcan
                
<!--                <input class="form-control datetime {{ $errors->has('in_date_time') ? 'is-invalid' : '' }}" type="text" name="in_date_time" id="in_date_time" value="{{ old('in_date_time', $visitor->in_date_time) }}">-->
                @if($errors->has('in_date_time'))
                    <span class="text-danger">{{ $errors->first('in_date_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.in_date_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="out_date_time">{{ trans('cruds.visitor.fields.out_date_time') }}</label>
                  @can('edit_out_date_time')
                <input  class="form-control datetime  {{ $errors->has('out_date_time') ? 'is-invalid' : '' }}" type="text" name="out_date_time" id="out_date_time" value="{{ old('out_date_time', $visitor->out_date_time) }}">
                 @else 
                <input readonly class="form-control   {{ $errors->has('out_date_time') ? 'is-invalid' : '' }}" type="text" name="out_date_time" id="out_date_time" value="{{ old('out_date_time', $visitor->out_date_time) }}">
                 @endcan
                @if($errors->has('out_date_time'))
                    <span class="text-danger">{{ $errors->first('out_date_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.out_date_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deposit_type_id">{{ trans('cruds.visitor.fields.deposit_type') }}</label>
                <select class="form-control select2 {{ $errors->has('deposit_type') ? 'is-invalid' : '' }}" name="deposit_type_id" id="deposit_type_id">
                    @foreach($deposit_types as $id => $deposit_type)
                    
                    
          <option value="{{ $id }}" {{ (old('deposit_type_id') ? old('deposit_type_id') : $visitor->deposit_type_id ?? '') == $id ? 'selected' : '' }}>{{ $deposit_type }}</option>
                        {{--<option value="{{ $id }}" {{ (old('deposit_type_id') ? old('deposit_type_id') : $visitor->deposit_type->id ?? '') == $id ? 'selected' : '' }}>{{ $deposit_type }}</option>--}}
                    @endforeach
                </select>
                @if($errors->has('deposit_type'))
                    <span class="text-danger">{{ $errors->first('deposit_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.deposit_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deposit">{{ trans('cruds.visitor.fields.deposit') }}</label>
                <textarea class="form-control {{ $errors->has('deposit') ? 'is-invalid' : '' }}" name="deposit" id="deposit">{{ old('deposit', $visitor->deposit) }}</textarea>
                @if($errors->has('deposit'))
                    <span class="text-danger">{{ $errors->first('deposit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.deposit_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('deposit_taken') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="deposit_taken" value="0">
                    <input class="form-check-input" type="checkbox" name="deposit_taken" id="deposit_taken" value="1" {{ $visitor->deposit_taken || old('deposit_taken', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="deposit_taken">{{ trans('cruds.visitor.fields.deposit_taken') }}</label>
                </div>
                @if($errors->has('deposit_taken'))
                    <span class="text-danger">{{ $errors->first('deposit_taken') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.deposit_taken_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.visitor.fields.notes') }}</label>
                <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" value="{{ old('notes', $visitor->notes) }}">
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="acreated_by_id">{{ trans('cruds.visitor.fields.acreated_by') }}</label>
<!--                <input readonly class="form-control {{ $errors->has('acreated_by_id') ? 'is-invalid' : '' }}" type="text" name="acreated_by_id" id="acreated_by_id" value="{{ Auth::user()->name }}">  -->

<!--
                <select class="form-control select2 {{ $errors->has('acreated_by') ? 'is-invalid' : '' }}" name="acreated_by_id" id="acreated_by_id">
                    @foreach($acreated_bies as $id => $acreated_by)
                        <option value="{{ $id }}" {{ (old('acreated_by_id') ? old('acreated_by_id') : $visitor->acreated_by->id ?? '') == $id ? 'selected' : '' }}>{{ $acreated_by }}</option>
                    @endforeach
                </select>
-->
                      <select class="form-control select2 {{ $errors->has('acreated_by') ? 'is-invalid' : '' }}" name="acreated_by_id" id="acreated_by_id">
                   
                        <option selected readonly value="{{ $visitor->acreated_by_id}}" >{{ $us_name }}</option>
                  
                </select>
                
                @if($errors->has('acreated_by'))
                    <span class="text-danger">{{ $errors->first('acreated_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.acreated_by_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection