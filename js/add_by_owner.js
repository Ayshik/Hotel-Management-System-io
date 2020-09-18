var form = document.forms.add_by_owner;
var uname = document.getElementById("uname");

form.onload = check_username();
  
function check_username(){
uname.onblur =function(){

    var name=uname.value.toUpperCase();
    var param="name="+name;
    var xhr =new XMLHttpRequest();
    xhr.open('POST','../check_username_ajax.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(param);
    xhr.onload = function(){
        if(this.status == 200){
            document.getElementById("uname_err").innerHTML = this.responseText;
        }else if(this.status == 404){
          console.log("404 - NOT FOUND");
        }
      };
};
}
