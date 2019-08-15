$(document).ready(() => {
  $(".confirmDeleteBtn").click(e => {
    $.ajax({
      url: "deleteMem.php",
      data: {
        account: $(e.target)
          .parent()
          .find(".account")
          .val()
      },
      type: "POST",
      success(data) {
        alert("刪除成功");
        $(e.target)
          .parent()
          .remove();
      }
    });
  });
});
