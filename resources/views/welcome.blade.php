<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <style>
        body {
            background: #0e1f41 !important;
        }
        .side-menu ul li a {
            transition: all 0.3s ease;
            position: relative;
        }
        
        .side-menu ul li a:hover {
            color: #00897b;
            transform: translateX(10px);
        }
        
        .side-menu ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #00897b;
            transition: width 0.3s ease;
        }
        
        .side-menu ul li a:hover::after {
            width: 100%;
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

        body.no-scroll {
            overflow: hidden;
            position: fixed;
            width: 100%;
            height: 100%;
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
            <span class="main-title">Amaia Scapes Laguna</span><br>
            <span class="subtitle">PROPERTY LIST</span>
        </div>
    </div>
    <div class="page-container">
        <div class="main-content">
            @for ($i = 0; $i < 6; $i++)
            <div class="property-card">
                <div class="card-header">
                    <div>Property Type</div>
                    <div>Model</div>
                    <div>Location</div>
                    <div>Area</div>
                    <div>Price</div>
                    <div>Availability</div>
                </div>
                <div class="card-details">
                    <div>Amaia Laguna</div>
                    <div>Amaia Lands</div>
                    <div>Laguna</div>
                    <div>50sqm</div>
                    <div>2.2 M</div>
                    <div class="ready-for-occupancy-2">Ready for Occupancy</div>
                </div>
                <div class="action-bar">
                    <a href="https://www.google.com/maps?q=14.200249003936927,121.11197845300458" target="_blank" class="map-link">
                        <img src="{{ asset('vectors/vector_1_x2.svg') }}" alt="Map Icon" />
                        View Property Map
                    </a>
                    <a href="https://matchhome.ph/listings/estonia-1720429920" target="_blank" class="details-btn">
                        View Property Full Details
                    </a>
                </div>
            </div>
            @endfor
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

            // avatar upload logic
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
