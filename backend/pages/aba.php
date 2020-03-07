<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php
    if(isset($_REQUEST['btnADD'])){
        $pName = $_REQUEST['txtName'];
        $pPrice = $_REQUEST['txtPrice'];
        $pBrand = $_REQUEST['cboBrand'];
        $pImage = $_FILES['txtImage']['name'];
        $tmpImage = $_FILES['txtImage']['tmp_name'];
        $pDetail = $_REQUEST['txtDetail'];
        if(!empty($pImage)){
          $stInsert = "INSERT INTO tblitem(itemName, itemPrice, itemImage, itemDetail, cbID) VALUES ('$pName', $pPrice, '$pImage', '$pDetail', $pBrand)";
          if ($conn->query($stInsert) === TRUE) {
            move_uploaded_file($tmpImage, '../images/product/'.$pImage);
            echo '
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Data has been inserted.
              </div>
            ';
          }
          else{
            echo '
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> Data cannot insert.
              </div>
            ';
          }
        }
      }
  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>