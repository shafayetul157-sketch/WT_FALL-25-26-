function submitForm(){
let fullName = document.getElementById("username");
let email = document.getElementById("email");
let phoneNumber = document.getElementById("PhoneNumber");
let pass = document.getElementById("password");
let confirmPass = document.getElementById("confirm-pass");
let msg = document.getElementById("message");

if(fullName.value ==="" || email.value === "" || phoneNumber.value=== "" || pass.value=== "" || confirmPass.value  === ""){
    alert("All fields are required");
    return;
}

if(pass.value != confirmPass.value){
    alert("Passwords donot match");
    return false;
}

msg.style.display = "block";
msg.style.color = "Green";
msg.innerHTML= 
`
<b>Registration Successful</b>;

Name: ${fullName.value} ; 

Email: ${email.value}; 
Phone:${phoneNumber.value}`;

return false;

   