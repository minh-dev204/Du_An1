
function toggleOpenClose() {
    var out = document.getElementById('out');
    if(out.style.display === "block") {
      out.style.opacity = 0;
      setTimeout(function() {
        out.style.display = "none";
      }, 300);
    } else {
      out.style.display = "block";
      setTimeout(function() {
        out.style.opacity = 1;
      }, 100);
    }
  }


// sk khi click vào danh mục đổi màu
const li_dm = document.querySelectorAll(".sub_menu_listdm ul li");
// duyệt tất cả li bằng vòng lặp forEach
li_dm.forEach(function(li) {
    // tạo sự kiện click cho tất cả thẻ li
    li.addEventListener("click",function(e) {
        // duyệt lại li_dm nếu có cái nào đang thêm class thì xóa nó
        li_dm.forEach(function (deleClass) {
           deleClass.classList.remove("li_sub_menu");
        })
        // tại sk click khi click vào thì thêm class
       e.currentTarget.classList.add("li_sub_menu");
    })
})