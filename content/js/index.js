
// ****** shoping cart
// dùng dom
var arr = [];
const bnt = document.querySelectorAll(".buyNow1");
bnt.forEach(function (button) {
    button.addEventListener("click", function (event) {
        button.classList.add("clicked"); //đổi màu button khi click
        setTimeout(function() {  //tạo cái hàm setimeout để khi click thì 0.5s sau sẽ xóa class clikded
            button.classList.remove("clicked");
        },500);
        var EventItems = event.target;
        var Products = EventItems.parentElement.parentElement.parentElement.parentElement;
        var ProductImg = Products.querySelector(".anh_chitiet img").src;
        var ProductName = Products.querySelector(".thongTin_SP h1").innerText;
        var ProductPrice = Products.querySelector(".Gia .price_SP").innerText;
        // var Products = EventItems.parentElement.parentElement.parentElement;
        // var ProductImg = Products.querySelector("img").src;
        // var ProductName = Products.querySelector("p").innerText;
        // var ProductPrice = Products.querySelector("span").innerText;
        var list = [ProductImg, ProductName, ProductPrice];
        
        arr.unshift(list);
        count();
        // console.log(arr);
        sessionStorage.setItem("sanpham_DuAn", JSON.stringify(arr));
        addCart();
        addCart_submenu();
    })
})

function addCart() {
    var cartTable = document.querySelector(".listSP");
    // console.log(cartTable);
    cartTable.innerHTML = "";
    var arr = JSON.parse(sessionStorage.getItem("sanpham_DuAn"));
    // logo
    if(arr.length === 0) {
       const messagerImgIcon = document.getElementById("main_messager");
       messagerImgIcon.style.display = "block";
    }else {
    for (let i = 0; i < arr.length; i++) {
        const messagerImgIcon = document.getElementById("main_messager");
        messagerImgIcon.style.display = "none";

        var addtr = document.createElement("div");
        addtr.setAttribute("class", "list");

        var trcontent =
            '<div class="SP1"><input id="checkbox" type="checkbox"></div>' +
            '<div class="SP2"><img width="80px" src="' + arr[i][0] + '" alt=""></div>' +
            '<div class="SP3">' + arr[i][1] + '</div>' +
            '<div class="SP4">' + arr[i][2] + '</div>' +
            '<div class="SP5"><input id="value" type="number" value="1"></div>' +
            '<div class="SP6"><span id="tien1">0</span></div>' +
            '<div class="SP7"><button onclick="removeItem(' + i + ')">Xóa</button></div>';
        addtr.innerHTML = trcontent
        cartTable.append(addtr);

    }
    tongTien();
    count()
}
}
// xóa sp
function removeItem(index) {
    var arr = JSON.parse(sessionStorage.getItem("sanpham_DuAn"));
    arr.splice(index, 1);
    sessionStorage.setItem("sanpham_DuAn", JSON.stringify(arr));
    addCart();
    // count()
}

//tính tổng tiền
function tongTien() {
    var elementList = document.querySelectorAll(".list");
    var tong = 0;
    // var price = 0;
    for (var i = 0; i < elementList.length; i++) {
        var inputValue = elementList[i].querySelector("#value").value
        // console.log(inputValue);
        var inputPrice = elementList[i].querySelector(".SP4").innerHTML
        var price = inputValue * inputPrice;
        tong = tong + price;

        //tính tiền của mỗi sản phẩm
        var spanElement = elementList[i].querySelector("#tien1");
        spanElement.innerText = price
    }
    var cartTotal = document.querySelector(".tongtien");
    cartTotal.innerText = tong;
    inputChange();
}

// hàm thay đổi số lượng input
function inputChange() {
    var elementList = document.querySelectorAll(".list");
    for (let i = 0; i < elementList.length; i++) {
        var inputValue = elementList[i].querySelector("#value");
        inputValue.addEventListener("change",function() {
            tongTien();
        })
        
    }
}




// đếm số lượng sp
function count() {
    document.getElementById("count").innerHTML = arr.length
    // Lưu số lượng sản phẩm vào sessionStorage
    sessionStorage.setItem("countItem1", arr.length)
}

// hiện sản phẩm sau khi load
window.addEventListener("load", function () {
    if (sessionStorage.getItem("sanpham_DuAn")) {
        arr = JSON.parse(sessionStorage.getItem("sanpham_DuAn"));
        addCart(); // cập nhật lại giỏ hàng vs dữ liệu đã lấy từ sessionStorage
    }

});

window.addEventListener("load", function () {
    if (this.sessionStorage.getItem("countItem1")) {
        var cartItemCount = sessionStorage.getItem("countItem1");
        document.getElementById("count").innerHTML = cartItemCount
        count(); //cập nhật lại số lượng spF
    }
})


// sự kiện chuyển trang
const cartItem = document.querySelector("#ul_cart");
cartItem.addEventListener("click", function () {
    window.location.href = 'index.php?act=giohang';
})


// thêm sản phẩm vào phần index logo cart
function addCart_submenu() {
    var ul_submenu_cart = document.querySelector(".ul_submenu_cart");
    ul_submenu_cart.innerHTML = "";

    var arr = JSON.parse(sessionStorage.getItem("sanpham_DuAn"));
    var displayLimit = Math.min(arr.length,5); // hiện thị tối đa 5 sp

    if(arr.length === 0) { // nếu mảng sp = 0 thì hiện thông báo
        var messger = document.getElementById("messger");
        messger.style.display = "block";
    }
    else { 
    for (let i = 0; i < displayLimit; i++) {
        var messger = document.getElementById("messger");
        messger.style.display = "none";

        var createLi = document.createElement("li");
        createLi.setAttribute("class","li_submenu_cart");

        var subIcon = '  <img src="'+arr[i][0]+'" alt="">' +
        '<div class="name_sub_cart">'+arr[i][1]+'</div>' +
        '<div class="price_sub_cart">'+arr[i][2]+"đ"+'</div>';

        createLi.innerHTML = subIcon;
        ul_submenu_cart.append(createLi);
        
    }
}
}

// sk hover vào logo thì xuất giỏ hàng đã lưu ra
const logo_cart = document.querySelector(".ul_logo .cart");
console.log(logo_cart);
logo_cart.addEventListener("mouseover", function() {
    if (sessionStorage.getItem("sanpham_DuAn")) {
        arr = JSON.parse(sessionStorage.getItem("sanpham_DuAn"));
        addCart_submenu();
    }
});







