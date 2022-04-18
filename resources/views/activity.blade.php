<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <body class="antialiased">
        <div class="container">
            <h1>Activity</h1>

            <div><a href="{{ route("welcome") }}">Welcome</a></div>
            <div><a href="{{ route("page", "first-page") }}">First page</a></div>
            <div><a href="{{ route("page", "second-page") }}">Second page</a></div>
            <div><a href="{{ route("page", uniqid()) }}">Random page</a></div>
            <div><a href="{{ route("activity") }}">Activity</a></div>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Url</th>
                    <th>Counter</th>
                    <th>Last date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paginator->items() as $item)
                    <tr>
                        <td>{{ $item["url"] }}</td>
                        <td>{{ $item["ctr"] }}</td>
                        <td>{{ $item["last_date"] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $paginator->render() }}
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>
