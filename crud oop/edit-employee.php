<?php include('header.php');
include('functions.php'); ?>
<?php include('nav.php');
$id=$_GET['id'];
$row=$db->find('employees',$id); 
if(isset($id) && is_numeric($id)):
    if($row):
    $errors=[];
    $departments=array('cs','ss','we','it');
    if(isset($_POST['submit'])) {
    $name=sanitizestring($_POST['name']);
    $department=sanitizeemail($_POST['department']);
    $email=sanitizeemail($_POST['email']);
    $password=sanitizestring($_POST['password']);
    if( requiredinput($name) or  requiredinput($department) or  requiredinput($email)){
        $errors[]= 'Please Fill All Fields';

    }else{
        if(!mininput($name,3)or  maxinput($name,20))
        {$department = strtolower($department);
            if(in_array($department,$departments))
            {
                if(validateemail($email))
                {
                    if(!empty($password))
                    {
                        if(strlen($password) > 3){
                       $newpassword =$db->hashing_password($password);
                    $sql="UPDATE `employees` SET `name`='$name',`department`='$department',
                    `email`='$email',`password`='$password'
                     WHERE `id`='$row[id]' ";
                    $success=$db->update($sql);
                    }
                }else{
                    $sql="UPDATE `employees` SET `name`='$name',`department`='$department',
                    `email`='$email'
                     WHERE `id`='$row[id]' ";
                    $success=$db->update($sql);
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
            <h2 class="p-3 col text-center mt-5 text-white bg-primary">  Edit Employee </h2>
        </div>


        <div class="col-sm-12">
            
            <h2 class="p-2 col text-center mt-5  alert alert-danger"> 
            <?php if(isset($errors)):?>
            <?php foreach( $errors as $error):
                echo $error ."<br>";
            endforeach;?>
    <?php endif; ?> 
            </h2>
            

           
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
            <form method="post" action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $row['name'];?>"   class="form-control" id="name"  placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" name="department" value="<?php echo $row['department'];?>" class="form-control" id="department"  placeholder="Enter department">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="<?php echo $row['email'];?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
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
<?php 

else : ?>
     <div class='container'>
     <div class='row'>
   <div class='col-sm-12'>
    <h3 class='alert alert-danger mt-5 text-center'> Not Found </h3>
    </div>
     </div>
  </div>

<?php 
    
endif;
endif;


include('footer.php'); ?>