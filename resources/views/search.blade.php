<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Posts Layout</title>
    <link rel="stylesheet" href="css/search.css">
</head>
<body>
    <section class="posts">
        <div class="container">
            <h2>Results</h2>
            <br>
            @foreach($posts as $post)
            <div class="post-grid">
                <div class="post">
                    <h3>{{ $post->title }} </h3>
                    <p class="details">{{ $post->content}}</p>
                    <br>
                </div>
            @endforeach
                <!-- Add more posts as needed -->
            </div>
        </div>
    </section>


</body>
</html>
