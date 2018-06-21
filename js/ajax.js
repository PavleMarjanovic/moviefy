$(document).ready(function() {
    $("#contactSubmit").click(function () {
        $.ajax({
            type: "POST",
            url: "../views/contact.php",
            data: {
                name: $("#firstName").val(),
                lastName: $("#lastName").val(),
                email: $("#email").val(),
                subject: $("#subject").val(),
                text: $("#taMessage").val(),
                contactSubmit : "1"
            },
            success: function () {
                $('#errors').html("<div class=\"alert alert-success\" role=\"alert\">\n" +
                    "\t\t\t\t\t<strong>Well done!</strong> You successfully submitted the message.\n" +
                    "\t\t\t\t</div>");
            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connected.\n Verify Network.';
                } else if (jqXHR.status === 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status === 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                $('#errors').html(msg);
            }
        });
    });
});
