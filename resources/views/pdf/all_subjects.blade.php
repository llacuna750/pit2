<h2>All Subjects</h2>
<ul>
    @foreach($subjects as $subject)
    <li>
        <strong>{{ $subject->name }}</strong> ({{ $subject->course->title }})
    </li>
    @endforeach
</ul>

<p><strong>Generated by:</strong> {{ Auth::user()->name }} ({{ Auth::user()->role }})</p>
<p><strong>Date:</strong> {{ now()->format('F d, Y') }}</p>