<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Author List</h1>

        <div class="mt-4 mb-4">
            <a href="{{ route('index') }}" class="btn btn-success">Book List</a>
            <a href="{{ route('rating.create') }}" class="btn btn-dark">Add Rating</a>
        </div>

        <div class="table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Author Name</th>
                        <th>Voter</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($authors as $index => $author)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->voter }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
