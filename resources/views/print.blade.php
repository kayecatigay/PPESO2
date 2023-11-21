<!-- resources/views/print.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Preview</title>
    <style>
        /* Styles for printing */
        body {
            font-family: Arial, sans-serif;
        }

        .print-header {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .print-header img {
            max-width: 100px; /* Adjust the max-width as needed */
            height: auto;
            margin-right: 10px; /* Add some spacing to the right of the image */
        }

        .print-data {
            text-align: center;/* Add styles for displaying data */
        }
        
    </style>
</head>
<body>
    <div>
        <img src="assets/img/peap.png" alt="">
    </div>
    <div class="print-data">
    <table style="border:1;" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
