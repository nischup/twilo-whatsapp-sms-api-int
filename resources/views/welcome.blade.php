<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Whatsapp Twilo API</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="m-4">
    <form action="{{ route('send-whatsapp-sms') }}" method="POST">
        @csrf <!-- This is required for Laravel's CSRF protection -->

        <div class="mb-3">
            <label class="form-label" for="inputPassword">Mobile</label>
            <input type="number" class="form-control" name="number" id="inputPassword" placeholder="number" required>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
</body>
</html>