// hiện thị lớp overlay
function overlay() {
    var overlay = document.getElementById("overlay");
    overlay.style.display = "block";
    setTimeout(function() {
    overlay.style.opacity = 1;
    },300);
}

// hiện thị thông báo mua hàng thành công
function Mesenger_pay() {
    var out = document.getElementById("Mesenger_thongBao");
    console.log(out);
    if(out.style.display === "block") {
        out.style.opacity = 0;
        setTimeout(function() {
            out.style.display = "none";
        },300);
    }else {
        out.style.display = "block";
        setTimeout(function() {
            out.style.opacity = 1;
        },300);
        overlay();
    }
}

// load lại trang khi click ok
function loadWhenClickOK() {
    location.reload();
    window.location.href = 'index.php';
}

// logout sessionStorge
function logOut() {
    sessionStorage.clear();
    location.reload();
}