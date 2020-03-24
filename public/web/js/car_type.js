oTable = $('#car-type-table').DataTable({
    // paging: false,
    // searching: false,
    // bDestroy: true,
    dom: 'ilrftip',
    processing: true,
    serverSide: true,
    autoWidth: true,
    
    // order: [[ 0, "desc" ]],
    ajax:{ url:route('list_car.datatable'),
        data: function (d) {
               d.route_car = $('#route-car :selected').val();
               d.slug = slug;
               // d.group_select = $('#customertag_dropdown :selected').val();
           }
         },
        columns: [
                 { data: 'name', name: 'name' },
                 { data: 'station', name: 'station' },
                 { data: 'phone', name: 'phone' },
              ],
});