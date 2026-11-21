
<div class="container questions-page">

    <div class="row">

        <!-- LEFT SIDE : QUESTIONS -->
        <div class="col-8">

            <div class="questions-header">
                <h1 class="heading">Questions</h1>

                <a href="?latest=1" class="latest-btn">
                    Latest Questions
                </a>
            </div>

            <?php
            include("./common/db.php");

            if(isset($_GET['c-id'])){
                $query="SELECT * FROM questions WHERE category_id=$cid";
            }
            else if(isset($_GET['u-id'])){
                $query="SELECT * FROM questions WHERE user_id=$uid";
            }
            else if(isset($_GET['latest'])){
                $query="SELECT * FROM questions ORDER BY id DESC";
            }
            else if(isset($_GET['search'])){
                $query="SELECT * FROM questions WHERE title LIKE '%$search%'";
            }
            else{
                $query="SELECT * FROM questions";
            }

            $result=$conn->query($query);

            if($result->num_rows > 0){

                foreach($result as $row){

                    $title=$row['title'];
                    $id=$row['id'];

                    echo "
                    <div class='question-card'>

                        <div class='question-content'>

                            <a class='question-title' href='?q-id=$id'>
                                $title
                            </a>

                            <div class='question-meta'>
                                <span>Question #$id</span>
                                <span>•</span>
                                <span>Community Question</span>
                            </div>

                        </div>";

                        if(isset($uid)){
                            echo "
                            <div class='question-actions'>
                                <a class='delete-btn'
                                   href='./server/requests.php?delete=$id'
                                   onclick=\"return confirm('Are you sure you want to delete this question?');\">
                                   Delete
                                </a>
                            </div>";
                        }

                    echo "
                    </div>";
                }

            }else{

                echo "
                <div class='empty-state'>
                    <div class='empty-icon'>?</div>
                    <h3>No questions found</h3>
                    <p>There are no questions to display here.</p>
                </div>";
            }
            ?>

        </div>


        <!-- RIGHT SIDE : CATEGORIES -->
        <div class="col-4">

            <div class="category-card">

                <div class="category-header">
                    <h2>Categories</h2>
                </div>

                <div class="category-body">

                    <?php
                    include("./client/categorylist.php");
                    ?>

                </div>

            </div>

        </div>

    </div>

</div>

