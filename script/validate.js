function validateName(name) {
    // Name should be less than 30 chars, contain only alphabets and space
    if (name.length > 30) {
        return false;
    }
    regex = /^[a-zA-Z ]+$/;
    return regex.test(name);
}

function validateEmail(email) {
    // Email contain less than 50 chars, has and @ followed by .
    if (email.length > 50) {
        return false;
    }
    regex = /@.*?\./;
    return regex.test(email);
}

function validatePhone(phone) {
    // Phone number is positive integer with less than 20 digits
    number = Number(phone); //convert input string to integer
    if (phone.length < 20 && Number.isInteger(number) && number > 0) {
        return true;
    }
    return false;
}

function validateAddress(address) {
    // Address less than 100 chars, contain alphabets, digits, commas, spaces, and period
    if (address.length > 100) {
        return false;
    }
    regex = /^[a-zA-Z0-9,. ]+$/;
    return regex.test(address);
}

function validatePassword(pass1, pass2) {
    // Passwords should match
    return pass1 === pass2 && pass1.length>0;
}

function validateUsername(username) {
    // Username less than 30 chars
    return username.length <= 30 && username.length > 0;
}

function validateForm(form) {
    error_msg = 0;
    if (!validateName(form.name))
        error_msg = "Name can only contain aplhabets and spaces, and max 30 characters long";
    if (!validateEmail(form.email))
        error_msg = "Invalid email";
    if (!validatePhone(form.phone))
        error_msg = "Phone number can only contain digits";
    if (!validateAddress(form.address))
        error_msg = "Invalid address";
    return error_msg;

}
