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
$( "#sortable" ).sortable();
$( "#sortable" ).disableSelection();
$(document).ready(function(){
    $( "ul" ).sortable({
        // Cancel the drag when selecting contenteditable items, buttons, or input boxes
        cancel: ":input,button,[contenteditable]",
        // Set it so rows can only be moved vertically
        axis: "y",
        // Triggered when the user has finished moving a row
        update: function (event, ui) {
            // sortable() - Creates an array of the elements based on the element's id. 
            // The element id must be a word separated by a hyphen, underscore, or equal sign. For example, <tr id='item-1'>
            var data = $(this).sortable('serialize');
            console.log(data);
            //alert(data); <- Uncomment this to see what data will be sent to the server
     
            // AJAX POST to server
            $.ajax({
                data: data,
                type: 'PATCH',
                url: '2/sort',
                success: function(response) {
                console.log(data);
            }
            });
        }
    });
});