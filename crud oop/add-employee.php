<?php include('header.php');
include ('functions.php') ;
include('nav.php');

$errors=[];
$departments=array('cs','ss','we','it');
if(isset($_POST['submit'])) {
    $name=sanitizestring($_POST['name']);
    $department=sanitizeemail($_POST['department']);
    $email=sanitizeemail($_POST['email']);
    $password=sanitizestring($_POST['password']);
    if( requiredinput($name) or  requiredinput($department) or  requiredinput($email) or  requiredinput($password)){
        $errors[]= 'Please Fill All Fields';

    }else{
        if(!mininput($name,3)or  maxinput($name,20))
        {
            $department = strtolower($department);
            if(in_array($department,$departments))
            {
                if(validateemail($email))
                {
                    if(!mininput($password,3)or maxinput($password,20))
                    {
                        
                       $newpassword =$db->hashing_password($password);
                       $sql="INSERT INTO `employees`(`name`, `department`, `email`, `password`)
                        VALUES ('$name','$department','$email','$newpassword')";
                        $success=$db->insert($sql);
                    }else{
                        $errors[]='password must greater than 3 and less than 20 ';
                    }

                }else {
                    $errors[]='enter a valid email ';
                }

            }else{
                $errors[]='This Department Not Found ';
            }

        }else{
            $errors[]='name must greater than 3 and less than 20 ';
        }
    }

}

  




?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="p-3 col text-center mt-5 text-white bg-primary">  Add New Employee </h2>
        </div>

        

        <div class="col-sm-12">
           
            <h2 class="p-2 col text-center mt-5  alert alert-danger">     
                
            <?php if(isset($errors)):?>
            <?php foreach( $errors as $error):
                echo $error ."<br>";
            endforeach;?>
        </h5>
    <?php endif; ?>  </h2>
            

           
            <h2 class="p-2 col text-center mt-5  alert alert-success">
                 <?php 
        if(isset( $success)):?> 
        <h5 class="alert alert-success text-center">
         <?php echo "  $success";
        endif;
        ?> 
    
 </h2>
            
        </div>
        <div class="col-sm-12">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; // يعني نفس الصفحة?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name"  placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" name="department" class="form-control" id="department"  placeholder="Enter department">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
            
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<?php include('footer.php'); ?>



  