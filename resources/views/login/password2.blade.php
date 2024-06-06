<html lang="en">
<br><br>
<img src="/images/logo.png" style="height:30px;width:180px;padding-left:10px">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        form {
            background-color: #fff;
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 70%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <br><br>
    <form class="reg-form" id="passwordResetForm" action="{{ route('change') }}" method="post">
        {!! csrf_field() !!}

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" style="background-color:#f0f0f0;" value="<?php echo isset($_COOKIE['userEmail']) ? htmlspecialchars($_COOKIE['userEmail']) : ''; ?>" readonly>
        <br>
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="cpassword">Confirm Password:</label>
        <input type="password" id="cpassword" name="cpassword" required>
        <br>
        <button type="submit">Reset Password</button>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>

    <script>
        (function() {
            document.querySelector("#passwordResetForm").addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent the default form submission
                let password = document.getElementById('password').value;
                let confirmPassword = document.getElementById('cpassword').value;
                let isValid = true;
                if (password === "") {
                    isValid = false;
                    swal("Error", "Password is required field", "error");
                } else if (!isPasswordValid(password)) {
                    isValid = false;
                }
                if (confirmPassword === "") {
                    isValid = false;
                    swal("Error", "Confirm Password is required field", "error");
                } else if (confirmPassword !== password) {
                    isValid = false;
                    swal("Error", "Password and Confirm Password do not match", "error");
                }
                if (isValid) {
                    Cookies.remove('userEmail');
                    swal({
                        title: "Resetting Password...",
                        text: "Password reset successful.",
                        icon: "success",
                        timer: 3000,
                        buttons: false,
                    });
                    document.getElementById("passwordResetForm").submit();
                }
            });

            function isPasswordValid(password) {
                if (!/^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,}$/.test(password)) {
                    swal("Error", "Password should have 8 characters with at least one number, one capital letter, and one symbol", "error");
                    return false;
                }
                return true;
            }
        })();
    </script>
</body>

<?php

if (isset($_COOKIE['userEmail'])) {
    $userEmail = $_COOKIE['userEmail'];
} else {
    $userEmail = null;
}

?>


</html>