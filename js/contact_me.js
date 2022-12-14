$(function() {

    $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error msgs or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
            var nom = $("input#nom").val();
            var email = $("input#email").val();
            var tel = $("input#tel").val();
            var msg = $("textarea#msg").val();
            var firstName = nom; // For Success/Failure Message
            // Check for white space in nom for Success/Fail msg
            if (firstName.indexOf(' ') >= 0) {
                firstName = nom.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "addMsg.php",
                type: "POST",
                data: {
                    nom: nom,
                    tel: tel,
                    email: email,
                    msg: msg
                },
                cache: false,
                success: function() {
                    // Enable button & show success msg
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Your msg has been sent. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
                error: function() {
                    // Fail msg
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#nom').focus(function() {
    $('#success').html('');
});
