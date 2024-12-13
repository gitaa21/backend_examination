<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Books List</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Books List</h1>

        <form action="{{ url('/') }}" method="GET" class="mb-4">
            <div class="row mb-3">
                <div class="col-5">
                    <label for="paginate" class="form-label">List shown:</label>
                    <select class="form-select" name="limit" onchange="this.form.submit()">
                        @foreach ([10, 20, 30, 40, 50, 60, 70, 80, 90, 100] as $perPageOption)
                            <option value="{{ $perPageOption }}"
                                {{ request('limit', 10) == $perPageOption ? 'selected' : '' }}>
                                {{ $perPageOption }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-5">
                    <label for="search" class="form-label">Search:</label>
                    <input id="search" class="form-control" name="search" value="{{ request('search') }}"
                        placeholder="Enter keyword...">
                </div>

                <div class="col-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
                </div>
            </div>
        </form>

        <div class="mt-4 mb-4">
            <a href="{{ route('famousAuthor') }}" class="btn btn-success">Famous Author</a>
            <a href="{{ route('rating.create') }}" class="btn btn-dark">Add Rating</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Book Name</th>
                    <th>Category Name</th>
                    <th>Author Name</th>
                    <th>Average Rating</th>
                    <th>Voter Count</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($books as $index => $book)
                    <tr>
                        <td>{{ ($books->currentPage() - 1) * $books->perPage() + $index + 1 }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ number_format($book->ratings_avg_rating, 2) }}</td>
                        <td>{{ $book->ratings->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="justify-content-center mt-4">
            {{ $books->links('pagination::bootstrap-5') }}
        </div>
    </div>
</body>
</html>
