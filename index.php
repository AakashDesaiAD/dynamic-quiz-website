<?php
	session_start();
	if (!isset($_SESSION['email'])) {
    	header("location: login.php");
  	}

  	include 'backend/Question.php';
  	$question = new Question();
  	$questions = $question->getAllQuestions();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'include.php'; ?>
</head>
<body>
	<div class="container" style="width: 100%;">
        <h1>Quiz</h1>
        <?php
        	while ($q = $questions->fetch_assoc()) {
        ?>
        <div>
            <p><?php echo $q['id']; ?> .&nbsp;<?php echo $q['question']; ?></p>
            <form id="<?php echo 'form-'.$q['id']; ?>">
                <label class="d-flex my-1 btn btn-primary">
                	<input type="radio" class="mx-2" name="option" value="opt_1" id="<?php echo "opt_1_".$q['id'] ?>">
                	A. <?php echo $q['opt_1']; ?>
                </label>
                <label class="d-flex my-1 btn btn-primary">
                	<input type="radio" class="mx-2" name="option" value="opt_2" id="<?php echo "opt_2_".$q['id'] ?>">
                	B. <?php echo $q['opt_2']; ?>
                </label>
                <label class="d-flex my-1 btn btn-primary">
                	<input type="radio" class="mx-2" name="option" value="opt_3" id="<?php echo "opt_3_".$q['id'] ?>">
                	C. <?php echo $q['opt_3']; ?>
                </label>
                <label class="d-flex my-1 btn btn-primary">
                	<input type="radio" class="mx-2" name="option" value="opt_4" id="<?php echo "opt_4_".$q['id'] ?>">
                	D. <?php echo $q['opt_4']; ?>
                </label>
                <input type="hidden" name="qid" value="<?php echo $q['id'] ?>">
                <script type="text/javascript">
                	$("#<?php echo 'form-'.$q['id']; ?> input").on('change', function() {
                        let opt = $(this).attr('id');
                        let allInput = $("#<?php echo 'form-'.$q['id']; ?> input");
					   $.ajax({
					   	url : 'qa.php',
					   	data : $("#<?php echo 'form-'.$q['id']; ?>").serialize(),
					   	method : "POST",
					   	success : function (response) {
                            let data = jQuery.parseJSON(response);
					   		if (data.status === true) {
                                $("#"+opt).parent().addClass("btn-success").removeClass("btn-primary");
                                allInput.attr('disabled', 'disabled');
                            } else {
                                $("#"+opt).parent().addClass("btn-danger").removeClass("btn-primary");
                                $("#"+data.right_answer+"<?php echo "_".$q['id'] ?>").parent().addClass("btn-success").removeClass("btn-danger");
                                allInput.attr('disabled', 'disabled');
                            }
					   	}
					   });
					});
                </script>
            </form>
        </div>
    	<?php } ?>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>