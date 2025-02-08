<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Posts Layout</title>
    <link rel="stylesheet" href="css/posts.css">
</head>
<body>
   @include('header')

    <section class="posts">
        <div class="container">
            <h2>Our Posts</h2>
            <div class="post-grid">
                <div class="post">
                    <img src="https://via.placeholder.com/300" alt="Post Image">
                    <h3>Post Name 1</h3>
                    <p class="price">$100</p>
                    <p class="details">This is a detailed description of post 1. It includes all the relevant information about the post.</p>
                </div>
                <div class="post">
                    <img src="https://via.placeholder.com/300" alt="Post Image">
                    <h3>Post Name 2</h3>
                    <p class="price">$200</p>
                    <p class="details">This is a detailed description of post 2. It includes all the relevant information about the post.</p>
                </div>
                <div class="post">
                    <img src="https://via.placeholder.com/300" alt="Post Image">
                    <h3>Post Name 3</h3>
                    <p class="price">$300</p>
                    <p class="details">This is a detailed description of post 3. It includes all the relevant information about the post.</p>
                </div>
                <!-- Add more posts as needed -->
            </div>
        </div>
    </section>

@include('footer')
</body>
</html>
