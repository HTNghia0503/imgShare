/*--- Chỉnh sửa Cmt ---*/
var showUpdateCmt = document.getElementById("updateCmtLink");

if (showUpdateCmt) {
    showUpdateCmt.addEventListener("click", function(event) {
        event.preventDefault();
        var cmtModal = new bootstrap.Modal(document.getElementById('updateCmtModal'));
        cmtModal.show();
    });
}
