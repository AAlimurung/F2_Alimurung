// Programmer: Ana Alimurung
// for log in
document
    .getElementById("log-in-form")
    .addEventListener("submit", function(event){
        event.preventDefault();

        var username = document.getElementById("username").value;
        var password = document.getElementById("pass").value;

        if(username == "AnNi" && password == "12345"){
            alert("Signed in. Redirecting...");
            window.location.href = "about-us.html";
        } else {
            document.getElementById("err-msg").textContent = "Invalid username or password. Please try again.";
        }
    });