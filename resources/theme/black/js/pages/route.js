var id = 0;
var _token = $('meta[name=csrf-token]').attr('content');
oTable = $('#route-table').DataTable({
        // paging: false,
        // searching: false,
        // bDestroy: true,
        processing: true,
        serverSide: true,
        autoWidth: true,
        // order: [[ 0, "desc" ]],
        ajax:{ url:route('route.datatable'),
            data: function (d) {
               }
             },
        columns: [
            { data: 'id', name: 'id', class: 'text-center' },
            { data: 'name', name: 'name' },
            { data: 'active', name: 'active', class:'text-center' },
            { data: 'action', name: 'action', class:'text-center' },
        ],
  });
$(document).on('click','.btn-edit', function(){
    id = $(this).parent('td').siblings('td').eq(0).text();
    var name = $(this).parent('td').siblings('td').eq(1).text();
    $("#name").val(name);
});
//Cancel Form
$(".btn-cancel").click(function(){
    clearView();
});
//Delete Route
$(document).on('click','.btn-delete', function(){
    if(confirm('Do you want to delete this?')){
        id = $(this).parent('td').siblings('td').eq(0).text();
        $.ajax({
            url:route('route.destroy',id),
            type: 'DELETE',
            dataType: 'html',
            data: {_token: _token },
        })
        .done(function(data) {
            data = JSON.parse(data);
            $.notify(data.message,{type:data.status});
            if(data.status == 'success'){
                oTable.draw();
            }
            console.log(data);
        })
        .fail(function() {
            $.notify("Error",{type: danger});
        });
        
    }else{
        return;
    }
});

//Submit edit or create
$(".btn-submit").click(function(){
    var name = $('#name').val();
    if(name == ""){
        $.notify('Text Name',{type: 'danger'});
        return;
    }else{
        //Create
        if(id == 0) { var url = route('route.store'); var type = 'POST'; }
        //Update
        else{ var url = route('route.update',id); var type = 'PATCH'; }
        $.ajax({
            url: url,
            type: type,
            dataType: 'json',
            data: {
                name: name,
                _token: _token
            },
        })
        .done(function(data) {
            $.notify(data.message,{type: data.status});
            if(data.status == 'success'){
                clearView();
            }
        })   
        .fail(function(xhr, ajaxOptions, thrownError){
            if(xhr.responseJSON.errors != 'undefined'){
                $.each(xhr.responseJSON.errors, function(index, val) {
                    $.notify(val[0], {type: 'danger'});
                });
                return;
            }
            $.notify('Error', {type: 'danger'});
        });   
    }
});
function clearView(){
    $("#name").val("");
    id = 0;
    oTable.draw();
}