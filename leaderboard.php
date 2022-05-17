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
        <div class="bg-primary p-3 rounded my-3 d-flex justify-content-between align-items-center">
            <h1 class="text-white">Quiz</h1>
            <div>
                <a href="index.php" class="btn btn-warning">Play again</a>
                <a href="backend/logout.php" class="btn btn-danger">Log Out</a>
            </div>
        </div>

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
                        $classActive = '';
                        foreach ($leaderboard as $key => $user) {
                            if ($user['email'] === $_SESSION['email']) {
                                $classActive = "table-success";
                            } else {
                                $classActive = "";
                            }
                        ?>
                        <tr class="<?php echo $classActive; ?>">
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