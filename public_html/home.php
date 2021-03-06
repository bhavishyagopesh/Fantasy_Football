<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/first-navigation.php' ?>
<?php
    if($_GET["request"]=="profile-update" && $_GET["status"]=="success"){
        $dialogue="Your profile update was successful! ";
    }
    else if($_GET["request"]=="profile-update" && $_GET["status"]=="unsuccess"){
        $dialogue="Your profile update was not at all successful! ";
    }
    else if($_GET["request"]=="login" && $_GET["status"]=="success"){
        $dialogue="Welcome back again! ";
    }

    $current_user = $_SESSION['user_username'];
    $sql = "SELECT * FROM user WHERE user_username = '$current_user'";
    $result = mysqli_query($database,$sql) or die(mysqli_error($database));

    $isnew = 1;
    while($rws = mysqli_fetch_array($result)) {
        if ($rws['money'] != NULL) $isnew = 0;
    }
?>
    <script>
        $.growl("<?php echo $dialogue; ?> ", {
            animate: {
                enter: 'animated zoomInDown',
                exit: 'animated zoomOutUp'
            }
        });
    </script>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12">
            <h1 class="text-center">Welcome to your profile</h1>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <ul class="nav text-center">
                <li><a href="yourteam.php">View Your Team </a> </li>
                <?php if($isnew) : ?>
                    <li><a href="app/#/players">Create Your Team </a> </li>
                <?php endif; ?>
                <!-- <li><a href="app/#/players">Create Your Team </a> </li> -->
                <li><a href="app/#/teams">View Team Standing </a> </li>
                <li><a href="all-users.php">View Leaderboard</a></li>
                <li><a href="viewuserscore.php">See Performance</a></li>
                <li><a href="rules.php">Rules of The Game</a></li>
                <li></li>
            </ul>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
