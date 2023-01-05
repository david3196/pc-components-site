const connectScreen = document.getElementById("connect-screen");
const accBox = document.getElementById("account-box");
const createAccountHTML = `
    <div class="account-box" id="signup">
    <div class="xbtn">&times;</div>
    <h4>ÎNREGISTRARE</h4>
    <form method="post" action="signup.php">
        <input type="email" class="Email" id="Email-0" placeholder="exemplu@gmail.com" name="email">
        <input type="text" class="Name" id="name" placeholder="Prenume" name="name">
        <input type="text" class="Surname" id="surname" placeholder="Nume (optional)" name="surname">
        <input type="password" class="Pass" id="Pass-0-1" placeholder="Parola" name="pass1">
        <input type="password" class="Pass" id="Pass-0-2" placeholder="Reintroduceți Parola" name="pass2">
        <input type="submit" id="button" value="Signup">
    </form>
    <div class="footer"><a id="tologin"href="#">Aveți deja cont? Conectați-vă!</a></div>
    </div>
`;
const logInHTML = `
    <div class="account-box" id="login">
    <div class="xbtn">&times;</div>
    <h4>CONECTARE</h4>
        <form method="post" action="login.php">
        <input type="email" class="Email" id="Email-1" placeholder="Email" name="email">
        <input type="password" class="Pass" id="Pass-1" placeholder="Parola" name="pass">
        <input type="submit" id="button" value="login">
    </form>
    <div class="footer"><a id="tocreateacc"href="#">Nu aveți cont? Înregistrați-vă!</a></div>
`;
const logoutHTML = `
    <div class="account-box" id="logout">
    <div class="xbtn">&times;</div>
    <h4>DECONECTARE</h4>
    <p>Sunteti conectat ca <?php echo $user_data['user_name']; ?></p>
    <a href="logout.php">Deconectare</a>
    </div>
`;
$(".navbar-menu").on("click", "#acc-btn", function(){
    connectScreen.style.display = "initial";
    if(connectScreen.innerHTML==""){
    connectScreen.innerHTML = logInHTML;}
})

window.onclick = function(event) {
    if(connectScreen.style.display == "initial"){
        if(event.target == connectScreen && event.target != accBox){
            connectScreen.style.display = "none";
        }
    }
}
$("#connect-screen").on("click",".xbtn", function(){
    connectScreen.style.display = "none";
})

$("#connect-screen").on("click", "#tocreateacc", function(){
    connectScreen.innerHTML = createAccountHTML;
})
$("#connect-screen").on("click", "#tologin", function(){
    connectScreen.innerHTML = logInHTML;
})