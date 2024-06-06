@extends('layout')
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
                    <a class="nav-link active" style="background:none" aria-current="page" href="/">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navigation ends -->

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="container mb-4">
            <form id="searchForm" class="form-inline position-relative" onsubmit="return false;">
                <div class="form-group">
                    <label for="searchInput" class="sr-only">Search Scholarships</label>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search Scholarships">
                    <span id="close-btn" onclick="clearSearchInput()">&times;</span>
                </div><br>
                <button type="button" class="btn btn-primary ml-2" onclick="searchScholarships()">Search</button>
            </form>

            <style>
                #close-btn {
                    position: absolute;
                    top: 20%;
                    right: 10px;
                    transform: translateY(-50%);
                    cursor: pointer;
                }
            </style>
            <script>
                function searchScholarships() {
                    event.preventDefault();
                    var input, filter, scholarships, card, title, i, txtValue;
                    input = document.getElementById('searchInput');
                    filter = input.value.toUpperCase();
                    scholarships = document.getElementsByClassName('col-md-12 mb-4'); // Update the class name

                    for (i = 0; i < scholarships.length; i++) {
                        card = scholarships[i];
                        title = card.querySelector('.card-title');
                        txtValue = title.textContent || title.innerText;

                        // Update the condition to use includes for partial matching
                        if (txtValue.toUpperCase().includes(filter)) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                }

                function clearSearchInput() {
                    document.getElementById('searchInput').value = "";
                }
            </script>
        </div>
        <div class="col-md-3 ml-0" style="padding-left:0%">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Filter Options</h5>

                    <form action="{{ route('scholarships.index') }}" method="get">
                        <!-- Gender Dropdown -->
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Select</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="b">Any gender</option>
                        </select>

                        <label for="state">State:</label>
                        <select name="state" id="state" class="form-control">
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


                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary mt-3">Apply Filters</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Scholarships Cards with Small Image Box and Contents in Columns -->
        <div class="col-md-9">
            <div class="row">
                @foreach($scholarships as $index => $scholarship)
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="row">
                            <!-- Left Column for Small Image Box -->
                            <div class="col-md-3">
                                <div class="image-box">
                                    <!-- Dynamic Image in the Small Box -->
                                    <img src="{{ $scholarship->sclimg }}" alt="{{ $scholarship->sclname }}" class="small-image" style="height:100%;width:100%">
                                </div>
                            </div>

                            <!-- Right Column for Card Content -->
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $scholarship->sclname }}</h5><br>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($scholarship->eligibility, 150, $end='...') }}</p>
                                    <!-- You can customize the card as needed -->
                                    <a class="btn btn-outline-primary learnMoreBtn" id="learnMoreBtn{{ $index }}">Learn More</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="popup{{ $index }}" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup1(`{{$index}}`)">&times;</span>
                        <h5>{{ $scholarship->sclname }}</h5><br>
                        <p><strong>Eligibility:</strong> {{ $scholarship->eligibility }}</p>
                        <p><strong>Link:</strong> <a href="{{ $scholarship->link }}" target="_blank">{{ $scholarship->link }}</a></p>

                    </div>
                </div>
                <script>
                    document.getElementById('learnMoreBtn{{ $index }}').addEventListener('click', function() {
                        document.getElementById('popup{{ $index }}').style.display = 'block';
                    });

                    function closePopup1(index) {
                        document.getElementById('popup1' + index).style.display = 'none';
                    }
                </script>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        /* Adjust z-index to ensure the popup is on top */
    }

    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }
</style>