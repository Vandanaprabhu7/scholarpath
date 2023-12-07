<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Scholarships</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
</head>

<body class="container mt-5">
    <h1 class="mb-4">Scholarship Applications</h1>
    @if (!empty($applications))
    <ul class="list-group">
        @foreach ($applications as $key => $application)
        <li class="list-group-item">
            <strong>Applied Scholarship name: {{ $application['schlname'] }}</strong>
            <br><br><br>
            <p><strong>Name:</strong> {{ $application['name'] }}</p>
            <p><strong>Address:</strong> {{ $application['address'] }}</p>
            <p><strong>Phone Number:</strong> {{ $application['phoneno'] }}</p>
            <p><strong>Email:</strong> {{ $application['email'] }}</p>
            <p><strong>Gender:</strong> {{ $application['gender'] }}</p>
            <p><strong>Documents:</strong></p>
            <p>

            <div class="mt-2">
                @foreach ($application as $fileKey => $filePath)
                @if ($fileKey !== 'name' && $fileKey !== 'address' && $fileKey !== 'phoneno'
                && $fileKey !== 'email' && $fileKey !== 'gender' && !is_null($filePath)
                && $fileKey !== 'ptoken' && $fileKey !== 'sclname' && $fileKey !== 'schlname')
                @php
                $customButtonNames = [
                'filepath1' => 'Aadhar Card',
                'filepath2' => 'Caste Certificate',
                'filepath3' => 'Income Certificate',
                'filepath4' => 'Domacile Certificate',
                'filepath5' => 'Marks Sheet',
                'filepath6' => 'Fee Receipt',
                'filepath7' => 'Passport Photo',
                // Add more custom names for other file paths
                ];
                @endphp

                @if (array_key_exists($fileKey, $customButtonNames))
                <a href="{{ url($filePath) }}" class="btn btn-primary" target="_blank">
                    {{ $customButtonNames[$fileKey] }}
                </a>
                @else
                <a href="{{ url($filePath) }}" class="btn btn-primary" target="_blank">
                    {{ ucfirst($fileKey) }}
                </a>
                @endif

                @endif
                @endforeach
            </div>
        </li>
        @endforeach
    </ul>
    @else
    <p class="alert alert-warning">No applications available.</p>
    @endif

    <!-- Script to show PDF using PDF.js -->
    <script>
        function showPdf(pdfPath) {
            // Fetch the PDF file
            fetch(pdfPath)
                .then(response => response.arrayBuffer())
                .then(data => {
                    // Load PDF.js
                    pdfjsLib.getDocument({
                        data: data
                    }).promise.then(pdf => {
                        // Render the first page
                        pdf.getPage(1).then(page => {
                            const canvas = document.createElement('canvas');
                            const context = canvas.getContext('2d');

                            // Set canvas dimensions to the page size
                            const viewport = page.getViewport({
                                scale: 1
                            });
                            canvas.height = viewport.height;
                            canvas.width = viewport.width;

                            // Render the PDF page on the canvas
                            page.render({
                                canvasContext: context,
                                viewport: viewport
                            });

                            // Display the canvas in a modal or overlay
                            showModal(canvas);
                        });
                    });
                })
                .catch(error => console.error('Error loading PDF:', error));
        }

        function showModal(content) {
            // Replace this with your logic to display the PDF content
            alert('Show PDF in a modal or overlay');
        }
    </script>
</body>

</html>