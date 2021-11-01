function Drawline(w = 500, h = 500){
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(function(){drawChart(w, h);});

    function drawChart(w=500, h=500) {
        var data = google.visualization.arrayToDataTable([
            ['Tuần', 'Doanh số', 'Chi phí'],
            ['1',  1500000,      400000],
            ['2',  1170000,      46000],
            ['3',  660000,       112000],
            ['4',  1030000,      54000]
        ]);

        var options = {
            width: w,
            height: h
        };

        var chart = new google.visualization.LineChart(document.getElementById('myCanvas'));

        chart.draw(data, options);
    }
}

function click_title(element, element2){
    if(screen.width <= 950){
        if(element.value.value == 0){
            element.value.style.display = "block";
            element.value.value = 1;
            if(element2.value.value == 1){
                element2.value.style.display = "none";
                element2.value.value = 0;
            }
        }
        else if(element.value.value == 1){
            element.value.style.display = "none";
            element.value.value = 0;
        }
    }
    else{
        console.log("else");
    }
}
var form = document.querySelectorAll("form");
var title_click = document.querySelectorAll("h4");
for(var i = 0, len = form.length; i < len; i++){
    title_click[i].value = form[i];
    form[i].value = 0;
}
Drawline(950, 500);
title_click[0].addEventListener("click", function(){click_title(title_click[0],title_click[1]);});
title_click[1].addEventListener("click", function(){click_title(title_click[1],title_click[0]);});
