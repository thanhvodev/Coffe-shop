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
        },
        vAxis: {
            format: 'decimal',
        }
    }
    return options;
}
function getData(list1, list2, list3){
    const list = [];
    for (let index = list1.length - 1; index >= 0; index--) {
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
//-----------------------//
function clickNext(n){
    if(n > 1){
        let str = "<div class=\"prev\"><i class=\"fas fa-angle-double-left\"></i></div>";
        for(var i = 1; i <= n; i++){
            str += "<div class=\"item\">" + i + "</div>";
        }
        str +=  "<div class=\"prev\"><i class=\"fas fa-angle-double-right\"></i></div>";
        return str;
    }
    return "";
}
function call_clickNext(old_element, element, parentNode, table, listTitle, listTime, listBill, listRevenue, listFee){
    old_element.style.backgroundColor = "white";
    element.style.backgroundColor = "rgb(240, 218, 218)";
    parentNode.childNodes[0].value = element.value - 1;
    parentNode.childNodes[parentNode.childNodes.length - 1].value = element.value + 1;
    table.innerHTML = get_innerHTML(get_Head(listTitle), get_Body(Dateformat(listTime[element.value - 1]), listBill[element.value-1], Priceformat(listRevenue[element.value - 1]), Priceformat(listFee[element.value - 1])));
    return element;
}
function call_clickNode(old_element, element, parentNode, table, listTitle, listTime, listBill, listRevenue, listFee){
    if(element.value >= 1 && element.value < parentNode.childNodes.length - 1){
        return call_clickNext(old_element, parentNode.childNodes[element.value], parentNode, table, listTitle, listTime, listBill, listRevenue, listFee);    
    }
    return old_element;
}
//----------------------//
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
//------------------------//
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
function getDay_inMonth(element){
    let str = "";
    let liststr = [];
    let listcount = [];
    let count = [];
    for (let index = 0; index <= element.length; index++) {
        if(index < element.length){
            if(str != element[index].split('-')[1]){
                if(str != "")
                    listcount[listcount.length] = count;
                str = element[index].split('-')[1];
                liststr[liststr.length] = Number(str);
                count = [];
            }
            count[count.length] = element[index];
        }
        else{
            listcount[listcount.length] = count;
        }
    }
    return [liststr, listcount];
}
function classify(element){
    var listYear = [];
    var str = "";
    var listDay = [];
    for(var index = 0; index <= element.length; index++){
        if(index < element.length){
            if(str != element[index].split('-')[0]){
                if(str != "") listYear[listDay.length] = [str, getDay_inMonth(listDay)];
                str = element[index].split('-')[0];
                listDay = [];
            }
            listDay[listDay.length] = element[index];
        }
        else{
            listYear[listYear.length] = [str, getDay_inMonth(listDay)];
        }
    }
    return listYear;
}
function Sum_money(element1, list){
    var lreturn = [];
    var listprice = [];
    var listpricetotal = [];
    var indexelement = 0;
    for (let index = 0; index < list.length; index++) {
        total = 0;
        for(var i = 0; i < list[index].length; i++){
            listprice[listprice.length] = element1[indexelement];
            total += element1[indexelement];
            indexelement += 1;
        }
        lreturn[lreturn.length] = total;
        listpricetotal[listpricetotal.length] = listprice;
        listprice = [];
    }
    return [lreturn, listpricetotal];
}
function getBIll_inMonth(element, list){
    var listreturn = [];
    var node = [];
    var indexelement = 0;
    for (let index = 0; index < list.length; index++) {
        for (let j = 0; j < list[index].length; j++) {
            node[node.length] = element[indexelement];
            indexelement += 1;
        }
        listreturn[listreturn.length] = node;
        node = [];
    }
    return listreturn;
}
function label_Month(element){
    let list = [];
    for (let index = 0; index < element.length; index++) {
        list[list.length] = "Tháng " + element[index];
    }
    return list;
}
///////////////////////
function getWeekNumber(element) {
    const d = new Date(element.split('-')[0], element.split('-')[1], element.split('-')[2]);
    d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));

    var yearStart = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
    var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
    return weekNo;
}
function getDay_inWeek(element){
    let str = "";
    let liststr = [];
    let listcount = [];
    let count = [];
    for (let index = 0; index <= element.length; index++) {
        if(index < element.length){
            if(str != getWeekNumber(element[index])){
                if(str != "")
                    listcount[listcount.length] = count;
                str = getWeekNumber(element[index]);
                liststr[liststr.length] = Number(str);
                count = [];
            }
            count[count.length] = element[index];
        }
        else{
            listcount[listcount.length] = count;
        }
    }
    return [liststr, listcount];
}
function label_Week(element){
    let list = [];
    for (let index = 0; index < element.length; index++) {
        list[list.length] = "Tuần " + element[index];
    }
    return list;
}
//--------------------------------//
function Drawline_option(label_display, chartLine, listTime, listRevenue, listFee, func){
    var width = chartLine.offsetWidth;
    if(width < 600) width = 600;
    Drawline(getoption(width, label_display.toLowerCase()), label_display, getData(func(listTime), listRevenue, listFee), chartLine);
}
function Table_option(table, list_Title, listTime, listBill, listRevenue, listFee){
    table.innerHTML = get_innerHTML(get_Head(list_Title), get_Body(Dateformat(listTime), listBill, Priceformat(listRevenue), Priceformat(listFee)));
}
function next_click_option(next_click, table, lengthnext, list_Title, listTime, listBill, listRevenue, listFee){ 
    next_click.innerHTML = clickNext(lengthnext);
    var next_clicked_button = next_click.childNodes[1];
    if(next_click.childNodes.length > 1){
        next_click.childNodes[1].style.backgroundColor = "#f0dada";
        for (let index = 1; index < next_click.childNodes.length - 1; index++) {
            next_click.childNodes[index].value = index;
            next_click.childNodes[index].addEventListener("click", function(){
                                        next_clicked_button =  call_clickNext(next_clicked_button, next_click.childNodes[index],  next_click, table, list_Title, 
                                                                            listTime, listBill, listRevenue, listFee)
                                        });
        }
        next_click.childNodes[0].value = 0;
        next_click.childNodes[0].addEventListener("click", function(){ next_clicked_button = call_clickNode(next_clicked_button, next_click.childNodes[0], next_click, table,
                                                                                        list_Title, listTime, listBill, listRevenue, listFee)
                                                                                    });
        next_click.childNodes[next_click.childNodes.length - 1].value = 2;
        next_click.childNodes[next_click.childNodes.length - 1].addEventListener("click", function(){next_clicked_button = call_clickNode(next_clicked_button, next_click.childNodes[next_click.childNodes.length - 1], 
                                                                                                    next_click, table, list_Title, listTime, listBill, 
                                                                                                    listRevenue, listFee)
                                                                                                });
    }
}
//function option_Week(list_Title, listTime, listBill, listRevenue, listFee){
    
//}
//--------------------------------//
const listTitle = ["Ngày", "Số hóa đơn", "Doanh số (VND)", "Chi phí (VND)"];
var listTime = ["2021-11-18", "2021-11-17", "2021-11-16", "2021-11-15", "2021-11-14", 
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
var listTime_month = getDay_inMonth(listTime);
var listRevenue_month = Sum_money(listRevenue, listTime_month[1]);
var listFee_month = Sum_money(listFee, listTime_month[1]);
var listBill_month = getBIll_inMonth(listBill, listTime_month[1]);

var listTime_week = getDay_inWeek(listTime);
var listRevenue_week = Sum_money(listRevenue, listTime_week[1]);
var listFee_week = Sum_money(listFee, listTime_week[1]);
var listBill_week = getBIll_inMonth(listBill, listTime_week[1]);

//       Draw chart
var chartLine = document.getElementById('chartLine');
Drawline_option("Tháng", chartLine, listTime_month[0], listRevenue_month[0], listFee_month[0], label_Month);
//  Default table
var table = document.getElementById("table");
var next_click = document.getElementById("next");
Table_option(table, listTitle, listTime_week[1][0], listBill_week[0], listRevenue_week[1][0], listFee_week[1][0]);
next_click_option(next_click, table, listTime_week[0].length, listTitle, listTime_week[1], listBill_week, listRevenue_week[1], listFee_week[1]);

// Display chart
var displaychart = chartLine.parentNode.querySelectorAll('li');
displaychart[0].childNodes[0].addEventListener("click", function(){
        Drawline_option(displaychart[0].childNodes[0].innerText, chartLine, listTime_week[0], listRevenue_week[0], listFee_week[0], label_Week);
    });
displaychart[1].childNodes[0].addEventListener("click", function(){
        Drawline_option(displaychart[1].childNodes[0].innerText, chartLine, listTime_month[0], listRevenue_month[0], listFee_month[0], label_Month);
    });
// Display table
var displayTable = table.parentNode.querySelectorAll('li');
displayTable[0].childNodes[0].addEventListener("click", function(){    
        Table_option(table, listTitle, listTime_week[1][0], listBill_week[0], listRevenue_week[1][0], listFee_week[1][0]);
        next_click_option(next_click, table, listTime_week[0].length, listTitle, listTime_week[1], listBill_week, listRevenue_week[1], listFee_week[1]);
    });
displayTable[1].childNodes[0].addEventListener("click", function(){    
        Table_option(table, listTitle, listTime_month[1][0], listBill_month[0], listRevenue_month[1][0], listFee_month[1][0]);
        next_click_option(next_click, table, listTime_month[0].length, listTitle, listTime_month[1], listBill_month, listRevenue_month[1], listFee_month[1]);
    });

//var h2 = document.getElementsByTagName("h2");
//console.log(h2[3].childNodes);

//displaychart.forEach(element => element.addEventListener("click", ))
var click_form = document.getElementsByClassName("click");
var listtype = [];
listtype = getlistType();
console.log(listtype);
var datatype = document.getElementById("datatype");
datatype.innerHTML = option(listtype);

click_form[0].addEventListener("click", function(){ getTime(click_form[0]);});
click_form[1].addEventListener("click", function(){ getValue(click_form[1], listtype);});
//////////////////////