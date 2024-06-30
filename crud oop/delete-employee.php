<?php include('header.php'); ?>
<?php include('nav.php'); 

$id=$_GET['id'];
$row=$db->find('employees',$id); 
if(isset($id) && is_numeric($id)):
    if($row):
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="p-3 col text-center mt-5 text-white bg-primary">  Delete Employee </h2>
        </div>
       
        <div class="col-sm-12">
            <h3 class="alert alert-success mt-5 text-center">
            <?php if($db->delete('employees',$id)):?>
            </h3>

            <?php endif;?>
        </div>
        
        
    </div>
</div>


<?php else :?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="alert alert-danger mt-5 text-center"> Not Found </h3>
            </div>
        </div>
    </div> 
    

<?php 
    
endif;
endif;

include('footer.php'); ?>



  