<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searching</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >

</head>
<body>
   <div class="container my-5">
    <form method="post">
        <input type="text" placeholder="Search data" name="search">
        <button class="btn btn-dark btn-sm" name="submit">Search</button>
    </form>
   </div> 
   <div class="container my-5">
    <table class="table">
<?php
if(isset($_POST['submit'])){
    $search=$_POST['search'];
    $sql="select * from `form table 1` where id='$search' or name='$search'" ;
    $result= mysqli_query($con,$sql);
    if($result){
       if($num=mysqli_num_rows($result)>0){
            echo '<thead>
            <tr>
            <th>Sl No</th>
            <th>Name</th>
            <th>Email</th>
            </tr>
            </thead>';
          while($row=mysqli_fetch_assoc($result)){
          echo '<tbody>
          <tr>
          <td>'.$row['id'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['email'].'</td>
          </tr>
          </tbody>';
          }
       }else{
         echo '<h3 class="text-danger">Data Not Found</h3>';
       }
    }   
}

?>

    </table>
   </div>
</body>
</html>