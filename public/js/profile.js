// Hiển thị tab Bộ sưu tập - Start
// Hàm mở tab với tham số mặc định là "created" (Đã tạo)
function openTab(evt, tabName = "created") {
    var i, tabcontent, tablinks;

    // Ẩn tất cả nội dung tab
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Loại bỏ lớp "active" từ tất cả các tablinks
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }

    // Hiển thị nội dung của tab được chọn và đánh dấu tablinks là active
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");
}

// Mở tab mặc định (Đã tạo) khi trang web được nạp
// document.querySelector('.tablinks.active').click();
var activeTab = document.querySelector('.tablinks.active');
if (activeTab) {
    activeTab.click();
}
// Hiển thị tab Bộ sưu tập - End

// Hiển thị form Tạo bộ sưu tập khi nhấn nút
var showCreateCollection = document.getElementById("collectionLink");

if (showCreateCollection) {
    showCreateCollection.addEventListener("click", function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết (chuyển hướng)
        var myModal = new bootstrap.Modal(document.getElementById('createCollectionModal'));
        myModal.show();
    });
}

// Hiển thị form Chỉnh sửa bộ sưu tập khi nhấn nút
var showUpdateCollection = document.getElementById("updateCollectionLink");

if (showUpdateCollection) {
    showUpdateCollection.addEventListener("click", function(event) {
        event.preventDefault();
        var myModal = new bootstrap.Modal(document.getElementById('updateCollectionModal'));
        myModal.show();
    });
}
