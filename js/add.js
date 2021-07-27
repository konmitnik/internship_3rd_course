$(document).ready(function(){
    /*$("#back").click(function(){
        window.location = "index.php";
    });*/

    $("#add_something").click(function(){
        window.location = "add_some.php";
    });

    $("#add_btn").click(function(){
        let name = $("#name").val();
        let teach = Number($("#teach").val());
        let lang = Number($("#lang").val());
        let price = Number($("#price").val());
        let description = $("#desc").val();

        if(name == "" || price < 0 ){
            return false;
        }

        let data = {
            name,
            teach,
            lang,
            price,
            description
        }
        data = JSON.stringify(data);
        console.log(data);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', '../models/add_course.php', true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send(data);

        xhr.onreadystatechange = function(){
            if(xhr.readyState != 4){
                return;
            }

            if(xhr.status == 200){
                $("#out").html(xhr.responseText);
                console.log(xhr.responseText);
                setTimeout(function(){
                    window.location = "index.php";
                }, 1000);
            }
        }

        return false;
    });
})