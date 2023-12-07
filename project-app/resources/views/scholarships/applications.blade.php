<!DOCTYPE html>
<html lang="en">
@if($errors->has('ptoken'))
<div class="toast fade show position-fixed" role="alert" aria-live="assertive" aria-atomic="true" style="bottom: 490px; right: 10px; z-index: 1000;background-color:red">
    <div class="w3-panel w3-red">
        <div class="toast-header">
            <strong class="me-auto"> <img src="/images/logo.png" style="height:20px;width:180px;">
            </strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            One Application is already been submitted
        </div>
    </div>
</div>
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <!-- Navigation menu -->
    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container-fluid" style="margin-bottom:2%">
            <img src="/images/logo.png" style="height:30px;width:180px;padding-left:10px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" style="color:blue" aria-current="page" href="/thanks">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation ends -->
    <div class="container mt-5">

        <form action="" method="post" enctype="multipart/form-data" class="rounded p-4" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);margin-bottom:40%">
            <h4>Application Form</h4><br>
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
                <input type="text" class="form-control" name="phoneno" pattern="[0-9]{10}" title="Please enter a 10-digit number" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" @if($scl['gender']=='male' ) checked @endif>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" @if($scl['gender']=='female' ) checked @endif>
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
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