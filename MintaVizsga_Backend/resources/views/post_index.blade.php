<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <form action="/post" method='GET'>
        <input type="text" name="search" class="form-control" placholder="Search">
    </form>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        @php
            $num=1
        @endphp
        <table>
            @foreach ($post as $item)
            <tr>
                <td>{{$item -> title}}</td>
                <td>{{$item -> body}}</td>
            </tr>
            @php
                $num++
            @endphp
            @endforeach
        </table>
        {{$post->links()}}
    </div>
</body>
</html>