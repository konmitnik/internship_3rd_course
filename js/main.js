$(document).ready(function(){
    $("#search_btn").click(function(){
        let teach = $("#teach").val();
        let lang = $("#lang").val();
        let search = $("#search_name").val();
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '../models/course_selector.php?teach=' + teach + "&lang=" + lang + "&text=" + search);
        xhr.send();

        xhr.onreadystatechange = function(){
            if(xhr.readyState != 4){
                return;
            }
            if(xhr.status == 200){
                //console.log(xhr.responseText);
                if(JSON.parse(xhr.responseText) == ""){
                    $(".catalog").html("Такого товара нет");
                } else {
                    let data = JSON.parse(xhr.responseText);
                    console.log(data);
                    $(".catalog").empty();
                    let k = 1;
                    let j = 1;
                    let o = j;
                    for(let i = 0; i < data.length; i++){
                        if(k == 1 || k % 4 == 1){
                            $(".catalog").append("<div class='rows' id='div" + j + "'>");
                            o = j;
                            j++;
                        }
                        $(`#div${o}`).append("<div class='good' id='good" + k + "'>");
                        $(`#good${k}`).append("<img src='../pict/" + data[i].pict + "'>");
                        $(`#good${k}`).append("<p>" + data[i].course_name + "</p>");
                        $(`#good${k}`).append("<p>" + data[i].price + " руб.</p>");
                        $(`#good${k}`).append("<button value='" + data[i].course_id + "' class='but but_style'>Подробнее</button>");
                        k++;
                    }

                    $(".but").click(function(){
                        window.location = "course.php?value=" + $(this).val();
                    });
                }
            }
        }
    });

    $("#unset").click(function(){
        window.location = "../models/unset.php";
    });

    $("#add").click(function(){
        window.location = "add_pict.php";
    });

    $("#delete").click(function(){
        window.location = "delete.php";
    });

    $("#update").click(function(){
        window.location = "update.php";
    });

    $(".but").click(function(){
        window.location = "course.php?value=" + $(this).val();
    });

    $("#enter").click(function(){
        window.location = "../users/";
    });
});