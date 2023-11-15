// Hiển thị modal tạo  khi nhấn nút
var showCreateTopic = document.getElementById("topicLink");

if (showCreateTopic) {
    showCreateTopic.addEventListener("click", function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết (chuyển hướng)
        var myModal = new bootstrap.Modal(document.getElementById('createTopicModal'));
        myModal.show();
    });
}
