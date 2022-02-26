<?php
require_once("../inote/book_component.php");
require_once("../inote/book_db.php");
require_once("../inote/book_operation.php");

Createdb();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--Custome Css-->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <main>
        <div class="container text-center">
            <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Store</h1>

            <div class="d-flex justify-content-center">
                <form action="" method="POST" class="w-50">

                    <div class="pt-2">

                        <?php 
                        inputElement("<i class='fas fa-id-badge py-2'></i>","ID", "book_id",setId()); 
                        ?>
                    </div>

                    <div class="pt-2">

                        <?php
                        inputElement("<i class='fas fa-book py-2'></i>", "Book Name", "book_name", "");
                        ?>
                    </div>

                    <div class="row pt-2">
                        <div class="col">
                            <?php
                            inputElement("<i class='fas fa-people-carry py-2'></i>", "Book Publisher", "book_publisher", "");
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            inputElement("<i class='fas fa-dollar-sign py-2'></i>", "Book Price", "book_price", "");
                            ?>
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col">
                            <?php
                            buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create", "dat-toggle='tooltip'data-placement='bottom'title='Create'");
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "dat-toggle='tooltip'data-placement='bottom'title='Read'");
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", "dat-toggle='tooltip'data-placement='bottom'title='Update'");
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt'></i>", "delete", "dat-toggle='tooltip'data-placement='bottom'title='Delete'");
                            ?>
                        </div>
                        <div class="col">
                            <?php
                                  deleteBtn();                      
                            ?>
                        </div>
                    </div>

                </form>

            </div>
            <div class="d-flex table-data pt-4">

                <table class="table table-striped table-dark">

                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Book Name</th>
                            <th>Publisher</th>
                            <th>Book Price</th>
                            <th>Edit</th>
                        </tr>

                    </thead>

                    <tbody id="tbody">
                        <?php
                        if (isset($_POST['read'])) {
                            # code...
                            $result = getData();

                            if ($result) {

                                while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                                    <tr>

                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher']; ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo '$ '. $row['book_price']; ?></td>
                                        <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>

                                    </tr>

                        <?php
                                }
                            }
                        }
                        ?>
                    </tbody>


                </table>


            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../inote/book.js"></script>
</body>

</html>