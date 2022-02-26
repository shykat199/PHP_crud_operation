<?php
require_once("book_db.php");
require_once("book_component.php");

$con = Createdb();

// Create button click
if (isset($_POST['create'])) {
    # code...
    createDtata();
}



if (isset($_POST['update'])) {
    # code...
    updateData();
}


if (isset($_POST['delete'])) {
    # code...
    deleteData();
}


if (isset($_POST['deleteall'])) {
    # code...
    deleteAllData();
}

function createDtata()
{

    $book_name = textboxValue("book_name");
    $book_publish = textboxValue("book_publisher");
    $book_price = textboxValue("book_price");

    if ($book_name && $book_publish && $book_price) {
        # code...
        $sql = "INSERT INTO `books` (`book_name`, `book_publisher`, `book_price`) 
        VALUES ('$book_name','$book_publish','$book_price')";

        if (mysqli_query($GLOBALS['con'], $sql)) {

            echo "<div class='alert alert-success mt-2' role='alert'>
                    Record Inserted Successfully...!!!
                </div>";
        } else {
            echo "Error";
        }
    } else {
        echo "<div class='alert alert-danger mt-2' role='alert'>
                Empty field...!!!
            </div>";
    }
}

//security and sql injection
function textboxValue($value)
{
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));

    if (empty($textbox)) {

        return false;
    } else {
        return $textbox;
    }
}

//Get data from mysql
function getData(){

    $sql = "SELECT * FROM books";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if (mysqli_num_rows($result) > 0) {
        # code...
        return $result;
    }
}


//update Data
function updateData()
{

    $book_id = textboxValue("book_id");
    $book_name = textboxValue("book_name");
    $book_publish = textboxValue("book_publisher");
    $book_price = textboxValue("book_price");

    if ($book_name && $book_publish &&  $book_price) {

        $sql = "UPDATE books SET book_name='$book_name',book_publisher='$book_publish',book_price='$book_price' WHERE id=' $book_id'";

        if (mysqli_query($GLOBALS['con'], $sql)) {

            echo "<div class='alert alert-success mt-2' role='alert'>
                    Record Updated Successfully...!!!
                </div>";
        } else {

            echo "<div class='alert alert-danger mt-2' role='alert'>
               Error...!!!
            </div>";
        }
    } else {

        echo "<div class='alert alert-danger mt-2' role='alert'>
        Select Data Using Edit Icon...!!!
     </div>";
    }
}



//delete Data
function deleteData()
{

    $book_id = (int)textboxValue("book_id");


    $sql = "DELETE FROM `books` WHERE `books`.`id` =' $book_id'";

    if (mysqli_query($GLOBALS['con'], $sql)) {

        echo "<div class='alert alert-success mt-2' role='alert'>
                    Record Deleted Successfully...!!!
                </div>";
    } else {

        echo "<div class='alert alert-danger mt-2' role='alert'>
        Select Data Using Edit Icon...!!!
     </div>";
    }
}


function deleteBtn(){
    $result= getData();
    $i=0;

    if ($result) {
        # code...
        while($row=mysqli_fetch_assoc($result)){

            $i++;
            if ($i>3) {
                # code...
                buttonElement("btn-deleteall", "btn btn-danger", "<i class='fas fa-trash'></i>Delete All", "deleteall", "dat-toggle='tooltip'data-placement='bottom'title='Delete All'");
                return;
            }

        }
    }
}

//delete All Data
function deleteAllData()
{

    $book_id = (int)textboxValue("book_id");


    $sql = "DROP TABLE books";

    if (mysqli_query($GLOBALS['con'], $sql)) {

        echo "<div class='alert alert-success mt-2' role='alert'>
                    All Record Deleted Successfully...!!!
                </div>";
                Createdb();
    } else {

        echo "<div class='alert alert-danger mt-2' role='alert'>
        Record can not deleted..!!!
     </div>";
    }
}


//set id to textbox
function setId(){

    $getid=getData();
    $id=0;
    if ($getid) {
        # code...
        while ($row=mysqli_fetch_assoc($getid)) {
            # code...
            $id=$row['id'];
        }
    }

    return($id+1);
}
