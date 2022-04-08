setTimeout(() => {
    document.querySelectorAll('.alert').forEach(error => error.remove());
}, 3000);

function validateForm()
{
    let email = document.getElementById("email");
    let firstname = document.getElementById("firstname");
    let lastname = document.getElementById("lastname");
    let password = document.getElementById("password");

    if (document.formRegister.firstname.value !== "")
    {
        return true;
    }
    else {
        alert("Entrez votre prénom");
        return false;
    }

    if (document.formRegister.lastname.value !== "")
    {
        return true;
    }
    else {
        alert("Entrez votre nom");
        return false;
    }

    if (document.formRegister.email.value !== "")
    {
        return true;
    }
    else {
        alert("Entrez votre mail");
        return false;
    }

    if (document.formRegister.password.value !== "")
    {
        return true;
    }
    else {
        alert("Entrez votre mot de passe");
        return false;
    }
}