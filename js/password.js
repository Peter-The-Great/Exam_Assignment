// document.getElementById("generate").onclick = genPassword();
//document.getElementById("copy").onclick = copyPassword();
//Generate a password, made either form numbers, letters or other charchters
function genPassword() {
    let chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let passwordLength = 16;
    let password = "";
    //keep adding a random charcter until the password lenght is filled.
    for (let i = 0; i <= passwordLength; i++) {
        let randomchar = Math.round(Math.random() * chars.length);
        password += chars.substring(randomchar, randomchar +1);
    }
    document.getElementById("password").value = password;
}
//Copy the password to a clipboard
function copyPassword() {
    let copyText = document.getElementById("password");
    copyText.select();
    copyText.setSelectionRange(0, 999);
    navigator.clipboard.writeText(copyText.value);
    console.log(JSON.stringify(copyText));
}