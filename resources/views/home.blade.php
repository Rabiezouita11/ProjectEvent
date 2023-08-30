<!DOCTYPE html>
<html>
<head>
    <title>Generate QR Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Generate QR Code</h1>

        <form action="{{ route('generate-qr') }}" method="GET" class="row g-3">
            <div class="col-md-6">
                <label for="event_id" class="form-label">Event ID:</label>
                <input type="text" name="event_id" id="event_id" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="event_name" class="form-label">Event Name:</label>
                <input type="text" name="event_name" id="event_name" class="form-control" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Generate QR Code</button>
            </div>
        </form>

        @if(isset($qrFilename))
            <div class="mt-4">
                <a href="{{ route('download-qr', ['filename' => $qrFilename]) }}" download="qr_code.png" class="btn btn-success">
                    Download QR Code
                </a>
            </div>
        @endif
    </div>
</body>
</html>
