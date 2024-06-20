<?php
include 'pdo_connect.php';
include 'includes/header.php';
?>
<html lang="en">
<body>
    <section class="container p-4">
        <article class="row">
            <div class="col-md-4">
                <?php
                    if(isset($_SESSION["message"])){
                ?>
                <div class="alert alert-<?= $_SESSION['type_message']; ?>
                alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']  ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php session_unset();} ?>
                <div class="card card-body">
                    <form action="add_students.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="carnet" class="form-control" placeholder="Carnet" autofocus requiered>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name" requiered>
                        </div>
                        <div class="form-group">
                            <input type="number" name="age" class="form-control" placeholder="Age" min="0" max="120" step="1" requiered>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="telephone" class="form-control" placeholder="Telephone +506-8764-3456" pattern="\+506-[0-9]{4}-[0-9]{4}" requiered>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email ejemplo@dominio.com" requiered>
                        </div>
                        <div class="form-group">
                            <textarea name="address" class="form-control" placeholder="Address" row="2" requiered></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="Add_student" value="Add Student">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table">
                        <thead>
                            <tr>
                                <th>Carnet</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM tb_student";
                                $stmt=$pdo->query($sql);
                                if($stmt->rowcount()>0){
                                    while($row = $stmt->fetch()){
                               
                           ?>
                           <tr>
                            <td><?php echo $row['carnet'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['age'];?></td>
                            <td><?php echo $row['telephone'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['address'];?></td>
                            <td>
                                <a href="edit_student.php?id=<?php echo $row['carnet'];?>" class="btn btn-secondary">Edit</a>
                                <a href="delete_student.php?id=<?php echo $row['carnet'];?>" class="btn btn-danger">Delete</a>
                            </td>                            
                           </tr>
                           <?php }} ?>
                        </tbody>
                </table>
            </div>
        </article>
    </section>
</body>
</html>