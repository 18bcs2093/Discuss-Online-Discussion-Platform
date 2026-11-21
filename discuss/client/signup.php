
<div class="signup-page">

    <div class="signup-container">

        <!-- SIGNUP HEADER -->

        <div class="signup-header">

            <div class="signup-icon">
                +
            </div>

            <h1 class="signup-heading">
                Create Account
            </h1>

            <p class="signup-subtitle">
                Join the Discuss community and start asking questions.
            </p>

        </div>


        <!-- SIGNUP FORM -->

        <form method="post" action="./server/requests.php">

            <div class="signup-form">


                <!-- USERNAME -->

                <div class="form-group">

                    <label for="username">
                        User Name
                    </label>

                    <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="Enter your name"
                        autocomplete="name"
                        required
                    >

                </div>


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
                        placeholder="Create a password"
                        autocomplete="new-password"
                        required
                    >

                    <span class="field-hint">
                        Choose a password you can remember.
                    </span>

                </div>


                <!-- ADDRESS -->

                <div class="form-group">

                    <label for="address">
                        Address
                    </label>

                    <input
                        type="text"
                        name="address"
                        id="address"
                        placeholder="Enter your address"
                        autocomplete="street-address"
                        required
                    >

                </div>


            </div>


            <!-- SIGNUP BUTTON -->

            <div class="signup-button">

                <button
                    type="submit"
                    name="signup">

                    Create Account

                </button>

            </div>


        </form>


        <!-- LOGIN LINK -->

        <div class="signup-login-link">

            Already have an account?

            <a href="?login=true">
                Login
            </a>

        </div>

    </div>

</div>



