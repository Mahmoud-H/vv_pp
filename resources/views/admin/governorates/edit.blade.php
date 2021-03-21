@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.governorate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.governorates.update", [$governorate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="governorate_name">{{ trans('cruds.governorate.fields.governorate_name') }}</label>
                <input class="form-control {{ $errors->has('governorate_name') ? 'is-invalid' : '' }}" type="text" name="governorate_name" id="governorate_name" value="{{ old('governorate_name', $governorate->governorate_name) }}" required>
                @if($errors->has('governorate_name'))
                    <span class="text-danger">{{ $errors->first('governorate_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.governorate.fields.governorate_name_helper') }}</span>
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