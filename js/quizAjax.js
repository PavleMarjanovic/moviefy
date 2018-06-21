$(document).ready(function() {
$("#submitButton").click(function () {
    var selectedVal = "";
    var selected = $("input[type='radio'][name='quiz']:checked");
    if (selected.length > 0) {
        selectedVal = selected.val();
    }
    $.ajax({
        type: "POST",
        url: "../views/quiz.php",
        data: {
            response : selectedVal,
            submitButton : "1"
        },
        success: function (data) {
            var string = "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry";
            if(data.indexOf(string) != -1)
            {
                $('#quizErrors').html("<div class=\"alert alert-danger\" role=\"alert\">\n" +
                    "\t\t\t\t\t<strong>ERROR!</strong> You can vote only once!\n" +
                    "\t\t\t\t </div>");
            }
            else
            {
                $('#quizErrors').html("<div class=\"alert alert-success\" role=\"alert\">\n" +
                    "\t\t\t\t\t<strong>Well done!</strong> You successfully submitted the response to our quiz. Refresh the page to see the results. \n" +
                    "\t\t\t\t </div>");
            }
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
            $('#quizErrors').html(msg);
        }
    });
});
});