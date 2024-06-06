<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }



        .navbar-brand img {
            height: 30px;
            width: 180px;
            padding-left: 10px;
        }

        .navbar-nav {
            margin-right: 90px;
        }

        .navbar-dark .navbar-toggler-icon {
            border-color: blue;
        }

        .container-form {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 800px;
            box-sizing: border-box;
        }

        label {
            display: inline-block;
            margin-bottom: 8px;
            width: 150px;
        }

        .form-row {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 16px;
        }

        .form-row .checkbox-group {
            display: flex;
            gap: 10px;
            flex: 1;
        }

        .form-row input,
        .form-row textarea,
        .form-row select {
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px;
            width: 100%;
            max-width: 400px;
        }

        input[type="checkbox"] {
            width: auto;
            margin-right: 5px;
            flex-shrink: 0;
            transform: scale(0.8);
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/images/logo.png" alt="Your Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="background-container">
        <style>
            .background-container::before {
                content: "";
                background-image: url(https://images.all-free-download.com/images/graphiclarge/blue_abstract_background_310971.jpg);
                /* Set the path to your background image */
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                opacity: 0.3;
                /* Adjust the opacity value here */
            }

            .close-button {
                position: absolute;
                right: 195px;
                font-size: 25px;
                cursor: pointer;
                background: lightskyblue;
                border: transparent;
                border-radius: 50%;
                width: 30px;
                padding-bottom: 4px;
                height: 30px;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
        </style>
        <div class="container container-form mt-4" style="position: relative; bottom: 90px;">

            <form action="{{ route('pvtscl.store') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <h2 class="mb-4">Scholarship Addition Form</h2><br>
                <a href="/thanksAdmin" class="close-button" style="top:10%;text-decoration: none;">x</a>
                <div class="form-group">
                    <label for="sclname">Scholarship Name:</label>
                    <input type="text" minlength="5" name="sclname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="eligibility">Eligibility:</label>
                    <textarea name="eligibility" minlength="30" rows="4" class="form-control" required></textarea>
                </div>

                <div class="form-group1">
                    <label for="link">Link:</label>
                    <input type="url" name="link" class="form-control" required>
                </div>

                <style>
                    .form-group1 {
                        display: inline-block;
                        margin-right: 60px;
                        /* Adjust the value as needed for the desired space between form groups */
                    }
                </style>

                <div class="form-group1">
                    <label for="gender">Gender:</label>
                    <select name="gender" class="form-control" required>
                        <option value="" selected disabled>Select</option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                        <option value="b">Any gender</option>
                    </select>
                </div>

                <div class="form-group1">
                    <label for="state">State:</label>
                    <select name="state" id="state" class="form-control" required>
                        <option value="" selected disabled>Select</option>
                        <option value="All India">All India</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>

                <style>
                    .checkbox-group label {
                        display: inline-block;
                        margin-right: 50px;
                        white-space: nowrap;
                    }
                </style>

                <div class="form-group">
                    <label><br>Documents:</label>
                    <div class="checkbox-group">
                        <label for="income_certificate">
                            <input type="checkbox" name="income_certificate">
                            Income Certificate
                        </label>

                        <label for="domicile_certificate">
                            <input type="checkbox" name="domicile_certificate">
                            Domicile Certificate
                        </label>

                        <label for="mark_sheets">
                            <input type="checkbox" name="mark_sheets">
                            Mark Sheets
                        </label>

                        <label for="fee_receipt">
                            <input type="checkbox" name="fee_receipt">
                            Fee Receipt
                        </label>

                        <label for="passport_photo">
                            <input type="checkbox" name="passport_photo">
                            Passport Size Photo
                        </label>
                    </div>
                </div>

                <input type="hidden" name="token" id="token">
                <script>
                    let token = localStorage.getItem('token');
                    document.getElementById('token').value = token;
                </script>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <!-- Bootstrap JS and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
</body>

</html>