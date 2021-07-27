$(document).ready(function(){
    $("#sub").click(function(){
        $("#out").empty();

        let name = $("#name").val();
        let email = $("#email").val();
        let pass = $("#pass").val();
        let repass = $("#repass").val();

        let name_bool = false;
        let email_bool = false;
        let pass_bool = false;
        let repass_bool = false;

        let q = /^[А-Яа-я]{2,32}$/i;
        if(name != "" && q.test(name) == true){
            name_bool = true;
        } else {
            $("#out").append("Неверно заполнено поле Имя<br>");
        }

        let dog = false;
        let dot = false;
        let dog_pos;
        let dot_pos;
        for(let i = 0; i < email.length; i++){
            if(email[i] == "@"){
                dog = true;
                dog_pos = i;
            }
            if(email[i] == "."){
                dot = true;
                dot_pos = i;
            }
        }
        if(email != "" && dog == true && dot == true && dog_pos < dot_pos){
            email_bool = true;
        } else {
            $("#out").append("Неверно заполнено поле Эл. почта<br>");
        }

        if(pass != "" && pass.length >= 6){
            pass_bool = true;
        } else {
            $("#out").append("Неверно заполнено поле Пароль<br>");
        }

        if(repass != "" && pass == repass){
            repass_bool = true;
        } else {
            $("#out").append("Неверно заполнено поле Повторите пароль<br>");
        }

        if(name_bool && email_bool && pass_bool && repass_bool){
            let data = {
                name : name,
                email : email,
                pass : pass
            }
            data = JSON.stringify(data);
            console.log(data);

            let xhr = new XMLHttpRequest();
            xhr.open('POST', '../models/register.php', true);
            xhr.setRequestHeader("Content-type", "application/json");
            xhr.send(data);

            xhr.onreadystatechange = function(){
                if(xhr.readyState != 4){
                    return;
                }
    
                let response = JSON.parse(xhr.responseText);
                console.log(xhr.responseText);
                
                if(xhr.status == 200){
                    if(response == "Null"){
                        $('#out').html("Не удалось зарегистрировать пользователя. Наверное указанный email уже используется.");
                    } else {
                        $('#out').html("<h2>Пользователь " + response.name + " успешно добавлен</h2>");
                    }
                }
            }
        }
        
        return false;
    });
})