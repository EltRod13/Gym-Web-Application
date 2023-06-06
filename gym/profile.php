<?php


include_once 'navigation.php';
include_once 'functions/config.php';
require 'functions/actions.php';
$memberid = $_SESSION['membersUid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/profilepage.css">
</head>
<body>

<?php 

  $usersData = getUsersData($connection, getId($connection, $memberid));

?>


 <div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-7">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img src="images/pp.png" width="150" class="rounded-circle">
                </div>

                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0"> <?php echo "Welcome Back " . $usersData['memberName'] . "!"; ?></h5>
                    
                    
                    <div class="px-4 mt-3">
                        <p class="fonts"> <?php echo "Username: " . $usersData['memberUsername']; ?> </p>
                        <p class="fonts"> <?php echo "E-mail: " . $usersData['memberEmailId']; ?> </p>
                        <p class="fonts"> <?php echo "Age: " . $usersData['memberAge'] . " years old"; ?> </p>
                        <p class="fonts"> <?php echo "Address: " . $usersData['memberAddress']; ?> </p>
                        <p class="fonts"> <?php echo "Membership Start Date: " . $usersData['memberStartdate']; ?> </p>
                        <p class="fonts"> <?php echo "Membership End Date: " . $usersData['memberEnddate']; ?> </p>
                        <p class="fonts"> <?php echo "Weight on Signing Up: " . $usersData['memberCurrentweight'] . "kg"; ?> </p>
                        <p class="fonts"> <?php echo "Target Weight: " . $usersData['memberTargetweight'] . "kg"; ?> </p>
                        
                    
                    </div>
              
                    
                    <div class="buttons">
                    <form action="member-update.php">  
                        <button class="btn btn-outline-primary px-4">Update Info</button>
                    </form>
                      
                    </div>
                    
                    
                </div>
                
               
                
                
            </div>
            
        </div>
        
    </div>
    
 </div>
<?php



?>

</body>
</html>