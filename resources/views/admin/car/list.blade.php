@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
{{-- MODAL IMPORT DATA --}}
<div class="modal fade" id="import-car-modal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  {{-- END MODAL IMPORT DATA --}}
<div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Users') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('car.create') }}" class="btn btn-sm btn-info">{{ __('Add car') }}</a>
                            <a href="{{ route('car.import') }}" class="btn btn-sm btn-info">{{ __('Import car') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="car-table">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($car_list as $car)
                                    <tr>
                                        <td>{{ $car->name }}</td>
                                        <td>
                                            {{ $car->phone }}
                                        </td>
                                        <td>{{ $car->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        {{-- @if (auth()->user()->id != $user->id)
                                                            <form action="{{ route('user.destroy', $user) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Edit') }}</a>
                                                        @endif --}}
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $car_list->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
	$(document).ready(function(){
		oTable = $('#car-table').DataTable({
                dom: "lBfrtip",
                processing: true,
                serverSide: true,
                autoWidth: true,
                buttons: [
                ],
                order: [[ 0, "desc" ]],
                ajax:{ url:"{{ route('car.datatable') }}",
                    data: function (d) {
                           // d.search_customer_date = $('input[name=search_customer_date]').val();
                           // d.group_select = $('#customertag_dropdown :selected').val();
                       }
                     },
                    columns: [
                             { data: 'name', name: 'name' },
                             { data: 'phone', name: 'phone' },
                             { data: 'active', name: 'active' },
                             
                          ],   
          }); 
	})
</script>
@endsection