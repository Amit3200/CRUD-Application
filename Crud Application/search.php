<!DOCTYPE html>
<html>
<?php include 'db.php';
if(isset($_POST['search']))
{
$name=htmlspecialchars($_POST['search']);
$q1="select * from tasks where name like '%$name%' ";
$rows =$db->query($q1);
}
?>
<head>
    <title>
        Crud Application
    </title>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
.footer
    {
        background-color: dimgray;
        color:white;
        font-family: "Lucida Console";
        text-align: center;
        padding-top: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 60px;">
            <center>
                <h1>To Do List</h1>
            </center>
            <div class="col-md-10 col-md-offset-1">
                <?php if(mysqli_num_rows($rows)<1): ?>
                <div class="alert alert-danger">
                <h2 class="text-danger text-center">No Record Found</h2><br>
                </div>
                <a href="CrudHome.php" class="btn btn-warning">Back</a>
                <?php else: ?>
                <table class="table table-hover table-striped table-inverse">
                    <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success">Add Task</button>
                    <button type="button" class="btn btn-white pull-right" onClick="print()">Print</button>
                    <hr>
                    <br>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Task</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="add.php">
                                        <div class="form-group">
                                            <label>Task Name</label>
                                            <input type="text" class="form-control" name="task" required><br>
                                            <input type="submit" class="btn btn-success" name="send" value="Add Task">
                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th class="col-md-2">Task No.</th>
                            <th class="col-md-8">Task Name</th>
                        </tr>

                        <?php while($row=$rows->fetch_assoc()):?>
                        <tr>
                            <th>
                                <?php echo $row['id'] ?>
                            </th>
                            <td>
                                <?php echo $row['name']?>
                            </td>
                            <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php endwhile; ?>
                    </thead>
                </table>
                <?php endif; ?>
            </div>
                     
        </div>
    </div>
      <div class="footer">
     Made By Amit Singh &copy; Simple CRUD Application 2018
    </div>
</body>

</html>