function checkPassword() {

    var originalPassword = document.forms['register']['password1'].value;
    var password = document.forms['register']['password2'].value;

    var element = document.getElementById("registerButton");

    console.log(originalPassword, password);
    
    
    if (password != originalPassword) {
        //Cambia el estilo de los inputs y les pone un borde rojo en señal de que no coinciden
        document.forms['register']['password1'].classList.remove("is-valid");
        document.forms['register']['password2'].classList.remove("is-valid");
        document.forms['register']['password1'].classList.add("is-invalid");
        document.forms['register']['password2'].classList.add("is-invalid");
        element.disabled = true;
    }
    else {
        //Cambia el estilo de los inputs y les pone un borde verde en señal de que coinciden
        document.forms['register']['password1'].classList.add("is-valid");
        document.forms['register']['password2'].classList.add("is-valid");
        document.forms['register']['password1'].classList.remove("is-invalid");
        document.forms['register']['password2'].classList.remove("is-invalid");
        element.disabled = false;
    }
}

function underAgeValidate(birthday) {

    var element = document.getElementById("registerButton");

    // it will accept two types of format yyyy-mm-dd and yyyy/mm/dd
    var optimizedBirthday = birthday.replace(/-/g, "/");

    //set date based on birthday at 01:00:00 hours GMT+0100 (CET)
    var myBirthday = new Date(optimizedBirthday);

    // set current day on 01:00:00 hours GMT+0100 (CET)
    var currentDate = new Date().toJSON().slice(0, 10) + ' 01:00:00';

    // calculate age comparing current date and borthday
    var myAge = ((Date.now(currentDate) - myBirthday) / (31557600000));

    if (myAge < 18) {
        element.disabled = true;
        document.forms['register']['date'].classList.add("is-invalid");
    } else {
        element.disabled = false;
        document.forms['register']['date'].classList.remove("is-invalid");
    }
    

} 