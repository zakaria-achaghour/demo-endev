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





