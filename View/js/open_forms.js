function openLoginForm() {
    document.getElementById("loginForm").style.display = "block";
    closeRegisterForm()
}

function closeLoginForm() {
    document.getElementById("loginForm").style.display = "none";
}

function openRegisterForm() {
    document.getElementById("registerForm").style.display = "block";
    closeLoginForm()
}

function closeRegisterForm() {
    document.getElementById("registerForm").style.display = "none";
}
