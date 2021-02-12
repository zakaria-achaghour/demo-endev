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


  // select group or indivuial
 