<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    
    <h2>
        Hello View
    </h2>
    <h2><?php echo $name?></h2>
    <h3><?=$page?></h3>

    <h2>{{$name}}</h2>
    <h3>{{$page}}</h3>

    <p>{{$nickName}}</p>

    <p>{!!$nickName!!}</p>

    <p><i>2345678</i></p>

    <?php
    foreach ($arraySubject as $value) {
       echo "<b>".$value."</b>";
       echo "<br>";
    }
    ?>
    <hr>
    <?php foreach($arraySubject as $subject):?>
        <b><?=$subject?></b>
        <br>
    <?php endforeach?>

    <hr>
    @foreach($arraySubject as $subject)
        <b>{{$subject}}</b>
        <br>
    @endforeach

    @for($i=1; $i<=10; $i++)
        <p>{{$i}}</p>
    @endfor

    @for($i=1; $i<=10; $i++)
        @if($i%2==0)
            <b>{{$i}}</b>
        @else
            <i>{{$i}}</i>
        @endif
    @endfor

    {{-- <h3>34567u</h3> --}}
    {{-- 2345y234 --}}

    <?php 
    //2345o
    /*dfb*/
    ?>

    <!-- <h3>1234567</h3> -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>
</html>