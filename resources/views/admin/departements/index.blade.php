@extends('layouts.admin')
@section('content')
@can('departement_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.departements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.departement.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.departement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Departement">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.departement.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.departement.fields.dept_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.departement.fields.is_active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departements as $key => $departement)
                        <tr data-entry-id="{{ $departement->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $departement->id ?? '' }}
                            </td>
                            <td>
                                {{ $departement->dept_name ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $departement->is_active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $departement->is_active ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('departement_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.departements.show', $departement->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('departement_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.departements.edit', $departement->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('departement_delete')
                                    <form action="{{ route('admin.departements.destroy', $departement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('departement_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.departements.massDestroy') }}",
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
  let table = $('.datatable-Departement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection