<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Short links</title>
    <style>
        h1 {
            text-align: center;

        }

        .card {
            direction: rtl;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Short links</h1>
        <div class="card">
            <div class="card-header">

                <form action="/generate-shorten-link" method="POST">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="input-group mb-3">
                        <input class="form-control" placeholder="Enter a short link" type="link" name="link"
                            id="link">
                        <button type="submit" class="btn btn-danger">Generate a short link</button>
                    </div>
                    @if ($errors->has('link'))
                        <span class="alert-danger">
                            <strong>
                                {{ $errors->first('link') }}
                            </strong>
                        </span>
                    @endif
                </form>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        <p>
                            {{ session('success') }}
                        </p>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>original link</th>
                            <th>Short link </th>
                            <th>number of visits</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shortlinks as $row)
                            <tr>
                                <td>{{ $row->link }}</td>
                                <td><a
                                        href="{{ route('show.shorten.link', $row->code) }}">{{ url('') . '/' . $row->code }}</a>
                                </td>
                                <td>{{ $row->visits_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $shortlinks->links() !!}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
