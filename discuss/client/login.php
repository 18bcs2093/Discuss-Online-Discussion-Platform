
<div class="login-page">

    <div class="login-container">

        <!-- LOGIN HEADER -->

        <div class="login-header">

            <div class="login-icon">
                👤
            </div>

            <h1 class="login-heading">
                Welcome Back
            </h1>

            <p class="login-subtitle">
                Login to your Discuss account
            </p>

        </div>


        <!-- LOGIN FORM -->

        <form method="post" action="./server/requests.php">

            <div class="login-form">


                <!-- EMAIL -->

                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Enter your email"
                        autocomplete="email"
                        required
                    >

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >

                </div>


            </div>


            <!-- LOGIN BUTTON -->

            <div class="login-button">

                <button
                    type="submit"
                    name="login">

                    Login

                </button>

            </div>


        </form>


        <!-- SIGNUP LINK -->

        <div class="signup-link">

            Don't have an account?

            <a href="?signup=true">
                Sign Up
            </a>

        </div>

    </div>

</div>



