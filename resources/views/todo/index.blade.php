
<html>
<head>
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <title>my todos</title>
</head>
<body>
<h2>
    Todo list
</h2>
@if(\Session::has('success'))
    <div class="alert alert-success">
        {{\Session::get('success')}}
    </div>
@endif

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Date</td>
    </tr>
    </thead>
    <tbody>
    @foreach($todos as $todo)
        <tr>
            <td>{{ $todo->id }}</td>
            <td>{{ $todo->title }}</td>
            <td>{{ $todo->created_at }}</td>
            <td><a href="{{action('TodoController@edit',$todo->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
            <td>
                <form action="{{action('TodoController@destroy', $todo->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<p><a href="create/todo">add todo</a></p>
</body>
</html>

