<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - MatchHome</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <style>
        body {
            background-color: #ffffff;
        }
        /* Add styles for no-scroll */
        body.no-scroll {
            overflow: hidden;
            position: fixed;
            width: 100%;
            height: 100%;
        }
        .about-container {
            max-width: 1200px;
            margin: 100px auto;
            padding: 0 20px;
        }
        .about-header {
            text-align: center;
            margin-bottom: 50px;
        }
        .about-header h1 {
            font-size: 2.5rem;
            color: #00897b;
            margin-bottom: 20px;
        }
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }
        .about-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #333;
        }
        .about-image {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .mission-vision {
            margin-top: 60px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
        .mission-box, .vision-box {
            background: #f5f5f5;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
        }
        .mission-box h2, .vision-box h2 {
            color: #00897b;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .about-content, .mission-vision {
                grid-template-columns: 1fr;
            }
            .about-container {
                margin: 60px auto;
            }
        }
        html, body {
            max-width: 100vw;
            overflow-x: hidden;
            scrollbar-width: thin;
            scrollbar-color: #00897b #e0f2f1;
        }
        html::-webkit-scrollbar, body::-webkit-scrollbar {
            width: 10px;
            background: #e0f2f1;
        }
        html::-webkit-scrollbar-thumb, body::-webkit-scrollbar-thumb {
            background: #00897b;
            border-radius: 6px;
        }
        html::-webkit-scrollbar-track, body::-webkit-scrollbar-track {
            background: #e0f2f1;
        }
        .logout-btn {
            background-color: #00897b;
            color: #fff;
            border: none;
            padding: 10px 30px;
            border-radius: 25px;
            font-size: 1rem;
            font-family: 'Montserrat', sans-serif;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s, color 0.3s;
        }
        .logout-btn:hover {
            background-color: #00695c;
            color: #e0f2f1;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="side-menu">
        <div class="side-menu-logo" style="margin-top: 20px;">
            <img src="{{ asset('images/matchhome-logo.png') }}" alt="MatchHome Logo" />
        </div>
        <div class="side-menu-avatar">
            <img id="profile-avatar" src="{{ asset('images/default-profile.webp') }}" alt="User Avatar" onerror="this.onerror=null;this.src='{{ asset('images/avatar-placeholder.png') }}';" style="cursor:pointer;" />
            <input type="file" id="avatar-upload" accept="image/*" style="display:none;" />
            <span class="side-menu-greeting">
                Hello!
                <span class="side-menu-username">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
            </span>
        </div>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ url('/') }}">Properties</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
        <form method="POST" action="/logout" style="margin-top: 30px; text-align: center;">
            @csrf
            <button type="submit" class="logout-btn" style="width: 80%; display: inline-block;">
                <!-- Optional: Add an icon before the text -->
                <!-- <span style="margin-right:8px;">&#x1F511;</span> -->
                Log out
            </button>
        </form>
    </div>
    <div class="header-section">
        <div class="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="header-title">
            <span class="main-title">About Us</span><br>
            <span class="subtitle">MATCHHOME</span>
        </div>
    </div>

    <div class="about-container">
        <div class="about-header">
            <h1>Welcome to MatchHome</h1>
            <p>Your trusted partner in finding your dream property</p>
        </div>
        
        <div class="about-content">
            <div class="about-text">
                <p>MatchHome is a premier real estate platform dedicated to helping you find your perfect property match. With years of experience in the real estate industry, we've built a reputation for excellence, transparency, and customer satisfaction.</p>
                <p>Our platform connects property seekers with their ideal homes, offering a wide range of properties from residential to commercial spaces. We pride ourselves on our comprehensive property listings, detailed information, and professional service.</p>
            </div>
            <img src="{{ asset('images/key-visual.webp') }}" alt="MatchHome Office" class="about-image">
        </div>

        <div class="mission-vision">
            <div class="mission-box">
                <h2>Our Mission</h2>
                <p>To simplify the property search process and help people find their perfect home match through innovative technology and personalized service.</p>
            </div>
            <div class="vision-box">
                <h2>Our Vision</h2>
                <p>To become the most trusted and comprehensive real estate platform, transforming how people find and experience their dream properties.</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var hamburger = document.querySelector('.hamburger-menu');
            var sideMenu = document.querySelector('.side-menu');
            var overlay = document.querySelector('.overlay');
            var headerTitle = document.querySelector('.header-title');
            var body = document.body;
            var greeting = document.querySelector('.side-menu-greeting');
            var greetingText = 'Hello!';
            var username = document.querySelector('.side-menu-username');
            var usernameText = username ? username.textContent : '';

            function typeGreeting() {
                if (!greeting) return;
                greeting.innerHTML = '';
                var i = 0;
                function type() {
                    if (i <= greetingText.length) {
                        greeting.textContent = greetingText.slice(0, i);
                        i++;
                        setTimeout(type, 70);
                    } else if (usernameText) {
                        var userSpan = document.createElement('span');
                        userSpan.className = 'side-menu-username';
                        userSpan.textContent = usernameText;
                        greeting.appendChild(document.createElement('br'));
                        greeting.appendChild(userSpan);
                    }
                }
                type();
            }

            function updateHeaderMargin() {
                if (sideMenu.classList.contains('active')) {
                    headerTitle.style.marginLeft = '300px';
                    body.classList.add('no-scroll');
                    typeGreeting();
                } else {
                    headerTitle.style.marginLeft = '';
                    body.classList.remove('no-scroll');
                }
            }

            hamburger.addEventListener('click', function() {
                this.classList.toggle('active');
                sideMenu.classList.toggle('active');
                overlay.classList.toggle('active');
                updateHeaderMargin();
            });

            overlay.addEventListener('click', function() {
                hamburger.classList.remove('active');
                sideMenu.classList.remove('active');
                overlay.classList.remove('active');
                updateHeaderMargin();
            });

            // Avatar upload logic
            var avatarImg = document.getElementById('profile-avatar');
            var avatarInput = document.getElementById('avatar-upload');
            if (avatarImg && avatarInput) {
                avatarImg.addEventListener('click', function() {
                    avatarInput.click();
                });
                avatarInput.addEventListener('change', function(e) {
                    if (e.target.files && e.target.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(ev) {
                            avatarImg.src = ev.target.result;
                        };
                        reader.readAsDataURL(e.target.files[0]);
                    }
                });
            }
        });
    </script>
</body>
</html> 