$(document).ready(function(){
    $("#back").click(function(){
        window.location = "add.php";
    });

    $("#add").click(function(){
        let select = $("#vybor").val();
        let name = $("#name").val();

        if(select == "0"){
            return false;
        } else {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', "../models/add_some.php?select=" + select + "&name=" + name);
            xhr.send();

            xhr.onreadystatechange = function(){
                if(xhr.readyState != 4){
                    return;
                }

                if(xhr.status == 200){
                    $("#out").html(xhr.responseText);
                }
            }
        }

        return false;
    });
})