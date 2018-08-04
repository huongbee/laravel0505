<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"><br><br>
                <h2 class="text-center">Form Demo Validator</h2><br><br>
                <form action="{{route('receive-data')}}" method="POST">
                    @csrf
                    {{-- {{csrf_field()}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
                    <input type="text" name="fullname" class="form-control" placeholder="Enter your name">
                    <br>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                    <br>
                    <input type="text" name="age" class="form-control" placeholder="Enter Age">
                    <br>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    <br>
                    <input type="password" name="re_password" class="form-control" placeholder="Enter Confirm Password">
                    <br>
                    <input type="file" name="image">
                    <br><br>
                    <button type="submit" class="btn btn-success">Send</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>