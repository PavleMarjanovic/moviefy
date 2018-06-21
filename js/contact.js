window.onload = function()
{
    document.getElementById("firstName").addEventListener("keyup", checkContactFirstName);
    document.getElementById("lastName").addEventListener("keyup", checkContactLastName);
    document.getElementById("email").addEventListener("keyup", checkContactEmail);
    document.getElementById("subject").addEventListener("keyup", checkContactSubject);
    document.getElementById("taMessage").addEventListener("keyup", checkContactMessage);
    document.getElementById("rgRegister").setAttribute("disabled", true);

    document.getElementById("contactSubmit").setAttribute("disabled", true);
};
function checkContactFirstName()
{
    var contactFirstName, regFirstName;

    contactFirstName = document.getElementById("firstName").value;
    regFirstName = /^[A-Z][a-z]{2,15}$/;

    if(!regFirstName.test(contactFirstName))
    {
        document.getElementById("firstName").style.border = "1px solid red";
        document.getElementById("contactSubmit").setAttribute("disabled", true);
    }
    else
    {
        document.getElementById("firstName").style.border = "1px solid #d9d9d9";
        document.getElementById("contactSubmit").removeAttribute("disabled");
    }
}
function checkContactLastName()
{
    var contactLastName, regLastName;

    contactLastName = document.getElementById("lastName").value;
    regLastName = /^[A-Z][a-z]{2,15}$/;

    if(!regLastName.test(contactLastName))
    {
        document.getElementById("lastName").style.border = "1px solid red";
        document.getElementById("contactSubmit").setAttribute("disabled", true);
    }
    else
    {
        document.getElementById("lastName").style.border = "1px solid #d9d9d9";
        document.getElementById("contactSubmit").removeAttribute("disabled");
    }
}
function checkContactEmail()
{
    var regEmail, contactEmail;

    contactEmail = document.getElementById("email").value;
    regEmail = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/;

    if(!regEmail.test(contactEmail))
    {
        document.getElementById("email").style.border = "1px solid red";
        document.getElementById("contactSubmit").setAttribute("disabled", true);
    }
    else
    {
        document.getElementById("email").style.border = "1px solid #d9d9d9";
        document.getElementById("contactSubmit").removeAttribute("disabled");
    }
}
function checkContactSubject()
{
    var regSubject, contactSubject;

    contactSubject = document.getElementById("subject").value;
    regSubject = /^[A-z]{2,15}$/;

    if(!regSubject.test(contactSubject))
    {
        document.getElementById("subject").style.border = "1px solid red";
        document.getElementById("contactSubmit").setAttribute("disabled", true);
    }
    else
    {
        document.getElementById("subject").style.border = "1px solid #d9d9d9";
        document.getElementById("contactSubmit").removeAttribute("disabled");
    }
}
function checkContactMessage()
{
    var regMessage, contactMessage;

    contactMessage = document.getElementById("taMessage").value;
    regMessage = /^[\s\S]{1,500}$/;

    if(!regMessage.test(contactMessage))
    {
        document.getElementById("taMessage").style.border = "1px solid red";
        document.getElementById("contactSubmit").setAttribute("disabled", true);
    }
    else
    {
        document.getElementById("taMessage").style.border = "1px solid #d9d9d9";
        document.getElementById("contactSubmit").removeAttribute("disabled");
    }
}