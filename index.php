<?php include("include/config.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="MeeDO51  demo to do list application by Ahmed Alsaleh.">
    <meta name="author" content="Ahmed Alsaleh">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <title>To Do List</title>
<style type="text/css">
.ds {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px;
}
</style>
  </head>
  <body class="bg-light">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">My To Do List</h1>
        <p class="lead">I can organize my time by using this awesome application.</p>
      </div>
    </div>

    <div class="container">
      <form action="index.php" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputDate4">Date</label>
            <input type="date" name="date" class="form-control" id="inputDate4" value="<?=date("Y-m-d");?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputTime4">Time</label>
            <input type="time" name="time" class="form-control" id="inputTime4" value="<?=date("h:i");?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputTitle">Title</label>
          <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Type Tiltle" required>
        </div>
        <div class="form-group">
          <label for="inputNote2">Note</label>
          <textarea class="form-control" name="note" id="inputNote2" rows="2" placeholder="Type Note.." required></textarea>
        </div>

        <button type="submit" name="add" class="btn btn-secondary">Add <i class="fas fa-plus" style="font-size:16px;"></i></button>
      </form>
<?php
if(isset($_POST['add'])){
  $date = $_POST['date'];
  $time = $_POST['time'];
  $title = $_POST['title'];
  $note = $_POST['note'];
  $insert = "INSERT INTO `list` (`id`, `sit`, `title`, `note`, `date`, `time`) VALUES (NULL, '0', '$title', '$note', '$date', '$time');";
  if(mysql_query($insert)){
    echo'
    <div class="alert alert-success" role="alert">
      A simple success alert—check it out!
    </div>
    ';
    refresh("index.php",5);
  }
}
?>

<?php
$select = mysql_query("SELECT * FROM list");
while($row=mysql_fetch_assoc($select)){
$curDate = date("Y-m-d");
if($row['date'] == $curDate){
  $dd='<b>TODAY!<b>';
}else{
  $dd=$row['date'];
}
  echo'
      <div class="list-group">
        <button href="#" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">';
      if($row['sit'] == 1){
        echo'
            <i class="fas fa-check" style="color:#00FF00;"></i> '.$row['title'].'
        ';
        }else{
          echo $row['title'];
        }
  echo'
            </h5>
            <small class="ds">'.$dd.' &nbsp; '.$row['time'].'</small>
          </div>
          <p class="mb-1">'.$row['note'].'</p>
          <small><a href="index.php?act=delete&id='.$row['id'].'" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a> <a href="index.php?act=cross&id='.$row['id'].'" class="btn btn-warning"><i class="fas fa-check"></i></a></small>
        </button>
      </div>
  ';
}
?>

<?php
if(@$_REQUEST['act']=='delete'){
		//http://localhost/tests/Examples&Lessons/todo-list/index.php?do=delet&id=6

		$id=intval(@$_GET['id']);
        $de=mysql_query("delete from list where id='$id'");
	if($de){
		echo'
        <div class="alert alert-success" role="alert">
          Was deleted successfuly!
        </div>';
		refresh("index.php",1);
    }
}
if(@$_REQUEST['act']=='cross'){
		//http://localhost/tests/Examples&Lessons/todo-list/index.php?do=cross&id=6

		$id1=intval(@$_GET['id']);
$sc=mysql_query("SELECT * FROM list");
$rs=mysql_fetch_assoc($sc);
if($rs['sit']==0){
        $cr=mysql_query("update list set sit='1' where id='$id1'");
	if($cr){
		echo'
        <div class="alert alert-success" role="alert">
          Was crossed successfuly!
        </div>';
		refresh("index.php",1);
    }
}else{
          $ccr=mysql_query("update list set sit='0' where id='$id1'");
	if($ccr){
		echo'
        <div class="alert alert-success" role="alert">
          Was cancell crossed successfuly!
        </div>';
		refresh("index.php",1);
    }
}
}
?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>