<?php

include("./common/db.php");

/*
|--------------------------------------------------------------------------
| Check Login
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION['user']['user_id'])) {

    header("Location: ?login=true");
    exit();

}


/*
|--------------------------------------------------------------------------
| Get Logged-in User ID
|--------------------------------------------------------------------------
*/

$user_id = (int) $_SESSION['user']['user_id'];


/*
|--------------------------------------------------------------------------
| Get User Information
|--------------------------------------------------------------------------
*/

$userQuery = "
    SELECT *
    FROM users
    WHERE id = ?
";

$stmt = $conn->prepare($userQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$userResult = $stmt->get_result();
$user = $userResult->fetch_assoc();


/*
|--------------------------------------------------------------------------
| If User Doesn't Exist
|--------------------------------------------------------------------------
*/

if (!$user) {

    echo "User not found.";
    exit();

}


/*
|--------------------------------------------------------------------------
| User Details
|--------------------------------------------------------------------------
*/

$username = ucfirst($user['username']);

$email = $user['email'];

$address = $user['address'];


/*
|--------------------------------------------------------------------------
| Questions Count
|--------------------------------------------------------------------------
*/

$questionQuery = "
    SELECT COUNT(*) AS total_questions
    FROM questions
    WHERE user_id = ?
";

$stmt = $conn->prepare($questionQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$questionResult = $stmt->get_result();
$questionData = $questionResult->fetch_assoc();

$totalQuestions = $questionData['total_questions'];


/*
|--------------------------------------------------------------------------
| Answers Count
|--------------------------------------------------------------------------
*/

$answerQuery = "
    SELECT COUNT(*) AS total_answers
    FROM answers
    WHERE user_id = ?
";

$stmt = $conn->prepare($answerQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$answerResult = $stmt->get_result();
$answerData = $answerResult->fetch_assoc();

$totalAnswers = $answerData['total_answers'];


/*
|--------------------------------------------------------------------------
| Get User Questions
|--------------------------------------------------------------------------
*/

$questionsQuery = "
    SELECT id, title
    FROM questions
    WHERE user_id = ?
    ORDER BY id DESC
";

$stmt = $conn->prepare($questionsQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$questionsResult = $stmt->get_result();

?>

<div class="profile-page">

    <div class="profile-container">


        <!-- =========================================
             PROFILE HEADER
        ========================================== -->

        <div class="profile-header">

            <div class="profile-avatar">
                <?php echo strtoupper(substr($username, 0, 1)); ?>
            </div>

            <h1>
                <?php echo htmlspecialchars($username); ?>
            </h1>

            <p>
                <?php echo htmlspecialchars($email); ?>
            </p>

        </div>


        <!-- =========================================
             STATISTICS
        ========================================== -->

        <div class="profile-stats">


            <div class="stat-box">

                <div class="stat-number">
                    <?php echo $totalQuestions; ?>
                </div>

                <div class="stat-label">
                    Questions Asked
                </div>

            </div>


            <div class="stat-box">

                <div class="stat-number">
                    <?php echo $totalAnswers; ?>
                </div>

                <div class="stat-label">
                    Answers Given
                </div>

            </div>


            <div class="stat-box">

                <div class="stat-number">

                    <?php

                    if (isset($user['created_at'])) {

                        echo date("Y", strtotime($user['created_at']));

                    } else {

                        echo "2026";

                    }

                    ?>

                </div>

                <div class="stat-label">
                    Member Since
                </div>

            </div>


        </div>


        <!-- =========================================
             ABOUT
        ========================================== -->

        <div class="profile-section">

            <h2>
                About
            </h2>

            <p class="about-text">

                <?php

                if (!empty($address)) {

                    echo htmlspecialchars($address);

                } else {

                    echo "Computer Science enthusiast and Discuss community member.";

                }

                ?>

            </p>

        </div>


        <!-- =========================================
             MY QUESTIONS
        ========================================== -->

        <div class="profile-section">

            <div class="section-heading">

                <h2>
                    My Questions
                </h2>

                <span class="question-count">
                    <?php echo $totalQuestions; ?>
                </span>

            </div>


            <div class="question-list">


                <?php if ($questionsResult->num_rows > 0) { ?>


                    <?php while ($question = $questionsResult->fetch_assoc()) { ?>


                        <a
                            href="?q-id=<?php echo $question['id']; ?>"
                            class="profile-question"
                        >

                            <span class="question-title">

                                <?php
                                echo htmlspecialchars($question['title']);
                                ?>

                            </span>

                            <span class="question-arrow">
                                →
                            </span>

                        </a>


                    <?php } ?>


                <?php } else { ?>


                    <div class="empty-questions">

                        <div class="empty-icon">
                            ?
                        </div>

                        <h3>
                            No questions yet
                        </h3>

                        <p>
                            You haven't asked any questions yet.
                        </p>

                        <a href="?ask=true" class="ask-question-btn">
                            Ask Your First Question
                        </a>

                    </div>


                <?php } ?>


            </div>

        </div>


        <!-- =========================================
             PROFILE INFORMATION
        ========================================== -->

        <div class="profile-section">

            <h2>
                Account Information
            </h2>

            <div class="account-info">


                <div class="info-row">

                    <span class="info-label">
                        Username
                    </span>

                    <span class="info-value">
                        <?php echo htmlspecialchars($username); ?>
                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Email
                    </span>

                    <span class="info-value">
                        <?php echo htmlspecialchars($email); ?>
                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Address
                    </span>

                    <span class="info-value">
                        <?php echo htmlspecialchars($address); ?>
                    </span>

                </div>


            </div>

        </div>


    </div>

</div>


