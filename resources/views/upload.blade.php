<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Upload</title>
    <style>
        .custom-file-input.selected:lang(en)::after {
            content: "" !important;
        }

        .custom-file {
            overflow: hidden;
        }

        .custom-file-input {
            white-space: nowrap;
        }
    </style>
</head>
<body class="bg-body-tertiary">
<div class="container">
    <main>
        <div class="py-5">
            @if(Session::has('message'))
                <p>{{ Session::get('message') }}</p>
            @endif
            <form action="/uploadFile" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file"
                               onchange="updateFileName(this)">
                        <label class="custom-file-label" for="file">Select File:</label>
                    </div>
                    <div class="input-group-append">
                        <input type="submit" name="submit" value="upload" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <div class="py-5">
            <a href="{{ url('/result') }}" class="w-100 btn btn-primary btn-lg">Show result</a>
        </div>
    </main>
</div>
</body>
</html>
<script>
    function updateFileName(input) {
        const label = input.nextElementSibling;
        const fileName = input.files[0]?.name || 'Select File:';
        label.textContent = fileName;
    }
</script>
<script>
    function updateFileName(input) {
        const label = input.nextElementSibling;
        const fileName = input.files[0]?.name || 'Select File:';
        label.textContent = fileName;
    }
</script>
