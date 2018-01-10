<!DOCTYPE html>
<html>
<?php include 'db.php';
$id=(int)$_GET['id'];
$q1="select * from tasks where id ='$id';";
$rows =$db->query($q1);
$row=$rows->fetch_assoc();    
if(isset($_POST['send']))
{
$task=htmlspecialchars($_POST['task']);
$sql="update tasks set name='$task' where id='$id'";
if($db->query($sql))
{
header('location: CrudHome.php');
}
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
                <h1>Update To Do List</h1>
            </center>
            <div class="col-md-10 col-md-offset-1">
                <form method="post">
                    <div class="form-group">
                        <label>Task Name</label>
                        <input type="text" class="form-control" name="task" value='<?php echo $row['name'] ?>' required><br>
                        <input type="submit" class="btn btn-success" name="send" value="Update Task">&nbsp; &nbsp;
                        <a href="CrudHome.php" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
      <div class="footer">
     Made By Amit Singh &copy; Simple CRUD Application 2018
    </div>
</body>

</html>