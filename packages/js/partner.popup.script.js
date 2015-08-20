$(function() {

    // Checking for CSS 3D transformation support
    $.support.css3d = supportsCSS3D();

    var myModal = $('#myModal');

    $('#showPasswordId').click(function() {
        myModal.show();
        $(this).show();
    });

    // Listening for clicks on the ribbon links
    $(document).on('click', '.flipLink', function(e) {

        //myModal.removeClass('signFlipped');
        // Flipping the forms
        myModal.toggleClass('flipped');


        // If there is no CSS3 3D support, simply
        // hide the login form (exposing the recover one)
        if (!$.support.css3d) {
            $('#login').toggle();
        }
        e.preventDefault();
    });
    
    $(document).on('click', '#signupid', function(e) {
        myModal.removeClass('flipped');
        myModal.toggleClass('signFlipped');
        e.preventDefault();
    });
    $(document).on('click', '#signupidtop', function(e) {
        myModal.removeClass('flipped');
        myModal.toggleClass('signFlipped');
        e.preventDefault();
    });
    $(document).on('click', '#flipToSignup', function(e) {
        myModal.removeClass('flipped');
        myModal.toggleClass('signFlipped');
        e.preventDefault();
    });
    
    $(document).on('click', '.close', function(e) {
        myModal.removeClass('flipped');
        myModal.removeClass('signFlipped');
        e.preventDefault();
    });
    
    $(document).on('click', '.modal-backdrop', function(e) { 
        myModal.removeClass('flipped');
        myModal.removeClass('signFlipped');        
        $(".closeOnSideClick").css("display","none")
        e.preventDefault();
    });    

    // A helper function that checks for the
    // support of the 3D CSS3 transformations.
    function supportsCSS3D() {
        var props = [
            'perspectiveProperty', 'WebkitPerspective', 'MozPerspective'
        ], testDom = document.createElement('a');

        for (var i = 0; i < props.length; i++) {
            if (props[i] in testDom.style) {
                return true;
            }
        }

        return false;
    }
});
