function checkbyATMcard(){
    if (document.getElementById("byATMcard").checked){
        document.getElementById('guide').innerHTML = "&emsp;Quý khách vui lòng gửi chuyển khoản đủ tổng tiền \
         cần thanh toán vào Ngân hàng ABC. <br> \
         &emsp;Số tài khoản của cửa hàng: xxxxxxxxxxx <br><br>\
         &emsp;Sau khi chuyển khoản thành công, quý khách vui lòng chụp lại màn hình giao dịch và tải lên đây:<br><br>";
         document.getElementById('uploadimg').innerHTML = "<input type=\"file\" id=\"chooseimg\"></input>";
    }
}
function checkbycash(){
    if (document.getElementById("bycash").checked){
        document.getElementById('guide').innerHTML = "";
        document.getElementById('uploadimg').innerHTML = "";
    }
}
function succeeded(){
    alert("Bạn đã đặt hàng thành công! Đồ uống sẽ được giao đến trong vài phút.");
}
function failed(){
    arlert("Vui lòng điền đầy đủ và chính xác xác thông tin!")
}