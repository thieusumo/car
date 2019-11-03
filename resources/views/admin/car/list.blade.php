@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
{{-- MODAL IMPORT DATA --}}
<div class="modal fade" id="import-car-modal">
    <form id="import-form">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Import Car Data</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <a href="{{ route('car.down-template') }}" title="">Download template</a><br>
                <button type="button" onclick="ChooseFile()" class="btn btn-primary btm-sm choose-file">Choose File</button><span id="file_name"></span>
                <input type="file" hidden name="file" id="file">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm btn-close" onclick="clearForm()" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary btn-sm btn-import">Import</button>
            </div>

          </div>
        </div>
    </form>
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
                            <a href="javascript:void(0)" class="btn btn-sm btn-info import-car">{{ __('Import car') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter w-100" id="car-table">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col"></th>
                            </thead>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $car_list->links() }}
                    </nav>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
	$(document).ready(function(){
        
		oTable = $('#car-table').DataTable({
                // paging: false,
                // searching: false,
                // bDestroy: true,
                processing: true,
                serverSide: true,
                autoWidth: true,
                
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
                             { data: 'line', name: 'line' },

                          ],
          });
        $(".import-car").click(function(){
            $("#import-car-modal").modal('show');
        });

	});
    function ChooseFile(){
        $("#file").click();
    }
    $("#file").change(function(e) {
        var file_name = e.target.files[0].name;
        $("#file_name").text(file_name);
    });
    $(".btn-import").click(function(event) {
        var formData = new FormData($(this).parents('form')[0]);
        formData.append('_token','{{ csrf_token() }}');

        $.ajax({
            url: '{{ route('car.import') }}',
            type: 'POST',
            dataType: 'html',
            data: formData,
            contentType: false,
            processData: false,
        })
        .done(function(data) {
            data = JSON.parse(data);
            if(data.status == 'error'){
                $.notify(data.message,{type:'danger',});
            }else{
                $.notify(data.message,{type:'success',});
                clearForm();
            }
        })
        .fail(function() {
            $.notify("Failed!",{type:'danger',});
        });
        function clearForm(){
            oTable.draw();
            $("#import-car-modal").modal('hide');
            $("#import-form")[0].reset();
            $("#file_name").text("");
        }
        
    });
        
</script>
@endpush
