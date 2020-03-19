oTable = $('#car-type-table').DataTable({
    // paging: false,
    // searching: false,
    // bDestroy: true,
    processing: true,
    serverSide: true,
    autoWidth: true,
    
    // order: [[ 0, "desc" ]],
    ajax:{ url:route('car_type.datatable'),
        data: function (d) {
               d.route_car = $('#route-car :selected').val();
               // d.group_select = $('#customertag_dropdown :selected').val();
           }
         },
        columns: [
                 { data: 'name', name: 'name' },
                 { data: 'station', name: 'station' },
                 { data: 'phone', name: 'phone' },
              ],
});