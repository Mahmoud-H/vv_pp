@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.depositType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.deposit-types.update", [$depositType->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="deposit_type_desc">{{ trans('cruds.depositType.fields.deposit_type_desc') }}</label>
                <input class="form-control {{ $errors->has('deposit_type_desc') ? 'is-invalid' : '' }}" type="text" name="deposit_type_desc" id="deposit_type_desc" value="{{ old('deposit_type_desc', $depositType->deposit_type_desc) }}" required>
                @if($errors->has('deposit_type_desc'))
                    <span class="text-danger">{{ $errors->first('deposit_type_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.depositType.fields.deposit_type_desc_helper') }}</span>
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