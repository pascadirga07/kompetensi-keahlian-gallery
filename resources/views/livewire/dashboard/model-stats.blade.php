<div>
    @if($stats)
        <h2>Stats:</h2>
        <ul>
            @foreach($stats as $stat)
                <li>ID: {{ $stat->id }}</li>
                <li>Name: {{ $stat->name }}</li>
                <li>Description: {{ $stat->description }}</li>
                <!-- Add more fields as needed -->
                <li>Created At: {{ $stat->created_at }}</li>
                <li>Updated At: {{ $stat->updated_at }}</li>
                <hr> <!-- Add a separator between each item -->
            @endforeach
        </ul>
    @else
        <p>No stats available.</p>
    @endif
</div>
