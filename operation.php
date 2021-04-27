<?php
    require_once("db.php");
    $con = Createdb();

    if(isset($_POST['create'])){
        createData();
    }
    if(isset($_POST['update'])){
        updateData();
    }
    if(isset($_POST['delete'])){
        deleteData();
    }
    if(isset($_POST['deleteall'])){
        deleteAll();
    }

    function createData(){
        $name = textboxValue("name");
        $email = textboxValue("email");
        $mobile = textboxValue("mobile");
        $state = textboxValue("state");
        $city = textboxValue("city");
        $address = textboxValue("address");
        
        if($name && $email && $email && $mobile && $state && $city && $address){
            $sql = "INSERT INTO employee(name,email,mobile,state,city,address)
                    VALUES('$name','$email','$mobile','$state','$city','$address')";
            if(mysqli_query($GLOBALS['con'],$sql)){
                #echo '<script>alert("Record successfully inserted...")</script>';
                echo '<div class="alert alert-success"><strong>SUCCESS!!!</strong> Record successfully inserted...</div>';
            }else{
                #echo '<script>alert("Error inserting data...!!!")</script>';
                echo '<div class="alert alert-danger"><strong>Error!!!</strong> Error inserting data...!!!</div>';
            }
        }else{
            #echo '<script>alert("Please provide all data...")</script>';
            echo '<div class="alert alert-danger"><strong>Error!!!</strong> Please provide all data...</div>';
        }
    }

    function textboxValue($value){
        $textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
        if(empty($textbox)){
            return false;
        }else{
            return $textbox;
        }
    }

    function getData(){
        $sql = "SELECT * FROM employee";
        $result = mysqli_query($GLOBALS['con'],$sql);
        if(mysqli_num_rows($result)>0){
            return $result;
        }
    }

    function updateData(){
        $id = textboxValue("id");
        $name = textboxValue("name");
        $email = textboxValue("email");
        $mobile = textboxValue("mobile");
        $state = textboxValue("state");
        $city = textboxValue("city");
        $address = textboxValue("address");
        
        if($name && $email && $email && $mobile && $state && $city && $address){
            $sql = "UPDATE employee SET name='$name',email='$email',mobile='$mobile',state='$state',city='$city',address='$address' WHERE id='$id'";
            if(mysqli_query($GLOBALS['con'],$sql)){
                #echo '<script>alert("Record successfully updated...")</script>';
                echo '<div class="alert alert-success"><strong>SUCCESS!!!</strong> Record successfully updated...</div>';
            }else{
                #echo '<script>alert("Unable to updated data...!!!")</script>';
                echo '<div class="alert alert-danger"><strong>Error!!!</strong> Unable to update data...!!!</div>';
            }
        }else{
            #echo '<script>alert("Please select data by clicking EDIT...")</script>';
            echo '<div class="alert alert-danger"><strong>Error!!!</strong> Please select data by clicking EDIT...</div>';
        }
    }

    function deleteData(){
        $id = (int)textboxValue("id");
        $sql = "DELETE FROM employee WHERE id=$id";
        if(mysqli_query($GLOBALS['con'],$sql)){
            #echo '<script>alert("Record successfully deleted...")</script>';
            echo '<div class="alert alert-success"><strong>SUCCESS!!!</strong> Record successfully deleted...</div>';
        }else{
            #echo '<script>alert("Unable to delete data...!!!")</script>';
            echo '<div class="alert alert-danger"><strong>Error!!!</strong> Unable to delete data...!!!</div>';
        }
    }

    function deleteBtn(){
        $result = getData();
        $i = 0;
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $i++;
                if($i>2){
                    echo '<button name="deleteall" class="btn btn-danger" id="btn-deleteall">Delete All</button>';
                    return;
                }
            }
        }
    }

    function deleteAll(){
        $sql = "DELETE FROM employee";
        if(mysqli_query($GLOBALS['con'],$sql)){
            #echo '<script>alert("All record successfully deleted...")</script>';
            echo '<div class="alert alert-success"><strong>SUCCESS!!!</strong> Successfully deleted all records...</div>';
            //Createdb();
        }else{
            #echo '<script>alert("Unable to delete all data...!!!")</script>';
            echo '<div class="alert alert-danger"><strong>Error!!!</strong> Unable to delete all data...!!!</div>';
        }
    }

    function setId(){
        $getid = getData();
        $id = 0;
        if($getid){
            while($row = mysqli_fetch_assoc($getid)){
                $id = $row['id'];
            }
        }
        echo $id+1;
    }
?>