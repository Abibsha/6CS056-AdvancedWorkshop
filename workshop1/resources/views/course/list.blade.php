
<!DOCTYPE html>
<html>
<head>
    <title>Course List</title>
</head>
<body>

<h1>Course List</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="/courses/create">Create New Course</a>

<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Duration (Weeks)</th>
            <th>Fee</th>
            <th>Difficulty</th>
            <th>Active</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->duration }}</td>
                <td>{{ $course->fee }}</td>
                <td>{{ $course->difficulty }}</td>
                <td>{{ $course->is_active ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="/courses/{{ $course->id }}">View</a> |
                    <a href="/courses/{{ $course->id }}/edit">Edit</a> |
                    <form action="/courses/{{ $course->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
                </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
