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

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="row">
            <form method="post" action="{{action('TodoController@update', $id)}}" >
                <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <input type="hidden" value="{{$id}}" name="id" />
                    <label for="title">Todo Title:</label>
                    <input type="text" class="form-control" name="title" value="{{$todo->title}}"/>
                </div>
                <div class="form-group">
                    <label for="description">Ticket Description:</label>
                    <textarea cols="5" rows="5" class="form-control" name="description">{{$todo->description}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</body>
</html>