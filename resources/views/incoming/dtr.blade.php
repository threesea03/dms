<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="w-screen p-5">
    <table class="w-full">
        <thead class="w-full">
            <th class="w-1/4">Date</th>
            <th class="w-1/4">Start</th>
            <th class="w-1/4">End</th>
            <th class="w-1/4 text-center">Total</th>
        </thead>
        <tbody>
            @foreach ($days as $day)
                <tr>
                    <td>{{ $day['date'] }}</td>
                    <td>{{ $day['start'] }}</td>
                    <td>{{ $day['end'] }}</td>
                    <td class="text-center">{{ $day['total'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex flex-row justify-between">
        <span>Total</span>
        <span>{{ $total }}</span>
    </div>
</body>
</html>