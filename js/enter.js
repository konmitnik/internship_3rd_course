$(document).ready(function(){
    $("#sub").click(function(){
        let email = $("#email").val();
        let pass = $("#pass").val();

        let data = {
            email : email,
            pass : pass
        }
        data = JSON.stringify(data);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', '../models/get_user.php', true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send(data);

        xhr.onreadystatechange = function(){
            if(xhr.readyState != 4){
                return;
            }
    
            let response = JSON.parse(xhr.responseText);
            
            if(xhr.status == 200){
                if(response == null){
                    $('#out').html("Невырный логин/пароль");
                } else {
                    window.location = "../views/";
                }
            }
        }

        return false;
    });

    $("#back").click(function(){
        window.location = "../views/";
    });
})