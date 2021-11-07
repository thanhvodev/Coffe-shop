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
        height: 700,
        legend: {position: 'bottom'},
        textStyle: {
            fontName: 'Times-Roman',
            fontSize: 22,
            bold: true
        },
        vAxis: {
            format: 'decimal',
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

function option(element){
    let str = "";
    element.forEach(element => {str += "<option value=\"" + element + "\">"; });
    return str;
}

function getTime(element){
    var timer = element.parentNode.parentNode.getElementsByTagName("input");
    console.log(timer[0].value);
    console.log(timer[1].value);
}//
function getValue(element, list){
    var value = element.parentNode.parentNode.getElementsByTagName("input");
    var index = 0;
    list.forEach(element => {
        if (element == value[1].value) index = 1;
    }); 
    if (index == 0){
        list[list.length] = value[1].value;
        datatype.innerHTML = option(list);
    }
}//
function getlistType(){
    return ["Cafe", "Trà"];
}//
function Dateformat(element){
    var list = [];
    for(var i = 0; i < element.length; i++){
        var str = element[i].split('-');
        var nodestr = str[2] + "/" + str[1] + "/" + str[0];
        list.push(nodestr);
    }
    return list;
}
function Priceformat(element){
    var list = [];
    for(var i = 0; i < element.length; i++){
        var temp = String(element[i]);
        let nodestr = "";
        for(var j = temp.length; j > 3; j -= 3){
            nodestr = "," + temp[j-1] + temp[j-2] + temp[j-3] + nodestr;
        }
        if (temp .length % 3 == 0){
            nodestr = temp[0] + temp[1] + temp[2] + nodestr;
        }
        else if(temp.length % 3 == 2){
            nodestr = temp[0] + temp[1] + nodestr;
        }
        else nodestr = temp[0] + nodestr;
        list.push(nodestr);
    }
    return list;
}
function getMonth(element){
    let str = "";
    let liststr = [];
    let listcount = [];
    let count = 0
    for (let index = 0; index <= element.length; index++) {
        if(index < element.length){
            if(str != element[index].split('-')[1]){
                str = element[index].split('-')[1];
                liststr[liststr.length] = Number(str);
                listcount[listcount.length] = count;
                count = 0;
            }
            count += 1;
        }
        else{
            listcount[listcount.length] = count;
        }
    }
    return [liststr, listcount];
}
function totalPriceinMonth(element1, list){
    var lreturn = [];
    var indexelement = 0;
    for (let index = 1; index < list.length; index++) {
        total = 0;
        for(var i = 0; i < list[index]; i++){
            total += element1[indexelement];
            indexelement += 1;
        }
        lreturn[lreturn.length] = total;
    }
    return lreturn;
}
function displayMonth(element){
    let list = [];
    for (let index = 0; index < element.length; index++) {
        list[list.length] = "Tháng " + element[index];
    }
    return list;
}
///////////////////////
const listTitle = ["Ngày", "Số hóa đơn", "Doanh số (VND)", "Chi phí (VND)"];
var listTime_week = ["2021-11-18", "2021-11-17", "2021-11-16", "2021-11-15", "2021-11-14", 
                     "2021-11-13", "2021-11-12", "2021-11-11", "2021-10-18", "2021-10-17", 
                     "2021-10-16", "2021-10-15", "2021-10-14", "2021-10-13", "2021-10-12", 
                     "2021-10-11", "2021-10-10", "2021-09-18", "2021-09-17", "2021-09-16", 
                     "2021-09-15", "2021-09-14", "2021-09-13", "2021-09-12", "2021-09-11", 
                     "2021-08-10", "2021-07-09", "2021-06-20"
                    ];
const listBill = [30, 20, 100, 10, 80,
                  60, 120, 180, 100, 234,
                  78, 68, 102, 56, 290,
                  12, 43, 56, 76, 25,
                  33, 65, 69, 55, 66,
                  120, 212, 233
                ];
const listRevenue = [1000, 2000, 100, 500, 1000, 
                     1999, 2311, 2424, 2199, 2323, 
                     1232, 2131, 1232, 2131, 1000, 
                     2000, 100, 500, 1000, 1999, 
                     2311, 2424, 2199, 2323, 1232, 
                     2131, 1232, 2131
                    ];
const listFee = [300, 1000, 50, 50, 70, 
                 194, 221, 234, 1119, 232, 
                 234, 1119, 122, 331, 100, 
                 800, 1000, 500, 700, 194, 
                 221, 234, 1119, 232, 234, 
                 1119, 122, 331
                ];

for (let index = 0; index < 28; index++) {
    listRevenue[index] *= 1000;
    listFee[index] *= 1000;
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

Drawline(getoption(width, "tháng"), "Tháng", getData(displayMonth(getMonth(listTime_week)[0]), totalPriceinMonth(listRevenue, getMonth(listTime_week)[1]), totalPriceinMonth(listFee, getMonth(listTime_week)[1])), chartLine);

console.log(getMonth(listTime_week));
console.log(totalPriceinMonth(listRevenue, getMonth(listTime_week)[1]));
var table = document.getElementById("table");
table.innerHTML = get_innerHTML(get_Head(listTitle), get_Body(Dateformat(listTime_week), listBill, Priceformat(listRevenue), Priceformat(listFee)));




////////////
var displaychart = chartLine.parentNode.querySelectorAll('li');

var next_click = document.getElementById("next");
console.log(next_click.children);
next_click.children[1].style.backgroundColor = "blue";
//displaychart.forEach(element => element.addEventListener("click", ))
var click = document.getElementsByClassName("click");
var listtype = [];
listtype = getlistType();
console.log(listtype);
var datatype = document.getElementById("datatype");
datatype.innerHTML = option(listtype);

click[0].addEventListener("click", function(){ getTime(click[0]);});
click[1].addEventListener("click", function(){ getValue(click[1], listtype);});
//////////////////////