<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>All Courses</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            line-height: 1.5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f0f0f0;
        }

        h1 {
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <h1>All Courses Report</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Course Title</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $index => $course)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $course->title }}</td>
                <td>{{ $course->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>