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
        function clearSearchInput() {
            document.getElementById('searchInput').value = "";
        }
    </script>
</div>
@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <!-- <div class="col-md-3 ml-0" style="padding-left:0%">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Filter Options</h5>

                    <form action="{{ route('scholarships.index') }}" method="get">
        <label for="gender">Gender:</label>
        <select name="gender" id="gender" class="form-control">
            <option value="">Select</option>
            <option value="m">Male</option>
            <option value="f">Female</option>
            <option value="b">Any gender</option>
        </select>

        <label for="state">State:</label>
        <select name="state" id="state" class="form-control"></select>

        <script>
            const indianStates = [
                'All India',
                'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chhattisgarh',
                'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jharkhand', 'Jammu & Kashmir', 'Karnataka',
                'Kerala', 'Madhya Pradesh', 'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram',
                'Nagaland', 'Odisha', 'Punjab', 'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Telangana',
                'Tripura', 'Uttar Pradesh', 'Uttarakhand', 'West Bengal'
            ];

            const stateDropdown = document.getElementById('state');
            indianStates.forEach(state => {
                const option = document.createElement('option');
                option.value = state;
                option.textContent = state;
                stateDropdown.appendChild(option);
            });
        </script>

        <button type="submit" class="btn btn-primary mt-3">Apply Filters</button>
        </form>
    </div>
</div>
</div> -->

        <!-- Scholarships Cards with Small Image Box and Contents in Columns -->
        <div class="col-md-9">
            <div class="row">
                @foreach($govtscholarships as $index => $scholarship)
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
                                    <a class="btn btn-outline-primary learnMoreBtn1" id="learnMoreBtn1{{ $index }}">Learn More</a>
                                </div>
                            </div>
                            <div id="popup1{{ $index }}" class="popup">
                                <div class="popup-content">
                                    <span class="close" onclick="closePopup1(`{{$index}}`)">&times;</span>
                                    <h5>{{ $scholarship->sclname }}</h5><br>
                                    <p><strong>Eligibility:</strong> {{ $scholarship->eligibility }}</p>
                                    <p><strong>Link:</strong> <a href="{{ $scholarship->link }}" target="_blank">{{ $scholarship->link }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('learnMoreBtn1{{ $index }}').addEventListener('click', function() {
                        document.getElementById('popup1{{ $index }}').style.display = 'block';
                    });

                    function closePopup1(index) {
                        document.getElementById('popup1' + index).style.display = 'none';
                    }
                </script>
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
                </script>
                @endforeach
                @foreach($pvtscholarships as $index => $scholarship)
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="row">
                            <!-- Left Column for Small Image Box -->
                            <div class="col-md-3">
                                <div class="image-box">
                                    <!-- Dynamic Image in the Small Box -->
                                    <img src="{{ $scholarship->image_url ?? 'https://www.ssims.edu.in/wp-content/uploads/2020/03/ssit-students-scholarship-loans.jpg' }}" alt="{{ $scholarship->sclname }}" class="small-image" style="height:100%;width:100%">
                                </div>
                            </div>

                            <!-- Right Column for Card Content -->
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $scholarship->sclname }}</h5><br>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($scholarship->eligibility, 150, $end='...') }}</p>
                                    <?php $provider = $scholarship->token;
                                    $id = $scholarship->id;
                                    ?> <a class="btn btn-outline-primary learnMoreBtn2" id="learnMoreBtn2{{ $index }}">Learn More</a>
                                    <a class="btn btn-primary submitbtn" id="submit" onclick="submit('{{$provider}}', '{{$id}}')">Apply</a>
                                    <script>
                                        function submit(provider, id) {
                                            window.location.href = "/apply/" + provider + "/" + id;
                                        }
                                    </script>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="popup2{{ $index }}" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup2(`{{$index}}`)">&times;</span>
                        <h5>{{ $scholarship->sclname }}</h5><br>
                        <p><strong>Eligibility:</strong> {{ $scholarship->eligibility }}</p>
                        <p><strong>Scholarship Provider:</strong> {{$scholarship->pname}}</p>
                        <p><strong>Contact Details:</strong> {{$scholarship->pemail}}</p>
                        <p><strong>Link:</strong> <a href="{{ $scholarship->link }}" target="_blank">{{ $scholarship->link }}</a></p>
                    </div>
                </div>
                <script>
                    document.getElementById('learnMoreBtn2{{ $index }}').addEventListener('click', function() {
                        document.getElementById('popup2{{ $index }}').style.display = 'block';
                    });

                    function closePopup2(index) {
                        document.getElementById('popup2' + index).style.display = 'none';
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