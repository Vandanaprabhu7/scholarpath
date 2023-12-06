<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <!-- Add Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Application Form</h1>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea type="file" class="form-control" name="address" required></textarea>
            </div>
            <div class="mb-3">
                <label for="phoneno" class="form-label">Phone Number:</label>
                <input type="number" class="form-control" name="phoneno" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" @if($scl['gender']=='male' ) checked @endif>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" @if($scl['gender']=='female' ) checked @endif>
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="other" @if($scl['gender']=='other' ) checked @endif>
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>
            @if($scl['aadhar'] == 1)
            <div class="mb-3">
                <label for="aadhar" class="form-label">Aadhar Card:</label>
                <input type="file" class="form-control" name="aadhar" accept=".pdf" required>
            </div>
            @endif

            @if($scl['caste_certificate'] == 1)
            <div class="mb-3">
                <label for="caste_certificate" class="form-label">Caste Certificate:</label>
                <input type="file" class="form-control" name="caste_certificate" accept=".pdf" required>
            </div>
            @endif

            @if($scl['income_certificate'] == 1)
            <div class="mb-3">
                <label for="income_certificate" class="form-label">Income Certificate:</label>
                <input type="file" class="form-control" name="income_certificate" accept=".pdf" required>
            </div>
            @endif

            @if($scl['domicile_certificate'] == 1)
            <div class="mb-3">
                <label for="domicile_certificate" class="form-label">Domicile Certificate:</label>
                <input type="file" class="form-control" name="domicile_certificate" accept=".pdf" required>
            </div>
            @endif

            @if($scl['mark_sheets'] == 1)
            <div class="mb-3">
                <label for="mark_sheets" class="form-label">Mark Sheets:</label>
                <input type="file" class="form-control" name="mark_sheets" accept=".pdf" required>
            </div>
            @endif

            @if($scl['fee_receipt'] == 1)
            <div class="mb-3">
                <label for="fee_receipt" class="form-label">Fee Receipt:</label>
                <input type="file" class="form-control" name="fee_receipt" accept=".pdf" required>
            </div>
            @endif

            @if($scl['passport_photo'] == 1)
            <div class="mb-3">
                <label for="passport_photo" class="form-label">Passport Photo:</label>
                <input type="file" class="form-control" name="passport_photo" accept=".pdf" required>
            </div>
            @endif
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>

        <!-- Add Bootstrap JavaScript link (optional, if you need Bootstrap JS features) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>