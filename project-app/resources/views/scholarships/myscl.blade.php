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
<!-- {{-- Display the data --}}
    <ul>
        @foreach($pvtsclData as $data)
            <li>{{ $data->sclname }} - {{ $data->eligibility }} - {{ $data->gender }} - {{ $data->state }} - {{ $data->link }}</li>
            {{-- Add other fields as needed --}}
        @endforeach
    </ul> -->
<!-- Scholarships Cards with Small Image Box and Contents in Columns -->
<div class="col-md-9">
    <div class="row">
        @foreach($pvtsclData as $index => $scholarship)
        <div class="col-md-12 mb-4">
            <div class="card" style="margin-left:120px;">
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
                <span class="close" onclick="closePopup(`{{$index}}`)">&times;</span>
                <h5>{{ $scholarship->sclname }}</h5><br>
                <p><strong>Eligibility:</strong> {{ $scholarship->eligibility }}</p>
                <p><strong>Link:</strong> <a href="{{ $scholarship->link }}" target="_blank">{{ $scholarship->link }}</a></p>

            </div>
        </div>
        <script>
            document.getElementById('learnMoreBtn{{ $index }}').addEventListener('click', function() {
                document.getElementById('popup{{ $index }}').style.display = 'block';
            });

            function closePopup(index) {
                document.getElementById('popup' + index).style.display = 'none';
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