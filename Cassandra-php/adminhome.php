<?php
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="professor"){
      header('Location: index.php?err=2');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>P2IRC Project Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 9px sans-serif; text-align: center; }
    </style>
    <meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/foundation.min.css">
<link rel="stylesheet" href="css/main.css">
 <link rel="stylesheet" type="text/css" href="css/tabbed-panels.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/tabs.js"></script>
</head>
<body>
    <div class="row page_wrap">
  <!-- page wrap -->
  <div class="twelve columns">
    <!-- page wrap -->

    <!-- END Header -->
    <div class="row hide-for-small">
      <div class="twelve columns">
        <div class="heading_dots"><br>
          <h2 class="heading_supersize"><span class="heading_center_bg"> P2IRC Project Demo </span></h2>
          <div class="page-header">

    </div>
        </div>
      </div>
    </div>
    <!-- end row -->
    <div class="row">
      <div class="twelve columns">
        <div class="blog_post">
          <!-- Begin Blog Post -->

          <form method="post" name="display" action="display-admin.php" />
            <select name="reference">
           <option value="A">A</option>
           <option value="T">T</option>
           <option value="C">C</option>
           <option value="G">G</option>
           <option value="AAC">AAC</option>
           <option value="AG">AG</option>
           <option value="GAT">GAT</option>
          <option value="GT">GT</option>

          </select>
          <input type="submit" name="Submit" value="display" />
          </form>
<?php
$cluster   = Cassandra::cluster()                 // connects to localhost by default
                 ->build();
$keyspace  = 'key_thaliana';
$session   = $cluster->connect($keyspace);        // create session, optionally scoped to a keyspace
$statement = new Cassandra\SimpleStatement("SELECT * FROM tbl_geno_thaliana LIMIT 25");
$result    = $session->execute($statement);

$resultprofessor    = $session->execute($statement);

 echo "<table align=border=\"center\"  border=\"2\"><tr><td>Genome Information</td><td>Genome reference</td><td>Genome Position</td><td>Format</td><td>Sample 10010</td><td>Sample 15593</td><td>Sample 7231</td><td>Sample 9996</td></tr>";

foreach ($result as $row) {
        echo "<tr><td>".$row["info"]."</td><td>".$row["ref"]." </td><td>".$row["pos"]."</td><td>".$row["format"]."</td><td>".$row["s10010"]."</td><td>".$row["s15593"]."</td><td>".$row["s7231"]."</td><td>".$row["s9996"]."</td></tr>";
    }
    echo "</table>";



echo "Records Display: " . $result->count() . " records";
?>

        </div>
        <!-- END blog post -->
      </div>
      <!-- END row blog -->
    </div>
    <div class="row">
      <div class="twelve columns">
        <ul id="menu3" class="footer_menu horizontal">
             <b><?php echo $_SESSION['sess_username']; ?></b>. Welcome to P2IRC Project.
              <br> <br>
          <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
        </ul>


      </div>
    </div>
  </div>
  <!-- end page wrap) -->
</div>
<!-- end page wrap) -->
</body>
</html>
