

@if (!Auth::check())
    <!-- کدی که برای کاربران لاگین نشده نمایش داده می‌شود -->
    @include('users.register')
@else
    <!-- کدی که برای کاربران لاگین شده نمایش داده می‌شود -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Main Page</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>YourLogo</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li><a href="/logout" method="POST">logout</a></li>
                    <li> <a>{{ session('user.email') }}</a> </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h2>Your Success, Our Commitment</h2>
            <p>Providing top-notch services to help you succeed.</p>
            <br>
            <a href="#" class="btn">Get Started</a>
            <a href="#" class="btn">Create Post</a>
            <a href="#" class="btn">Management Posts</a>
            <a href="#" class="btn secondary">Learn More</a>
        </div>
    </section>


    <div class="search-container">
        <form action="/search" method="GET">
            <input type="text" placeholder="Search..." name="query">
            <button type="submit">Search</button>
        </form>
    </div>

    <section class="services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service-grid">
                <div class="service">
                    <h3>Web Design</h3>
                    <p>Creating visually stunning and user-friendly websites.</p>
                </div>
                <div class="service">
                    <h3>Development</h3>
                    <p>Building robust and scalable web applications.</p>
                </div>
                <div class="service">
                    <h3>SEO Optimization</h3>
                    <p>Improving your website's visibility on search engines.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <h2>About Us</h2>
            <p>With years of experience in the industry, we are dedicated to providing the best services to our clients. Our team of experts is here to help you achieve your goals.</p>
        </div>
    </section>

    <section class="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <p>For more information and free consultation, please contact us.</p>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 All rights reserved.</p>
            <ul class="social">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
@endif
