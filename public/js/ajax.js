$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function deleteEvent(id){
    
    $.ajax({
        type:'DELETE',
        url:"events/"+id,
        success:function(res){
            alert('Obrisano '+res);
        }

    });
}