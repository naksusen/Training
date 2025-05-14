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
        .header-section {
            position: relative;
            width: 100vw;
            min-width: 100vw;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            min-height: 120px;
            background: url('/images/amaia_3.jpeg') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            padding: 1.5rem 0 2rem 4vw;
            box-sizing: border-box;
            overflow: hidden;
        }
        .header-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255,255,255,0.7);
            z-index: 1;
        }
        .header-title, .main-title, .subtitle {
            position: relative;
            z-index: 2;
        }
        .header-title {
            margin-top: 1.2rem;
        }
        .main-title {
            color: #1D3461;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 2.3rem;
            letter-spacing: 0;
            line-height: 1.1;
            display: block;
        }
        .subtitle {
            color: #008775;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 1.3rem;
            letter-spacing: 0.4em;
            margin-top: 0.2rem;
            display: block;
        }
        .page-container {
            padding-left: 4vw;
            padding-right: 4vw;
            box-sizing: border-box;
            width: 100%;
        }
        .main-content {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }
        @media (max-width: 600px) {
            .main-title { font-size: 1.3rem; }
            .subtitle { font-size: 1rem; }
        }
    </style>
</head>
<body>
    <div class="header-section">
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
</body>
</html>
