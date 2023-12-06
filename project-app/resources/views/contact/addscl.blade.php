@extends('layout')
<!-- Navigation menu -->
<html>

<body>
    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container-fluid" style="margin-bottom:2%">
            <img src="/images/logo.png" style="height:30px;width:180px;padding-left:10px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" style="background:none" aria-current="page" href="/">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation ends -->
    @section('content')

    <form action="{{ route('pvtscl.store') }}" method="post">
        @csrf

        <div class="form-row">
            <label for="sclname">Scholarship Name:</label>
            <input type="text" minlength="5" name="sclname" required>
        </div>

        <div class="form-row">
            <label for="eligibility">Eligibility:</label>
            <textarea name="eligibility" minlength="30" rows="4" required></textarea>
        </div>

        <div class="form-row">
            <label for="link">Link:</label>
            <input type="url" name="link" required>
        </div>

        <div class="form-row">
            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="" selected disabled>Select</option>
                <option value="m">Male</option>
                <option value="f">Female</option>
                <option value="b">Any gender</option>
            </select>
        </div>

        <div class="form-row">
            <label for="state">State:</label>
            <select name="state" id="state" class="form-control">
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

        <div class="form-row">
            <label>Required Documents:</label>
            <div class="checkbox-group">
                <label for="income_certificate">Income Certificate</label>
                <input type="checkbox" name="income_certificate">

                <label for="domicile_certificate">Domicile Certificate</label>
                <input type="checkbox" name="domicile_certificate">

                <label for="mark_sheets">Mark Sheets</label>
                <input type="checkbox" name="mark_sheets">
            </div>
        </div>

        <div class="form-row">
            <label></label>
            <div class="checkbox-group">
                <label for="fee_receipt">Fee Receipt</label>
                <input type="checkbox" name="fee_receipt">

                <label for="passport_photo">Passport Size Photo</label>
                <input type="checkbox" name="passport_photo">
            </div>
        </div>

        <input type="hidden" name="token" id="token">
        <script>
            let token = localStorage.getItem('token');
            document.getElementById('token').value = token;
        </script>
        <button type="submit">Submit</button>

        @endsection
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
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
                /* Full width by default */
                max-width: 400px;
                /* Adjust the max-width as needed */
            }

            input[type="checkbox"] {
                width: auto;
                margin-right: 5px;
                flex-shrink: 0;
                transform: scale(0.8);
                /* Adjust the scale to make checkboxes smaller */
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
    </form>
</body>

</html>
<!-- JavaScript to Populate the State dropdown -->