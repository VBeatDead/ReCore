<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Your+Font+Name&display=swap">
    <link rel="icon" type="image/png" href="{{ asset('img/log.png') }}">
    <link rel="stylesheet" href="{{ asset('css/sideoff.css') }}">

    <style>
        body {
            background-color: #EBF9FF;
        }

        a {
            text-decoration: none;
            color: #000000;
        }

        .sizeslide {
            height: auto;
        }

        .carousel-item {
            position: relative;
        }

        .carousel-item::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.6) 100%);
            z-index: 1;
        }

        .carousel-item img {
            width: 100%;
            height: 700px;
            object-fit: cover;
            z-index: 0;
        }

        .desc {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            z-index: 2;
            text-align: center;
        }

        .sidelist {
            padding: 80px;
        }

        .listitem {
            height: auto;
            padding: 40px;
            align-items: center;
            justify-content: center;
            background-color: #2693C9;
        }

        .itempopular .list-group-item {
            padding-bottom: 15px;
            border-top: 1px solid #000000;
            position: relative;
        }

        .list-group-item::before {
            content: "• ";
            position: absolute;
            left: -20px;
        }

        .hak {
            padding: 40px;
            color: #EBF9FF;
            background-color: #386FA4;
        }

        .logok {
            display: flex;
            padding-left: 8%;
            align-items: center;
        }

        .logok img {
            width: 94px;
            margin-right: 10px;
        }

        .logok p {
            color: #EBF9FF;
            font-size: 50px;
            margin-left: 20px;
            text-align: center;
            font-weight: bold;
        }

        .hak2 {
            color: #EBF9FF;
            background-color: #2693C9;
        }

        .add {
            width: 100%;
            height: auto;
            padding-top: 1%;
            padding-left: 20%;
            padding-right: 20%;
            padding-bottom: 3%;
            justify-content: center;
        }

        .news {
            width: 100%;
            height: auto;
            padding-top: 3%;
            padding-left: 20%;
            padding-right: 20%;
            text-align: center;
            justify-content: center;
        }
    </style>

    @include('partials._sideoff')
</head>

<body>
    <h1 class="news">Add News</h1>
    <div class="add">
        <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title')}}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="photoUrl" class="form-label">Photo</label>
                <input type="file" class="form-control @error('photoUrl') is-invalid @enderror" id="photoUrl" name="photoUrl" accept="image/*">
                
                @error('photoUrl')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            
                <div class="text-muted">Max file size: 2MB</div>
            </div>
            
            <script>
                document.getElementById('photoUrl').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    const maxSize = 2 * 1024 * 1024;
            
                    if (file && file.size > maxSize) {
                        alert("File is too large. Max size is 2 MB.");
                        event.target.value = '';
                    }
                });
            </script>            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="..." crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            height: 300,
        });
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    
        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
</body>

</html>