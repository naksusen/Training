<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - MatchHome</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <style>
        body {
            background: #fff !important;
        }
        /* Add styles for no-scroll */
        body.no-scroll {
            overflow: hidden;
            position: fixed;
            width: 100%;
            height: 100%;
        }
        .contact-container {
            max-width: 800px;
            margin: 120px auto 40px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        .contact-title {
            color: #0e1f41;
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 800;
        }
        .contact-form {
            display: grid;
            gap: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .form-group label {
            color: #0e1f41;
            font-weight: 600;
            font-size: 1rem;
        }
        .form-group input,
        .form-group textarea {
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #00897b;
            outline: none;
        }
        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }
        .submit-btn {
            background-color: #00897b;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }
        .submit-btn:hover {
            background-color: #00695c;
        }
        .contact-info {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #e0e0e0;
        }
        .contact-info h3 {
            color: #0e1f41;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }
        .contact-info p {
            color: #333;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .contact-info i {
            color: #00897b;
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
            <span class="main-title">Contact Us</span><br>
            <span class="subtitle">GET IN TOUCH</span>
        </div>
    </div>

    <div class="contact-container">
        <h1 class="contact-title">Contact Us</h1>
        @if(session('success'))
            <div style="background:#d4edda;color:#155724;padding:15px;border-radius:8px;margin-bottom:20px;">
                {{ session('success') }}
            </div>
        @endif
        @if(
            $errors->any())
            <div style="background:#f8d7da;color:#721c24;padding:15px;border-radius:8px;margin-bottom:20px;">
                <ul style="margin:0;padding-left:20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="contact-form" action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="submit-btn">Send Message</button>
        </form>

        <div class="contact-info">
            <h3>Other Ways to Reach Us</h3>
            <p><i class="fas fa-phone"></i> Phone: +63 (2) 8123 4567</p>
            <p><i class="fas fa-envelope"></i> Email: info@matchhome.ph</p>
            <p><i class="fas fa-map-marker-alt"></i> Address: Unit 1403 Primeland Bldg. Venture St. Madrigal Business Park, Alabang Muntinlupa City</p>
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