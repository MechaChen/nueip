// $(document).ready(() => {
$(".addBtn").click(() => {
  $("#saveAddBtn").show();
  $("#saveUpdateBtn").hide();
  $("#account").attr("disabled", false);
  $("#account").val("");
  $("#name").val("");
  $("#gender").val("");
  $("#birth").val("");
  $("#email").val("");
  $("#note").val("");
});
$("#saveAddBtn").click(() => {
  $.ajax({
    url: "addMem.php",
    data: {
      account: $("#account").val(),
      name: $("#name").val(),
      gender: $("#gender").val(),
      birth: $("#birth").val(),
      email: $("#email").val(),
      note: $("#email").val()
    },
    type: "POST",
    success(data) {
      const { account, name } = JSON.parse(data);
      $(".container").append(`<div class="row">
            <input type="hidden" class="account" id="${account}" name="account" value="${account}">
            <span class="col">${name}</span>
            <button class="updateBtn btn btn-info" data-toggle="modal" data-target="#edit">
              編輯
            </button>
            <button class="deleteBtn btn btn-danger">
              刪除
            </button>
          </div>`);
    }
  });
});
// });
