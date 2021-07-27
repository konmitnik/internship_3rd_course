$(document).ready(function(){
    $("#back").click(function(){
        window.location = "index.php";
    });

    $("#delete_btn").click(function(){
        let course = $("#course").val();

        let xhr = new XMLHttpRequest();
        xhr.open('GET', '../models/delete_course.php?course=' + course);
        xhr.send();

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