function Drawline(options, str, listData, id){
    google.charts.load('current', {'packages':['corechart', 'line']});
    google.charts.setOnLoadCallback(function(){drawChart(options, str, listData, id);});
    function drawChart(options, str, datal, id) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', "");
        data.addColumn('number', 'Doanh số');
        data.addColumn('number', 'Chi phí');
        data.addColumn('number', 'Lợi nhuận');

        data.addRows (datal);
        var chart = new google.charts.Line(id);
        chart.draw(data, google.charts.Line.convertOptions(options));
    }
}
function getoption(width, str){
    var options = {
        title: 'Doanh số cửa hàng theo ' + str,
        subtitle: 'Tổng cộng (VND)',
        width: width,
        height: 500,
        legend: {position: 'bottom'},
        textStyle: {
            fontName: 'Times-Roman',
            fontSize: 22,
            bold: true
        }
    }
    return options;
}
function getData(list1, list2, list3){
    const list = [];
    for (let index = 0; index < list1.length; index++) {
        const element = [];
        element.push(list1[index]);
        element.push(list2[index]);
        element.push(list3[index]);
        element.push(list2[index] - list3[index]);
        list.push(element);
    }
    return list;
}
//----------------------//
function ttable(element){
    return "<table class=\"table table-striped \">" + element + "</table>";
}
function thead(element){
    return "<thead>" + element + "</thead>";
}
function tbody(element){
    return "<tbody>" + element + "</tbody>";
}
function tr(element){
    return "<tr>" + element + "</tr>";
}
function th(element){
    return "<th>" + element + "</th>";
}
function td(element){
    return "<td>" + element + "</td>";
}
function get_Head(lelement){
    let element = "";
    element += th(lelement[0]);
    element += th(lelement[1]);
    element += th(lelement[2]);
    element += th(lelement[3]);
    return thead(tr(element));
}
function get_partBody(element1, element2, element3, element4){
    let element = "";
    element += td(element1);
    element += td(element2);
    element += td(element3);
    element += td(element4);
    return tr(element);
}
function get_Body(list1, list2, list3, list4){
    let body = "";
    for (let index = 0; index < list1.length; index++) {
        body += get_partBody(list1[index], list2[index], list3[index], list4[index]);
    }
    return tbody(body);
}
function get_innerHTML(head, body){
    let str = head + body;
    return ttable(str);
}
///////////////////////
/*function change_Display(element){
    let string = element.children[0].innerText;
}*/
///////////////////////
const listTitle = ["Ngày", "Số hóa đơn", "Doanh số", "Chi phí"];
const listTime_week = [];
const listBill = [];
const listRevenue = [1000, 2000, 100, 500, 1000, 1999, 2311, 2424, 2199, 2323, 1232, 2131, 1232, 2131, 1000, 2000, 100, 500, 1000, 1999, 2311, 2424, 2199, 2323, 1232, 2131, 1232, 2131];
const listFee = [300, 1000, 50, 50, 70, 194, 221, 234, 1119, 232, 234, 1119, 122, 331, 100, 800, 1000, 500, 700, 194, 221, 234, 1119, 232, 234, 1119, 122, 331];
for (let index = 0; index < 28; index++) {
    listTime_week.push("Tuần " + (index + 1));
    listBill.push(30);
}

var width = screen.availWidth;
if(width > 1200){
    width *= 0.7;
}
else if(width > 500){
    width *= 0.9;
}
else{
    width = 500;
}
var chartLine = document.getElementById('chartLine');
var displaychart = chartLine.parentNode.querySelectorAll('li');

var next_click = document.getElementById("next");
console.log(next_click.children);
next_click.children[1].style.backgroundColor = "blue";
//displaychart.forEach(element => element.addEventListener("click", ))
Drawline(getoption(width, "tuần"), "Tuần", getData(listTime_week, listRevenue, listFee), chartLine);

var table = document.getElementById("table");
table.innerHTML = get_innerHTML(get_Head(listTitle), get_Body(listTime_week, listBill, listRevenue, listFee));
