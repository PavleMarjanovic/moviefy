window.onload = function()
{
    document.getElementById("siUser").addEventListener("keyup", checkUsername);
    document.getElementById("siPassword").addEventListener("keyup", checkPassword);

    document.getElementById("rgUser").addEventListener("keyup", checkRegUser);
    document.getElementById("rgPassword").addEventListener("keyup", checkRegPass);
    document.getElementById("rgEmail").addEventListener("keyup", checkRegEmail);
    document.getElementById("rgConfirmPassword").addEventListener("keyup", checkRegConfirmPassword);

    document.getElementById("siLogin").setAttribute("disabled", true);
};
function checkRegConfirmPassword()
{
    var rgPassword, rgConfirmPassword;

    rgPassword = document.getElementById("rgPassword").value;
    rgConfirmPassword = document.getElementById("rgConfirmPassword").value;

    if(rgConfirmPassword != rgPassword)
    {
        document.getElementById("rgConfirmPassword").style.border = "1px solid red";
        document.getElementById("rgRegister").setAttribute("disabled", true);
    }
    else
    {
        document.getElementById("rgConfirmPassword").style.border = "1px solid #d9d9d9";
        document.getElementById("rgRegister").removeAttribute("disabled");
    }
}
function checkUsername()
{
    var siUser, regUsername;

    siUser = document.getElementById("siUser").value;


    regUsername = /^[a-z]{4,30}$/;

    if(!regUsername.test(siUser))
    {
        document.getElementById("siUser").style.border = "1px solid red";
        document.getElementById("siLogin").setAttribute("disabled", true);
    }
    else
    {
        document.getElementById("siUser").style.border = "1px solid #d9d9d9";
        document.getElementById("siLogin").removeAttribute("disabled");
    }
}
function checkPassword()
{
    var siPassword, regPassword;

    siPassword = document.getElementById("siPassword").value;
    regPassword = /^[\S]{5,}$/;

    if(!regPassword.test(siPassword))
    {
        document.getElementById("siPassword").style.border = "1px solid red";
        document.getElementById("siLogin").setAttribute("disabled", true);
    }
    else
    {
        document.getElementById("siPassword").style.border = "1px solid #d9d9d9";
        document.getElementById("siLogin").removeAttribute("disabled");
    }
}
function checkRegUser()
{
    var rgUser, regUsername;

    rgUser = document.getElementById("rgUser").value;


    regUsername = /^[a-z]{4,30}$/;

    if(!regUsername.test(rgUser))
    {
        document.getElementById("rgUser").style.border = "1px solid red";
        document.getElementById("rgRegister").setAttribute("disabled", true);
    }
    else
    {
        document.getElementById("rgUser").style.border = "1px solid #d9d9d9";
        document.getElementById("rgRegister").removeAttribute("disabled");
    }
}
function checkRegPass()
{
    var rgPassword, regPassword;

    rgPassword = document.getElementById("rgPassword").value;
    regPassword = /^[\S]{5,}$/;

    if(!regPassword.test(rgPassword))
    {
        document.getElementById("rgPassword").style.border = "1px solid red";
        document.getElementById("rgRegister").setAttribute("disabled", true);
    }
    else
    {
        document.getElementById("rgPassword").style.border = "1px solid #d9d9d9";
        document.getElementById("rgRegister").removeAttribute("disabled");
    }
}
function checkRegEmail()
{
    var rgEmail, regEmail;

    rgEmail = document.getElementById("rgEmail").value;
    regEmail = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/;

    if(!regEmail.test(rgEmail))
    {
        document.getElementById("rgEmail").style.border = "1px solid red";
        document.getElementById("rgRegister").setAttribute("disabled", true);
    }
    else
    {
        document.getElementById("rgEmail").style.border = "1px solid #d9d9d9";
        document.getElementById("rgRegister").removeAttribute("disabled");
    }
}