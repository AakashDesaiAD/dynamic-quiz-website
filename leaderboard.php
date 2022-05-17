<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header("location: login.php");
    }

    include 'backend/Score.php';
    $score = new Score();
    $leaderboard = $score->leaderboard();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include.php'; ?>
</head>

<body>
    <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($leaderboard as $key => $user) {
                        ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['score']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>