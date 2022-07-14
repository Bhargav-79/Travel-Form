<?php
    $insert = false;
    if(isset($_POST['name'])){   

    // Set connection variables    
    $server = "localhost";
    $username = "root";
    $password = "";
    
    // Creating  a database connection
    $con = mysqli_connect($server,$username,$password);
    // check for connection success
    if(!$con){
        die("Connection to this database failed due to ". mysqli_connect_error());
    }
    // echo " Success Connecting to the database ";

    // collect post variables
    $name = $_POST[ 'name'];
    $gender = $_POST[ 'gender'];
    $age = $_POST[ 'age'];
    $email = $_POST[ 'email'];
    $phone = $_POST[ 'phone'];
    $desc = $_POST[ 'desc'];

    $sql = "INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Description`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
 
    //executing the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    //closing the connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>Welcome to Travel Form</title>
    <style>
        *{
            margin: 0px;
            box-sizing: border-box;
            padding: 0px;
            font-family: 'Roboto', sans-serif;
        }
     .container{
        max-width: 80%;
        /* background-color: rgb(198, 152, 241); */
        padding: 1px;;
        margin: auto;
     }
     .container h1,p{
        text-align: center;
     }
    input, textarea {
    width: 86%;
    border: 2px solid black;
    border-radius: 6px;
    outline: none;
    margin: 9px auto;
    padding: 4px;
    font-size: 17px;
    display: block;
}
     p{
        font-size: 21px; 
     }
     form{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
     }
     .btn {
    color: white;
    background: purple;
    padding: 8px 12px;
    border: 2px solid white;
    border-radius: 14px;
    cursor: pointer;
     }
     .bg{
        width: 100%;
        z-index: -1;
        position:absolute;
        opacity: 10.8;
     }
     .submitmsg{
        color: green;
        font-size: 21px;
     }
    </style>
</head>
<body>
    <img class="bg" src="bg.jpg" alt="IISC Bangalore">
    <div class="container">
        <h1> Welcome to IISC Bangalore US Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation</p>
        <?php
        if($insert == true){
        echo "<p class='submitmsg'>Thanks for submitting your form. We are happy to see you joining for the US Trip.</p>";
        }
        ?>

        <form method="post" action="index.php">
            <input type="text" name="name" id="name" placeholder="Enter your name"/>
            <input type="text" name="age" id="age" placeholder="Enter your age"/>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender"/>
            <input type="email" name="email" id="email" placeholder="Enter your email"/>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone"/>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form> 
    </div>
    <!-- <script src="index.js"></script> -->
</body>
</html>