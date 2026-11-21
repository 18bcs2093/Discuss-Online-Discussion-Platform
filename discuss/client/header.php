<nav class="navbar navbar-expand-lg custom-navbar">

    <div class="container">

        <!-- LOGO -->

        <a class="navbar-brand" href="./">

            <img
                src="./public/logo.png"
                class="site-logo"
                alt="Discuss">

        </a>


        <!-- MOBILE TOGGLE -->

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        <!-- NAVIGATION -->

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav main-nav">


                <!-- HOME -->

                <li class="nav-item">

                    <a class="nav-link" href="./">
                        Home
                    </a>

                </li>


                <?php if(isset($_SESSION['user']) && isset($_SESSION['user']['username'])) { ?>


                    <!-- ASK QUESTION -->

                    <li class="nav-item">

                        <a
                            class="nav-link ask-btn"
                            href="?ask=true">

                            + Ask Question

                        </a>

                    </li>


                    <!-- MY QUESTIONS -->

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="?u-id=<?php echo $_SESSION['user']['user_id']; ?>">

                            My Questions

                        </a>

                    </li>


                    <!-- PROFILE -->

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="?profile=true">

                            Profile

                        </a>

                    </li>


                    <!-- SEARCH -->

                    <li class="nav-item nav-search-item">

                        <form
                            class="search-form"
                            action=""
                            method="get">

                            <div class="search-wrapper">

                                <span class="search-icon">
                                    🔍
                                </span>

                                <input
                                    class="search-input"
                                    name="search"
                                    type="search"
                                    placeholder="Search questions..."
                                    autocomplete="off">

                            </div>

                            <button
                                class="search-btn"
                                type="submit">

                                Search

                            </button>

                        </form>

                    </li>


                    <!-- USER / LOGOUT -->

                    <li class="nav-item logout-item">

                        <a
                            class="nav-link logout-link"
                            href="./server/requests.php?logout=true">

                            <?php
                            echo htmlspecialchars(
                                ucfirst($_SESSION['user']['username'])
                            );
                            ?>

                            <span class="logout-text">
                                Logout
                            </span>

                        </a>

                    </li>


                <?php } else { ?>


                    <!-- SEARCH -->

                    <li class="nav-item nav-search-item">

                        <form
                            class="search-form"
                            action=""
                            method="get">

                            <div class="search-wrapper">

                                <span class="search-icon">
                                    🔍
                                </span>

                                <input
                                    class="search-input"
                                    name="search"
                                    type="search"
                                    placeholder="Search questions..."
                                    autocomplete="off">

                            </div>

                            <button
                                class="search-btn"
                                type="submit">

                                Search

                            </button>

                        </form>

                    </li>


                    <!-- LOGIN -->

                    <li class="nav-item login-item">

                        <a
                            class="nav-link login-link"
                            href="?login=true">

                            Login

                        </a>

                    </li>


                    <!-- SIGN UP -->

                    <li class="nav-item">

                        <a
                            class="nav-link signup-btn"
                            href="?signup=true">

                            Sign Up

                        </a>

                    </li>


                <?php } ?>


            </ul>

        </div>

    </div>

</nav>
