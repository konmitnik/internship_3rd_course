$(document).ready(function(){
    $("#back").click(function(){
        window.location = "index.php";
    });

    $("#update_btn").click(function(){
        let course = $("#course").val();
        let price = $("#price").val();
        let teach = $("#teach").val();
        let desc = $("#desc").val();

        let data = {
            course,
            price,
            teach,
            desc
        }
        data = JSON.stringify(data);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', '../models/update_course.php', true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send(data);

        xhr.onreadystatechange = function(){
            if(xhr.readyState != 4){
                return;
            }

            if(xhr.status == 200){
                $("#out").html(xhr.responseText);
            }
        }

        return false;
    });
})