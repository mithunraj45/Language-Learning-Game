<?php 
    
    require('header.php');

    $lang_id=$_REQUEST['reference_no'];
    $statement = $con->prepare("SELECT * FROM  lang_table WHERE lang_id=?");
    $statement->execute(array($lang_id));
    $total = $statement->rowCount();    
      $result = $statement->fetch(PDO::FETCH_ASSOC);    
      if($total==0) {
          header('location:login.php');
      } 


    
?>


<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold ml-4 mt-2">Languages / <?php echo $result['lang_name']; ?> / QUIZ</h1>
        <a href="language_tutorial.php?refernce_no=<?php echo $lang_id; ?>" class="d-none d-sm-inline-block btn btn-success shadow-sm">Back</a>                         
    </div>

</div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ Web Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            /* margin-top: 50px;
            margin-left:50px;
            margin-right:50px; */
            /* width:50%; */
        }

        .card {
            margin-bottom: 20px;
        }

        .options {
            margin-bottom: 20px;
        }

        .btn {
            cursor: pointer;
        }

        .question-indicator {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #ddd;
            margin: 0 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .green {
            background-color: #28a745;
            color: #fff;
        }

        #next-btn,
        #submit-btn {
            font-size: 1.2rem;
            width: 150px;
        }
    </style>
</head>
<body>

<div class="container ml-5 mt-5">
        <div class="row">
            <div class="col-11">
                <div id="question-container" class="row"></div>
                    <div id="options-container" class="options row"></div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <button id="submit-btn" class="btn btn-success" onclick="submitQuiz()" style="display: none;">Submit</button>
                            <button id="next-btn" class="btn btn-primary" onclick="nextQuestion()">Next</button>
                        </div>
                    </div>
                <div id="question-indicator" class="question-indicator"></div>
            </div>
        </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Sample Questions and Options
    const questions = [

        <?php 
            $statement = $con->prepare("SELECT * FROM  user_level WHERE user_id=? and lang_id=?  ");
            $statement->execute(array($user['user_id'],$lang_id));
            $total3 = $statement->rowCount();   
            $result3 = $statement->fetch(PDO::FETCH_ASSOC);

            ($total3==0)?$id=1:$id=$result3['level_id']+1;


            $statement = $con->prepare("SELECT * FROM  question_table as q join option_table as o WHERE q.question_id=o.question_id and q.question_answer=o.option_id and q.question_lang= ? and q.question_level=? order by rand() ");
            $statement->execute(array($lang_id,$id));
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach($result as $row){

                $statement1 = $con->prepare("SELECT * FROM  option_table WHERE question_id=? ");
                $statement1->execute(array($row['question_id']));
                $result2 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                
        ?>
            {
                question: "<?php echo $row['question_name']; ?>",
                options: [<?php foreach($result2 as $row1){ ?>"<?php echo $row1['option_name']; ?>",<?php }?>],
                correctAnswer: "<?php echo $row['option_name']; ?>"
            },
        <?php }?>
    ];

    let currentQuestion = 0;
    let timer;

    // Display the current question and options
    function displayQuestion() {

                // Clear previous timer
                clearTimeout(timer);

                const questionContainer = document.getElementById("question-container");
                const optionsContainer = document.getElementById("options-container");
                const questionIndicator = document.getElementById("question-indicator");
                const timerDisplay = document.getElementById("timer-display");
                const currentQuestionData = questions[currentQuestion];

                // Create a Bootstrap card for the question and options
                const questionCard = `<div class="card bg-dark text-white col-12">
                                        <div class="card-body">
                                            <h4 class="card-title">${currentQuestionData.question}</h4>
                                            <p id="timer-display" >Time left: 10 seconds</p>
                                        </div>
                                    </div>`;

                questionContainer.innerHTML = questionCard;
                optionsContainer.innerHTML = `<div class="card bg-dark text-white col-12">
                                                <div class="card-body">
                                                ${currentQuestionData.options.map((option, index) => {
                    return `<div class="form-check">
                                <input class="form-check-input" type="radio" name="options" id="option${index}" value="${option}">
                                <label class="form-check-label" for="option${index}">
                                    ${option}
                                </label>
                            </div>`;
                }).join("")}
                                                </div>
                                            </div>`;

                // Set button text and behavior based on whether it's the last question
                const nextBtn = document.getElementById("next-btn");
                const submitBtn = document.getElementById("submit-btn");

                if (currentQuestion < questions.length - 1) {
                    nextBtn.style.display = "block";
                    submitBtn.style.display = "none";
                    nextBtn.innerText = "Next";
                } else {
                    nextBtn.style.display = "none";
                    submitBtn.style.display = "block";
                    submitBtn.innerText = "Submit";
                }

                // Update the question indicator circles
                questionIndicator.innerHTML = questions.map((_, index) => {
                    return `<div class="circle ${index === currentQuestion ? 'green' : ''}">${index + 1}</div>`;
                }).join("");

                // Start the countdown timer for the current question
                startTimer();

    }

    // Move to the next question
    function nextQuestion() {
        const selectedOption = document.querySelector('input[name="options"]:checked');

        // Save the selected answer
        questions[currentQuestion].selectedAnswer = selectedOption ? selectedOption.value : null;

        // Move to the next question
        currentQuestion++;

        if (currentQuestion < questions.length) {
            displayQuestion();
        } else {
            // If it's the last question, display the submit button
            displaySubmitButton();
        }
        
    }

    // Submit the quiz and display results
    function submitQuiz() {
        // You can add the logic for submitting the quiz here
        // alert("Quiz submitted!");
        let correctAnswers=0;
        let lang=<?php echo $lang_id; ?>;
        let level=<?php echo $id; ?>;
        
        // Check each question's answer
        questions.forEach(question => {
            if (question.selectedAnswer === question.correctAnswer) {
                correctAnswers++;
            }
        });


        $.ajax({
        type: "POST",
        url: "quiz_api.php",
        data: {
            clang: lang,
            clevel:level,
            cans:correctAnswers,
        },
        success: function (response) {
            // Handle success (you can show an alert or redirect the user)
            alert('Quiz has been completed')
            window.location.href='result.php?reference_no=<?php echo $lang_id; ?>&temp_no=<?php echo $id; ?>';

        },
        error: function (error) {
            // Handle error
            alert("Error submitting quiz results: " + error.responseText);
        }
    });

    }

    <?php 

        $statement4=$con->prepare("SELECT * FROM level_table WHERE level_id=?");
        $statement4->execute(array($id));
        $result4=$statement4->fetch(PDO::FETCH_ASSOC);

    ?>


    function startTimer() {
        let timeLeft = <?php echo $result4['level_time']; ?>; // 10 seconds countdown for each question (for testing purposes)
        const timerDisplay = document.getElementById("timer-display");

        function updateTimer() {
            timerDisplay.innerText = `Time left: ${timeLeft} seconds`;

            if (timeLeft <= 0) {
                // Automatically move to the next question or submit the test when the timer reaches zero
                if (currentQuestion < questions.length - 1) {
                    nextQuestion();
                } else {
                    // If it's the last question, submit the test
                    submitQuiz();
                }
            } else {
                timeLeft--;
                setTimeout(updateTimer, 1000);
            }
        }

        // Initial call to start the timer
        updateTimer();
    }

    // Initial display
    displayQuestion();
</script>

</body>
</html>





<?php require('footer.php'); ?>