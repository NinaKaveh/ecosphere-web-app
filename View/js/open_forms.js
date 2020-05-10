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

function openArticle(id) {
    const y = document.getElementsByClassName("article-popup");
    const x = document.getElementsByClassName("article-popup-closer");

    let i;
    for (i = 0; i < y.length; i++) {
        y[i].style.display = 'none';
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = 'block';
    }
    document.getElementById(id).style.display = "block";
    document.getElementById("footer").style.opacity = "0.5";
    window.location.href = '#main';
    x[0].style.display = 'block';

}

function closeArticle() {
    const x = document.getElementsByClassName("article-popup-closer");
    const y = document.getElementsByClassName("article-popup");
    let i;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = 'none';
    }
    for (i = 0; i < y.length; i++) {
        y[i].style.display = 'none';
    }
    document.getElementById("footer").style.opacity = "1";

}
