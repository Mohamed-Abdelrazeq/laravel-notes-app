<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @isset($task)
        <h1>{{ $task->title }}</h1>
        <h4>{{ $task->description }}</h4>
    @endisset
</body>

</html>
