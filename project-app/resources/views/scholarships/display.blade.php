<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Scholarships</title>
</head>

<body>
    <h1>Scholarship Applications</h1>

    @if (!empty($applications))
    <ul>
        @foreach ($applications as $key => $path)
        <li>
            @if (!is_null($path))
            Filepath for {{ $key }}: localhost:8000{{$path }}

            {{-- Add a link to show the PDF using PDF.js --}}
            <a href="{{ $path }}" target="_blank">Show PDF</a>

            {{-- You can embed a PDF viewer or link to the file as needed --}}
            @endif
        </li>
        @endforeach
    </ul>
    @else
    <p>No applications available.</p>
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