<?php
    require_once("../CRUD-operations-PHP/operation.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Employee Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded">Employee Details</h1>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="py-2">
                    <div class="input-group mb-2">
                        <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="Id" name="id" 
                        value="<?php setId(); ?>" readonly>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Name (5 charcters minimum)" name="name" 
                        pattern="[a-zA-Z]{5,}" autocomplete="off">
                    </div>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="inlineFormInputGroup" placeholder="Email Id (e.g., abc@abc.abc)" name="email"
                        pattern="[A-Za-z0-9,.-_]+@[a-z0-9.]+.[a-z]{2,}" autocomplete="off">
                    </div>
                    <div class="input-group mb-2">
                        <input type="tel" class="form-control" id="inlineFormInputGroup" placeholder="Mobile (10 digits only)" name="mobile" 
                        pattern="[0-9]{10}" autocomplete="off">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend col-md-2">
                            <div class="input-group-text"><label for="inputState">State</label></div>
                        </div>
                        <select id="inputState" class="form-control" name="state">
                            <option selected>---Select State---</option>
                            <?php 
                                $query =mysqli_query($con,"SELECT * FROM state");
                                while($row=mysqli_fetch_array($query))
                                { 
                            ?>
                            <option><?php echo $row['state'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend col-md-2">
                            <div class="input-group-text"><label for="inputState">City</label></div>
                        </div>
                        <select id="inputState" class="form-control" name="city">
                            <option selected>---Select City---</option>
                            <?php 
                                $query =mysqli_query($con,"SELECT * FROM city");
                                while($row=mysqli_fetch_array($query))
                                { 
                                    if($i!=$row['state_id']){
                            ?>
                            <option><?php echo "---------------------------------";?></option>
                            <?php
                                    }
                            ?>
                            <option><?php echo $row['city'];?></option>
                            <?php
                                    $i=$row['state_id'];
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Address" name="address" autocomplete="off">
                    </div>
                </div>
                <div class="py-4">
                    <button name="create" class="btn btn-success" id="btn-create">Create</button>
                    <button name="read" class="btn btn-primary" id="btn-read">Read</button>
                    <button name="update" class="btn btn-light border" id="btn-update">Update</button>
                    <button name="delete" class="btn btn-danger" id="btn-delete">Delete</button>
                    <?php deleteBtn(); ?>
                </div>
            </form>
        </div>
        
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email Id</th>
                        <th>Mobile</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                        if(isset($_POST['read'])){
                            $result = getData();
                            
                            if($result){
                                while($row = mysqli_fetch_assoc($result)){  ?>
                    <tr>
                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id'];?></td>
                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['name'];?></td>
                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['email'];?></td>
                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['mobile'];?></td>
                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['state'];?></td>
                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['city'];?></td>
                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['address'];?></td>
                        <td class="btnedit" data-id="<?php echo $row['id']; ?>">EDIT</td>
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
    
    <script src="main.js" type="text/javascript"></script>
</body>
</html>