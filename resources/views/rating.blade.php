<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Rating</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Insert Rating</h1>

        <div class="mt-4 mb-4">
            <a href="{{ route('index') }}" class="btn btn-success">Book List</a>
            <a href="{{ route('famousAuthor') }}" class="btn btn-dark">Famous Author</a>
        </div>

        <form action="{{ route('rating.create') }}" method="GET" class="mb-4">
            <div class="mb-3">
                <label for="author_id" class="form-label">Book Author:</label>
                <select name="author_id" id="author_id" class="form-select" required onchange="this.form.submit()">
                    <option value="" disabled selected>Select Author</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" 
                            {{ request('author_id') == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <form action="{{ route('rating.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="book_id" class="form-label">Select Book:</label>
                <select name="book_id" id="book_id" class="form-select" required>
                    <option value="" disabled selected>Select Book</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating:</label>
                <select name="rating" id="rating" class="form-select" required>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit Rating</button>
        </form>
    </div>
</body>
</html>
