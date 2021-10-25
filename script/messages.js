function registerSucMsg(user) {
    alert("Successfully registered: " + user);
}

function loginSucMsg(user) {
    alert("Successfully login: " + user);
}

function loginFailMsg() {
    alert("Login Unsuccesful.");
}

function addCartSucMsg(item) {
    if (item) {
        alert("Successfully added to cart: " + item);
    }
}