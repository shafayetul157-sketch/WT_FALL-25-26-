
function toogle(){

    let body = document.body;
    let title = document.getElementById("page");
    let button = document.getElementById("btn1");
    
if(body.style.backgroundColor==="black"){
    body.style.backgroundColor = "white";
    title.style.color= "black";
    title.innerHTML = "Light Mode";
    button.innerHTML = "Switch to Dark mode";
}
else{
    body.style.backgroundColor = "black";
    title.style.color= "white";
    title.innerHTML = "Dark Mode";
    button.innerHTML = "Switch to Light mode";

}    
}
