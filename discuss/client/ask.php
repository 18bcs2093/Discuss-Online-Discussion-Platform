
<div class="ask-page">

    <div class="ask-container">

        <!-- HEADER -->

        <div class="ask-header">

            <div class="ask-icon">
                ?
            </div>

            <div>
                <h1 class="ask-heading">
                    Ask a Question
                </h1>

                <p class="ask-subtitle">
                    Get help from the community by asking a clear and detailed question.
                </p>
            </div>

        </div>


        <!-- FORM -->

        <form method="post" action="./server/requests.php">

            <div class="question-form">


                <!-- TITLE -->

                <div class="form-group">

                    <label for="title">
                        Question Title
                    </label>

                    <span class="field-hint">
                        Be specific and concise
                    </span>

                    <input
                        type="text"
                        name="title"
                        id="title"
                        placeholder="e.g. How do I connect PHP with MySQL?"
                        required
                    >

                </div>


                <!-- DESCRIPTION -->

                <div class="form-group">

                    <label for="description">
                        Description
                    </label>

                    <span class="field-hint">
                        Explain your question in detail
                    </span>

                    <textarea
                        name="description"
                        id="description"
                        placeholder="Describe your problem, what you have tried, and what result you expected..."
                        required
                    ></textarea>

                </div>


                <!-- CATEGORY -->

                <div class="form-group">

                    <label for="category">
                        Category
                    </label>

                    <span class="field-hint">
                        Choose the most relevant category
                    </span>

                    <div class="category-select">

                        <?php include("category.php")?>

                    </div>

                </div>


            </div>


            <!-- BUTTON -->

            <div class="question-button">

                <a href="./" class="cancel-btn">
                    Cancel
                </a>

                <button
                    type="submit"
                    name="ask"
                    class="ask-submit-btn">

                    Ask Question

                </button>

            </div>

        </form>

    </div>

</div>




