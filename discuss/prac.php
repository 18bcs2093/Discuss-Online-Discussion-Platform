<!DOCTYPE html>
<html>
<head>
    <title>Simple Form</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;

            /* FLEXBOX: center the form */
            display: flex;
            justify-content: center;
            align-items: center;

            background: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .form-container {
            width: 500px;
            padding: 25px;

            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        /* GRID: arrange labels and inputs */
        .form-grid {
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 15px;
            align-items: center;
        }

        label {
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 9px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }

        textarea {
            height: 80px;
            resize: vertical;
        }

        /* FLEXBOX: arrange buttons horizontally */
        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;

            margin-top: 20px;
        }

        button {
            padding: 9px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="form-container">

        <h2>Registration Form</h2>

        <form method="POST" enctype="multipart/form-data">

            <div class="form-grid">

                <label for="name">Name</label>
                <input type="text" id="name" name="name">

                <label for="email">Email</label>
                <input type="email" id="email" name="email">

                <label for="password">Password</label>
                <input type="password" id="password" name="password">

                <label for="gender">Gender</label>
                <select id="gender" name="gender">
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

                <label for="message">Message</label>
                <input type="file" name="profile">


            </div>

            <div class="buttons">

                <button type="reset">Cancel</button>

                <button type="submit">Save</button>

            </div>

        </form>

    </div>

</body>
</html>

<?php

echo isset($_FILES['profile']['name']);

?>