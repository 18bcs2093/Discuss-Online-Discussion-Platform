
<div class="container question-details-page">

    <div class="row">

        <!-- =========================
             MAIN QUESTION SECTION
        ========================== -->

        <div class="col-8">

            <?php

            include("./common/db.php");

            $query = "SELECT * FROM questions WHERE id=$qid";

            $result = $conn->query($query);

            $row = $result->fetch_assoc();

            $cid = $row['category_id'];

            ?>

            <!-- QUESTION CARD -->

            <div class="question-detail-card">

                <div class="question-header">

                    <span class="question-label">
                        Question
                    </span>

                    <span class="question-number">
                        #<?php echo $qid; ?>
                    </span>

                </div>


                <h1 class="question-title">
                    <?php echo $row['title']; ?>
                </h1>


                <div class="question-description">
                    <?php echo $row['description']; ?>
                </div>


                <div class="question-footer">

                    <span>
                        Asked in this community
                    </span>

                </div>

            </div>


            <!-- =========================
                 ANSWERS
            ========================== -->

            <div class="answers-section">

                <h2 class="section-title">
                    Answers
                </h2>

                <?php
                include("answers.php");
                ?>

            </div>


            <!-- =========================
                 WRITE ANSWER
            ========================== -->

            <div class="answer-box">

                <h2 class="section-title">
                    Write Your Answer
                </h2>

                <form method="post" action="./server/requests.php">

                    <input
                        type="hidden"
                        name="question_id"
                        value="<?php echo $qid; ?>"
                    >


                    <textarea
                        name="answer"
                        class="answer-textarea"
                        placeholder="Write your answer here..."
                        required
                    ></textarea>


                    <div class="answer-submit">

                        <button
                            type="submit"
                            class="submit-answer-btn"
                        >
                            Post Your Answer
                        </button>

                    </div>

                </form>

            </div>

        </div>


        <!-- =========================
             RIGHT SIDEBAR
        ========================== -->

        <div class="col-4">

            <?php

            $categoryQuery =
                "SELECT name FROM category WHERE id=$cid";

            $categoryResult =
                $conn->query($categoryQuery);

            $categoryRow =
                $categoryResult->fetch_assoc();

            ?>


            <!-- CATEGORY CARD -->

            <div class="related-card">

                <div class="related-header">

                    <span class="related-label">
                        Category
                    </span>

                    <h2>
                        <?php
                        echo ucfirst($categoryRow['name']);
                        ?>
                    </h2>

                </div>


                <div class="related-body">

                    <h3>
                        Related Questions
                    </h3>


                    <?php

                    $query =
                        "SELECT * FROM questions
                         WHERE category_id=$cid
                         AND id!=$qid";

                    $result =
                        $conn->query($query);


                    if($result->num_rows > 0){

                        foreach ($result as $row) {

                            $id = $row['id'];

                            $title = $row['title'];

                            echo "

                            <a
                                href='?q-id=$id'
                                class='related-question'
                            >

                                <span class='related-question-title'>
                                    $title
                                </span>

                                <span class='related-arrow'>
                                    →
                                </span>

                            </a>

                            ";
                        }

                    }else{

                        echo "
                        <div class='no-related'>
                            No related questions found.
                        </div>
                        ";

                    }

                    ?>

                </div>

            </div>

        </div>

    </div>

</div>


