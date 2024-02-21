<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Ero</title>
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


            {{-- Menu --}}
    <div id="menu-container" class="menu-container">
        <div class="menu-item">Dar es Salaam</div>
        <div class="menu-item">Arusha</div>
        <div class="menu-item">Morogoro</div>
        <div class="menu-item">Dodoma</div>
        <div class="menu-item">Zanzibar</div>
    </div>




    <div class="container">
        <!-- Video section and subheading as before -->
        <div class="video-section">
            <video width="100%" height="auto" autoplay loop muted>
                <source src="{{ asset('assets/assets/vide/R1_02.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="subheading">
            <h2>Additional Content Heading</h2>
        </div>
        <!-- Filter section -->
        <div class="filter-section">
            <div class="filter-words">
                <div class="filter-word top-view">Top View</div>
                <div class="filter-word top-trending">Top Trending</div>
                <div class="filter-word most-popular">Most Popular</div>
            </div>
        </div>



        <!-- Dynamic Profile Section -->
        @foreach($member as $profile)
        <div class="profile" onclick="window.location.href='{{ route('profile.detail', ['id' => $profile->id]) }}'">
            <div class="profile-image-container">
                <img src="{{ asset($profile->image_path) }}" alt="Profile Image" class="profile-image">
                @if($profile->vip)
                    <div class="vip-badge">VIP</div>
                @endif
            </div>
            <div class="profile-info">
                <p><strong>{{ $profile->name }}</strong>
                    @if($profile->verified)
                        <span class="badge verified-personal-badge">
                            <img src="{{ asset('assets/icon/check.png') }}" alt="Verified Badge" width="16" height="16">
                        </span>
                    @endif
                </p>
                <span class="badge location-badge"><i class="fas fa-map-marker-alt"></i> {{ $profile->location }}</span>
            </div>
        </div>
    @endforeach
    <!-- End Dynamic Profile Section -->

        <!-- Profiles -->
        <div class="profile" onclick="window.location.href='detail.html'">
            <div class="profile-image-container">
                <img src="{{ asset('assets/assets/img/nandy.webp') }}" alt="Profile Image" class="profile-image">
                <div class="vip-badge">VIP</div>
            </div>
            <div class="profile-info">
                <p><strong>John Doe</strong> <span class="badge verified-personal-badge"><img src="{{ asset('assets/assets/icon/check.png') }}"
                            alt="Verified Badge" width="16" height="16"></span></p>
                <span class="badge location-badge"><i class="fas fa-map-marker-alt"></i> Sinza Mapambano</span>
            </div>
        </div>
            <!-- Profile content as before -->

        <!-- Pagination -->
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a href="#" class="active">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div>
    </div>

    <footer>
        <a href="{{ url('aboutus') }}">About Us</a>
        <a href="{{ url('privacypolicy') }}">Privacy Policy</a>
        <p>Ero &copy; 2024</p>
    </footer>
</body>

</html>
