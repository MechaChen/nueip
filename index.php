<?php 
  require_once('connectDB.php');
  $sql = 
  "SELECT *
  FROM account_info
  ";
  $members = $pdo->prepare($sql);
  $members->execute();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <title>人易科技測試</title>
    <style>
      .container {
        padding-top: 5%;
      }
      .row {
        padding: 1%;
        margin: 1% auto;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
        align-items: center;
      }
      .updateBtn {
        margin-right: 1%;
      }
      textarea {
        resize: none;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <button class="addBtn btn btn-primary" data-toggle="modal" data-target="#edit">
          新增
        </button>
      <?php
      while($memRow = $members->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <div class="row">
        <input type="hidden" class="account" id="<?php echo $memRow["account"]; ?>" name="account" value="<?php echo $memRow["account"]; ?>">
        <span class="col name"><?php echo $memRow["name"]; ?></span>
        <button class="updateBtn btn btn-info" data-toggle="modal" data-target="#edit">
          編輯
        </button>
        <button class="deleteBtn btn btn-danger" data-toggle="modal" data-target="#deleteConfirm">
          刪除
        </button>
      </div>
      <?php
      }
      ?>
    </div>
    <div
      class="modal fade"
      id="edit"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">
              個人資料
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="addNewMem.php">
              <div class="form-group">
                <label for="account">帳號</label>
                <input
                  type="text"
                  class="form-control"
                  id="account"
                  name="account"
                  disabled
                />
              </div>
              <div class="form-group">
                <label for="name">姓名</label>
                <input type="text" id="name" name="name" class="form-control" />
              </div>
              <div class="form-group">
                <label for="gender">性別</label>
                <select id="gender" name="gender" class="form-control">
                  <option value="man">男</option>
                  <option value="woman">女</option>
                </select>
              </div>
              <div class="form-group">
                <label for="birth">生日</label>
                <input
                  type="date"
                  name="birth"
                  id="birth"
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <label for="email">信箱</label>
                <input
                  type="text"
                  id="email"
                  name="email"
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <label for="note">備註</label>
                <textarea
                  type="text"
                  id="note"
                  name="note"
                  class="form-control"
                ></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              關閉
            </button>
            <button id="saveAddBtn" class="btn btn-primary" data-dismiss="modal">新增資料</button>
            <button id="saveUpdateBtn" class="btn btn-info" data-dismiss="modal">儲存變更</button>
          </div>
        </div>
      </div>
    </div>
    <!-- 刪除確認燈箱 -->
    <div
      class="modal fade"
      id="deleteConfirm"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalCenterTitle">
              個人資料
            </h5> -->
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
              <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
              >
              關閉
            </button>
            <input type="hidden" id="d_account" name="account" value="">
            <button id="confirmDeleteBtn" class="btn btn-danger" data-dismiss="modal">確認刪除</button>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script src="JS/addMem.js"></script>
    <script src="JS/updateMem.js"></script>
    <script src="JS/deleteMem.js"></script>
  </body>
</html>
