@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.team.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.teams.update", [$team->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.team.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $team->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="governorates">{{ trans('cruds.team.fields.governorates') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select dir="rtl" class="form-control select2 {{ $errors->has('governorates') ? 'is-invalid' : '' }}" name="governorates[]" id="governorates" multiple>
                    @foreach($governorates as $id => $governorates)
                        <option value="{{ $id }}" {{ (in_array($id, old('governorates', [])) || $team->governorates->contains($id)) ? 'selected' : '' }}>{{ $governorates }}</option>
                    @endforeach
                </select>
                @if($errors->has('governorates'))
                    <span class="text-danger">{{ $errors->first('governorates') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.governorates_helper') }}</span>
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