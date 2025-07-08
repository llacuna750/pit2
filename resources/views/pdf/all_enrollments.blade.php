<!DOCTYPE html>
<html>

<head>
    <title>All Enrollments Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 40px;
            background-color: #f8f9fa;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 8px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }

        .header p {
            margin: 5px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
        }

        .summary-stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #667eea;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }

        .table-container {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        thead {
            background: #667eea;
            color: white;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }

        th {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #e3f2fd;
        }

        .user-name {
            font-weight: 600;
            color: #2c3e50;
        }

        .subject-name {
            color: #667eea;
            font-weight: 500;
        }

        .enrollment-date {
            color: #666;
            font-size: 14px;
        }

        .footer {
            margin-top: 40px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-left,
        .footer-right {
            font-size: 12px;
            color: #666;
        }

        .footer-left strong,
        .footer-right strong {
            color: #333;
        }

        .divider {
            height: 2px;
            background: linear-gradient(to right, #667eea, #764ba2);
            margin: 20px 0;
            border-radius: 2px;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>All Enrollments Report</h1>
        <p>Comprehensive overview of all student enrollments</p>
    </div>

    <div class="summary-stats">
        <div class="stat-item">
            <div class="stat-number">{{ $enrollments->count() }}</div>
            <div class="stat-label">Total Enrollments</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">{{ $enrollments->unique('user_id')->count() }}</div>
            <div class="stat-label">Unique Students</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">{{ $enrollments->unique('subject_id')->count() }}</div>
            <div class="stat-label">Subjects Offered</div>
        </div>
    </div>

    <div class="divider"></div>

    <div class="table-container">
        @if($enrollments->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Subject</th>
                    <th>Enrollment Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrollments as $enrollment)
                <tr>
                    <td class="user-name">{{ $enrollment->user->name }}</td>
                    <td class="subject-name">{{ $enrollment->subject->name }}</td>
                    <td class="enrollment-date">{{ \Carbon\Carbon::parse($enrollment->enrolled_at)->format('F d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="no-data">
            No enrollment records found.
        </div>
        @endif
    </div>

    <div class="footer">
        <div class="footer-left">
            <strong>Generated by:</strong> {{ Auth::user()->name }} ({{ Auth::user()->role }})
        </div>
        <div class="footer-right">
            <strong>Report Date:</strong> {{ now()->format('F d, Y \a\t g:i A') }}
        </div>
    </div>
</body>

</html>