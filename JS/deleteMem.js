$(document).ready(() => {
  let mem, account, name;
  $(".deleteBtn").click(e => {
    mem = $(e.target).parent();
    account = mem.find(".account").val();
    name = mem.find(".name").text();
    console.log(account);
    console.log(name);
    $("#deleteConfirm .modal-body").text(`確認刪除 "${name}" 嗎？`);
  });
  $("#confirmDeleteBtn").click(e => {
    $("#d_account").val(account);
    $.ajax({
      url: "deleteMem.php",
      data: { account },
      type: "POST",
      success(data) {
        alert("刪除成功");
        mem.remove();
      }
    });
  });
});
