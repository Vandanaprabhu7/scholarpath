<!DOCTYPE html>
<html lang="en">
<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid">
        <img src="/images/logo.png" style="height:30px;width:180px;padding-left:10px">
    </div>
</nav>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            /* Prevents content overflow */
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="number"] {
            width: 70%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 10px;
        }

        a {
            color: #007bff;
        }

        /* Hide increment and decrement arrows in number input */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Footer CSS
footer{
  background: #4070f4;
  padding: 20px 0;
  text-align: center;
  font-family: 'Poppins', sans-serif;
}
footer .text span{
  font-size: 17px;
  font-weight: 400;
  color: #fff;
}
footer .text span a{
  font-weight: 500;
  color: #ffffff;
}
footer .text span a:hover{
  text-decoration: underline;
} */
    </style>
</head>

<body>
    <div>
        <form id="resetform" action="/password2" method="post">
            {!! csrf_field() !!}

            <h1>Forgot Password</h1>
            <div class="container">
                <p>Forgotten your password? Please enter your email address below, we'll send you an Verification Code.</p>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" required>

                <button type="button" id="sendbtn" onclick="sendCode()">Send Code</button>

                <br><br><br>
                <label for="otp">Enter Verification Code:</label>
                <input type="number" id="otp" disabled oninput="if (this.value.length > 6) this.value = this.value.slice(0, 6);" maxlength="6">

                <button onclick="verifyCode()" id="verifyBtn" disabled>Verify Code</button>

            </div>
            <p>Remember your password? <a href="/login">Log in</a></p>
        </form>

        <footer style="position: fixed; left: 0; bottom: 0; width: 100%; background: #4070f4; text-align: center;padding:20px">
            <div class="text">
                <span style="color:white">&copy; 2023 ScholarPath. All rights reserved</span>
            </div>
        </footer>
</body>

<script src="https://smtpjs.com/v3/smtp.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>

<script>
    let generatedCode = "";

    function sendCode() {
        document.getElementById("sendbtn").setAttribute("disabled", "disabled");
        const email = document.getElementById("email").value;
        if (email.trim() === "") {
            Swal.fire("Error", "Email is a required field", "error");
        } else if (!email.endsWith("@gmail.com") && !email.endsWith("@yahoo.com") && !email.endsWith("@nmamit.in")) {
            Swal.fire("Error", "Invalid Email", "error");
        } else {
            generatedCode = generateRandomCode(6); // Generate a 6-digit random code
            Email.send({
                Host: "smtp.elasticemail.com",
                Username: "vandanaprabhu702@gmail.com",
                Password: "ECE65D1578529A982F0CCF537C56FD007684",
                To: email,
                From: 'vandanaprabhu702@gmail.com',
                Subject: "Verification Code",
                Body: "Your verification code is: " + generatedCode,
            }).then(() => {
                Swal.fire({
                    title: "Verification Code Sent",
                    text: "Check your email for the Verification Code (Check spam folder as well)",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false,
                });
                const tokenEmail = document.getElementById("email").value;
                Cookies.set('userEmail', tokenEmail, {
                    expires: 1
                });
                document.getElementById("otp").removeAttribute("disabled");
                document.getElementById("verifyBtn").removeAttribute("disabled");
            });
        }
    }

    function generateRandomCode(length) {
        const charset = "0123456789";
        let code = "";
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            code += charset[randomIndex];
        }
        return code;
    }

    function verifyCode() {
        const inputCode = document.getElementById("otp").value;
        if (inputCode === generatedCode) {
            Swal.fire("Success", "Code Verified", "success");
            document.getElementById("otp").value = "";
            document.getElementById("email").value = "";
            document.getElementById("email").setAttribute("disabled", "disabled");
            document.getElementById("otp").setAttribute("disabled", "disabled");
            document.getElementById("sendbtn").setAttribute("disabled", "disabled");
            document.getElementById("verifyBtn").setAttribute("disabled", "disabled");
            document.getElementById("resetform").submit();
        } else if (inputCode.trim() === "") {
            event.preventDefault();
            document.getElementById("email").setAttribute("disabled", "disabled");
            Swal.fire("Error", "Code is not filled", "error");
            document.getElementById("otp").value = "";
        } else {
            event.preventDefault();
            Swal.fire("Error", "Invalid Code, Please Verify again", "error");
            document.getElementById("email").setAttribute("disabled", "disabled");
            document.getElementById("otp").value = "";
        }
    }
</script>

</html>