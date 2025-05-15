<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MatchHome - Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <style>
        html, body {
            max-width: 100vw;
            overflow-x: hidden;
            scrollbar-width: thin;
            scrollbar-color: #00897b #e0f2f1;
        }
        body {
            background: #ffffff !important;
            scrollbar-width: thin;
            scrollbar-color: #00897b #e0f2f1;
        }
        body.no-scroll {
            overflow: hidden;
            position: fixed;
            width: 100%;
            height: 100%;
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
        .search-box {
            margin: 30px 0;
            display: flex;
            gap: 10px;
            max-width: 600px;
        }

        .search-input {
            flex: 1;
            padding: 12px 20px;
            border: 2px solid #00897b;
            border-radius: 25px;
            font-size: 1rem;
            font-family: 'Montserrat', sans-serif;
            color: #00897b;
        }

        .search-input::placeholder {
            color: #00897b;
            opacity: 0.7;
        }

        .search-btn {
            background-color: #00897b;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
            transition: background-color 0.3s;
        }

        .search-btn:hover {
            background-color: #00695c;
        }

        .featured-properties {
            margin-top: 50px;
            padding: 20px 0 20px 0;
            max-width: 1100px;
            margin-left: auto;
            margin-right: auto;
        }

        .featured-properties h2 {
            color: #333;
            margin-bottom: 30px;
            font-size: 2rem;
        }

        .property-grid {
            display: flex;
            flex-direction: row;
            gap: 32px;
            margin-top: 20px;
            overflow-x: auto;
            padding-bottom: 10px;
            scrollbar-width: none;
        }
        .property-grid::-webkit-scrollbar {
            display: none;
        }

        .property-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
            max-width: 370px;
            width: 100%;
            margin: 0 auto;
        }

        .property-card:hover {
            transform: translateY(-5px);
        }

        .property-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .property-tag {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #00897b;
            color: white;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 0.8rem;
        }

        .property-info {
            padding: 20px;
        }

        .property-info h3 {
            margin: 0 0 10px 0;
            color: #333;
        }

        .property-location {
            color: #666;
            margin: 5px 0;
        }

        .property-price {
            color: #00897b;
            font-weight: bold;
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .property-features {
            display: flex;
            gap: 15px;
            margin: 15px 0;
            color: #666;
        }

        .view-details-btn {
            width: 100%;
            padding: 10px;
            background-color: #00897b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .view-details-btn:hover {
            background-color: #00695c;
        }

        .welcome-message h1 {
            color: #00897b;
            margin-bottom: 20px;
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
            <span class="main-title">Welcome to MatchHome</span><br>
            <span class="subtitle">YOUR DREAM HOME AWAITS</span>
        </div>
    </div>
    <div class="page-container">
        <div class="main-content">
            <div class="welcome-message">
                <h1>Welcome to MatchHome</h1>
                <p>Your trusted partner in finding your perfect home. We offer a wide range of properties to suit your needs and preferences.</p>
                <div class="search-box">
                    <input type="text" placeholder="Search for your dream home..." class="search-input">
                    <button class="search-btn">Search</button>
                </div>
            </div>

            <div class="featured-properties">
                <h2>Featured Properties</h2>
                <div class="property-grid">
                    <div class="property-card">
                        <div class="property-image">
                            <img src="{{ asset('images/listing-1.webp') }}" alt="Luxury Villa" onerror="this.onerror=null;this.src='{{ asset('images/property-placeholder.jpg') }}';">
                            <span class="property-tag">New</span>
                        </div>
                        <div class="property-info">
                            <h3>Luxury Villa</h3>
                            <p class="property-location">📍 Beverly Hills, CA</p>
                            <p class="property-price">₱1,250,000</p>
                            <div class="property-features">
                                <span>4 Beds</span>
                                <span>3 Baths</span>
                                <span>2,500 sqft</span>
                            </div>
                            <button class="view-details-btn">View Details</button>
                        </div>
                    </div>

                    <div class="property-card">
                        <div class="property-image">
                            <img src="{{ asset('images/listing-2.webp') }}" alt="Modern Apartment" onerror="this.onerror=null;this.src='{{ asset('images/property-placeholder.jpg') }}';">
                            <span class="property-tag">Hot Deal</span>
                        </div>
                        <div class="property-info">
                            <h3>Modern Apartment</h3>
                            <p class="property-location">📍 Downtown, NY</p>
                            <p class="property-price">₱850,000</p>
                            <div class="property-features">
                                <span>2 Beds</span>
                                <span>2 Baths</span>
                                <span>1,200 sqft</span>
                            </div>
                            <button class="view-details-btn">View Details</button>
                        </div>
                    </div>

                    <div class="property-card">
                        <div class="property-image">
                            <img src="{{ asset('images/listing-3.webp') }}" alt="Family House" onerror="this.onerror=null;this.src='{{ asset('images/property-placeholder.jpg') }}';">
                            <span class="property-tag">For Sale</span>
                        </div>
                        <div class="property-info">
                            <h3>Family House</h3>
                            <p class="property-location">📍 Quezon City, PH</p>
                            <p class="property-price">₱2,100,000</p>
                            <div class="property-features">
                                <span>3 Beds</span>
                                <span>2 Baths</span>
                                <span>1,800 sqft</span>
                            </div>
                            <button class="view-details-btn">View Details</button>
                        </div>
                    </div>

                    <div class="property-card">
                        <div class="property-image">
                            <img src="{{ asset('images/listing-4.webp') }}" alt="Condo Unit" onerror="this.onerror=null;this.src='{{ asset('images/property-placeholder.jpg') }}';">
                            <span class="property-tag">Best Value</span>
                        </div>
                        <div class="property-info">
                            <h3>Condo Unit</h3>
                            <p class="property-location">📍 Makati, PH</p>
                            <p class="property-price">₱1,000,000</p>
                            <div class="property-features">
                                <span>1 Bed</span>
                                <span>1 Bath</span>
                                <span>600 sqft</span>
                            </div>
                            <button class="view-details-btn">View Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Why Choose Us Section -->
            <div class="why-choose-us" style="margin: 60px auto 40px auto; max-width: 1100px; text-align: center;">
                <h2 style="color: #00897b; font-weight: 800;">Why Choose MatchHome?</h2>
                <div class="choose-us-features" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 40px; margin-top: 30px;">
                    <div style="flex: 1 1 220px; min-width: 220px; max-width: 300px; background: #f7f7f7; border-radius: 12px; padding: 30px 20px;">
                        <!-- Easy Process Icon -->
                        <svg width="48" height="48" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 10px;"><circle cx="24" cy="24" r="24" fill="#e0f2f1"/><path d="M16 24l6 6 10-10" stroke="#00897b" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <h4 style="color: #00897b;">Easy Process</h4>
                        <p>Find and secure your dream home in just a few clicks.</p>
                    </div>
                    <div style="flex: 1 1 220px; min-width: 220px; max-width: 300px; background: #f7f7f7; border-radius: 12px; padding: 30px 20px;">
                        <!-- Trusted Agents Icon -->
                        <svg width="48" height="48" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 10px;"><circle cx="24" cy="24" r="24" fill="#e0f2f1"/><path d="M24 28c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7 3.582 7 8 7z" stroke="#00897b" stroke-width="3"/><path d="M16 32c0-2.21 3.582-4 8-4s8 1.79 8 4" stroke="#00897b" stroke-width="3" stroke-linecap="round"/></svg>
                        <h4 style="color: #00897b;">Trusted Agents</h4>
                        <p>Work with experienced and reliable real estate professionals.</p>
                    </div>
                    <div style="flex: 1 1 220px; min-width: 220px; max-width: 300px; background: #f7f7f7; border-radius: 12px; padding: 30px 20px;">
                        <!-- 24/7 Support Icon -->
                        <svg width="48" height="48" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 10px;"><circle cx="24" cy="24" r="24" fill="#e0f2f1"/><path d="M24 14v10l7 4" stroke="#00897b" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <h4 style="color: #00897b;">24/7 Support</h4>
                        <p>We're here to help you anytime, anywhere.</p>
                    </div>
                </div>
            </div>
            <!-- CTA Banner -->
            <div class="cta-banner" style="background: linear-gradient(90deg, #00897b 60%, #00bfae 100%); color: #fff; border-radius: 16px; max-width: 1100px; margin: 40px auto; padding: 40px 30px; text-align: center; box-shadow: 0 4px 20px rgba(0,0,0,0.07);">
                <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 10px;">Ready to Find Your Dream Home?</h2>
                <p style="font-size: 1.1rem; margin-bottom: 25px;">Sign up now or contact our team to get started on your journey to a new home!</p>
                <a href="#" style="background: #fff; color: #00897b; padding: 12px 36px; border-radius: 25px; font-weight: 700; text-decoration: none; font-size: 1.1rem; transition: background 0.3s, color 0.3s;">Get Started</a>
            </div>
            <!-- Testimonials Section -->
            <div class="testimonials-section" style="max-width: 1100px; margin: 60px auto 40px auto;">
                <h2 style="color: #00897b; font-weight: 800; text-align: center;">What Our Clients Say</h2>
                <div class="testimonials-grid" style="display: flex; flex-wrap: wrap; gap: 32px; justify-content: center; margin-top: 30px;">
                    <div style="flex: 1 1 320px; min-width: 280px; max-width: 350px; background: #f7f7f7; border-radius: 12px; padding: 30px 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                        <p style="font-style: italic; color: #333;">"MatchHome made buying our first house so easy and stress-free. Highly recommended!"</p>
                        <div style="margin-top: 18px; font-weight: 700; color: #00897b;">– Maria S.</div>
                    </div>
                    <div style="flex: 1 1 320px; min-width: 280px; max-width: 350px; background: #f7f7f7; border-radius: 12px; padding: 30px 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                        <p style="font-style: italic; color: #333;">"Excellent service and support from start to finish. I found my dream home in just a week!"</p>
                        <div style="margin-top: 18px; font-weight: 700; color: #00897b;">– John D.</div>
                    </div>
                    <div style="flex: 1 1 320px; min-width: 280px; max-width: 350px; background: #f7f7f7; border-radius: 12px; padding: 30px 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                        <p style="font-style: italic; color: #333;">"The agents were knowledgeable and always available. I felt supported every step of the way."</p>
                        <div style="margin-top: 18px; font-weight: 700; color: #00897b;">– Liza P.</div>
                    </div>
                </div>
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

            // Search functionality for Featured Properties
            const searchInput = document.querySelector('.search-input');
            const propertyCards = document.querySelectorAll('.property-card');

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const query = this.value.trim().toLowerCase();
                    propertyCards.forEach(card => {
                        const name = card.querySelector('h3')?.textContent.toLowerCase() || '';
                        const location = card.querySelector('.property-location')?.textContent.toLowerCase() || '';
                        const tag = card.querySelector('.property-tag')?.textContent.toLowerCase() || '';
                        if (
                            name.includes(query) ||
                            location.includes(query) ||
                            tag.includes(query)
                        ) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
</body>
</html> 