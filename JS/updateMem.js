$(document).ready(() => {
  $(".updateBtn").click(e => {
    $("#saveAddBtn").hide();
    $("#saveUpdateBtn").show();
    $("#account").attr("disabled", true);
    $.ajax({
      url: "getMem.php",
      data: {
        account: $(e.target)
          .parent()
          .find(".account")
          .val()
      },
      type: "GET",
      success(data) {
        const { account, name, gender, birth, email, note } = JSON.parse(data);
        $("#account").val(account);
        $("#name").val(name);
        $("#gender").val(gender);
        $("#birth").val(birth);
        $("#email").val(email);
        $("#note").val(note);
      }
    });
  });
  $("#saveUpdateBtn").click(() => {
    $.ajax({
      url: "updateMem.php",
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
        $(`#${account}`)
          .next()
          .text(name);
      }
    });
  });
});
