
$(document).ready(function() {

    $('#smartwizard').smartWizard({
        theme: 'dots',
        toolbarSettings: {
            toolbarExtraButtons: [
                $('<button></button>').text('Valide')
                            .addClass('btn btn-warning')
                            
            ]
        },
    });

});

// chechre table
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });


  // filter in cards

  function myFunction() {
    var input, filter, cards, cardContainer, h5, title, i;
    input = document.getElementById("myFilter");
    filter = input.value.toUpperCase();
    cardContainer = document.getElementById("myItems");
    cards = cardContainer.getElementsByClassName("card");
    for (i = 0; i < cards.length; i++) {
        title = cards[i].querySelector(".card-body h5.card-title");
        if (title.innerText.toUpperCase().indexOf(filter) > -1) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}
 
jQuery(function() {
    jQuery('#status_select').change(function() {
        this.form.submit();
    });
});




// chnage content of table sessions
/*$(document).ready(function(){  
    $('#status').change(function(){  
         var status_val = $(this).val(); 
          $('#myTable').empty();
         $.ajax({  
              url:"{{ route('admin.sessions.tableContent',['var'=> $status_val]) }}",  
              method:"GET",   
              success:function(data){  
                   $('#myTable').html(data);  
              }  
         });  
    });  
});  */

// initilisation table
$(document).ready( function () {
    $('#table_id').DataTable({
       
        lengthMenu: [[5,10,15,20,50,-1],[5,10,15,20,50,"all"]],
        ordering: false,
     
    
       
       initComplete: function () {
        this.api().columns([2]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    });

} );


    
   
