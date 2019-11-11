jQuery(document).ready(
    function($) {
        $( '.widget-control-save' ).click(
            function() {
                // grab the ID of the save button
                var saveID   = $( this ).attr( 'id' );
                
                // grab the 'global' ID
                var ID       = saveID.replace( /-savewidget/, '' );
                
                // create the ID for the random-number-input with global ID and input-ID
                var numberID = ID + '-the_random_number';
                
                // grab the value from input field
                var randNum  = $( '#'+numberID ).val();
                
                // create the ID for the text tab
                var textTab  = ID + '-wp_editor_' + randNum + '-html';
                
                // trigger a click
                $( '#'+textTab ).trigger( 'click' );
            }
            );
        }
        );