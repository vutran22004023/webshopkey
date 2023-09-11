// Lấy tất cả các phần tử có class "viewd"
var links = document.querySelectorAll(".viewd");

// Gắn sự kiện "click" cho tất cả các phần tử có class "viewd"
links.forEach(function(link) {
  link.addEventListener("click", function(event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của việc click (ví dụ: chuyển hướng đến URL)

    // Thêm mã JavaScript bạn muốn thực hiện sau khi click vào đây
  });
});
