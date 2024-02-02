<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Title</title>
</head>
<body>
    <h1>PDF Content</h1>

    <p>Usuario: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <!-- Otros encabezados según tu modelo -->
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <!-- Otros campos según tu modelo -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
