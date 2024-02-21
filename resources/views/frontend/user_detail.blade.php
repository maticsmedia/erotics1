<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wyq8h6CEPi2VOp6u6FpH6h6IHtN+8q5Tt" crossorigin="anonymous">
    
<script>
    function toggleMenu() {
        var menuContainer = document.getElementById('menu-container');
        menuContainer.classList.toggle('show-menu');
    }

    function toggleDarkMode() {
        var body = document.body;
        body.classList.toggle('dark-mode');

        // Toggle the dark mode icon
        var darkModeIcon = document.querySelector('.dark-mode-icon i');
        darkModeIcon.classList.toggle('fa-moon');
        darkModeIcon.classList.toggle('fa-sun');
    }
</script>
<style>
    body {
        padding: 20px;
        font-family: 'Poppins', sans-serif;
    }

    .vip-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
    }

    .vip-button,
    .premium-button,
    .new {
        background-color: #f19537;
        color: #333;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .location,
    .phone-number {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-weight: lighter;
    }

    .icon-img {
        width: 20px;
        height: 20px;
        margin-right: 5px;
    }

    .whatsapp-icon,
    .location-icon,
    .phone-icon {
        width: 30px;  /* Updated the size of the icon */
        height: 30px; /* Updated the size of the icon */
        margin-left: 5px; /* Move WhatsApp icon to the right */
    }
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin-top: 20px;
    }

    .mySlides {
        display: none;
    }

    .about-section {
        margin-top: 20px;
    }
</style>

</head>

<body class="dark-mode">

    
    {{-- Header  --}}
    <header class="mobile-header">
        <div class="hamburger-icon" onclick="toggleMenu()">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <div class="logo">
            <img src="{{ asset('assets/logo-light.png') }}" alt="Company Logo">
        </div>
        <div class="dark-mode-icon" onclick="toggleDarkMode()">
            <i class="fas fa-sun"></i>
        </div>
    </header>

    <div id="menu-container" class="menu-container">
        <div class="menu-item">Dar es Salaam</div>
        <div class="menu-item">Arusha</div>
        <div class="menu-item">Morogoro</div>
        <div class="menu-item">Dodoma</div>
        <div class="menu-item">Zanzibar</div>
    </div>
    

    
    <h1 style="text-align: center;">{{ $profile->name }}</h1>
    <div class="vip-row">
        @if($profile->vip)
            <button class="vip-button">VIP</button>
        @endif
        <button class="new">New from this site</button>
        <button class="premium-button">Premium</button>
        <!-- Add similar checks for other badges -->
    </div>

    <div class="location">
        <img src="{{ asset('assets/assets/img/location.png') }}" alt="Location Icon" class="location-icon">
        <h2>{{ $profile->address }}</h2>
    </div>

    <div class="phone-number">
        <img src="{{ asset('assets/assets/img/phone.png') }}" alt="Phone Icon" class="phone-icon">
        <h2>{{ $profile->phone }}</h2>
        <img src="{{ asset('assets/assets/img/whatsapp.png') }}" alt="WhatsApp Icon" class="whatsapp-icon">
        {{-- @if($profile->has_whatsapp)
            <img src="{{ asset('assets/assets/img/whatsapp.png') }}" alt="WhatsApp Icon" class="whatsapp-icon">
        @endif --}}
    </div>

    @if($profile->image)
    <div>
        <img src="{{ asset($profile->image) }}" style="width:100%">
    </div>
@else
    <p>No image available.</p>
@endif

    <div class="about-section">
        <h2>About</h2>
        <p>{{ $profile->about }}</p>
    </div>


    <!-- Bootstrap JS and jQuery (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-XrkGv8MHPkAymR6fNByaLSEJJ+1bgddOXvJcS+omsMMRfrqVc5LthuPtt8+9xTCh"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wyq8h6CEPi2VOp6u6FpH6h6IHtN+8q5Tt"
        crossorigin="anonymous"></script>

    <script>
        // Slideshow functionality
        let slideIndex = 0;

        function showSlides() {
            let i;
            const slides = document.getElementsByClassName("mySlides");

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slideIndex++;

            if (slideIndex > slides.length) {
                slideIndex = 1;
            }

            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000);
        }

        // Start the slideshow
        showSlides();
    </script>
    <footer>
        <a href="{{route('aboutus')}}">About Us</a>
        <a href="{{route('privacy')}}">Privacy Policy</a>
        <p>Ero &copy;2024</p>
    </footer>
</body>

</html>
