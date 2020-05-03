function openLoginForm() {
    closeRegisterForm()
    document.getElementById("loginForm").style.display = "block";
}

function closeLoginForm() {
    document.getElementById("loginForm").style.display = "none";
}

function openRegisterForm() {
    closeLoginForm()
    document.getElementById("registerForm").style.display = "block";
}

function closeRegisterForm() {
    document.getElementById("registerForm").style.display = "none";
}
