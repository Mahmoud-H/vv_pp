@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.departement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.departements.update", [$departement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="dept_name">{{ trans('cruds.departement.fields.dept_name') }}</label>
                <input class="form-control {{ $errors->has('dept_name') ? 'is-invalid' : '' }}" type="text" name="dept_name" id="dept_name" value="{{ old('dept_name', $departement->dept_name) }}">
                @if($errors->has('dept_name'))
                    <span class="text-danger">{{ $errors->first('dept_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.departement.fields.dept_name_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_active" value="0">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $departement->is_active || old('is_active', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">{{ trans('cruds.departement.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.departement.fields.is_active_helper') }}</span>
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