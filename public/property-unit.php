<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Unit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
    <link href="css/property-unit.css" rel="stylesheet" type="text/css">

</head>
<body>
    <form method="POST" action="/logout" style="position: absolute; top: 20px; right: 20px;">
        <?php echo csrf_field(); ?>
        <button type="submit" style="padding: 8px 16px; background: #333; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
            Log Out
        </button>
    </form>
    <div class="original">
        <div class="mask-group">
            <div class="amaia-2"></div>
            <div class="amaia-scapes-laguna">
                Amaia Scapes Laguna
            </div>
            <span class="property-list">PROPERTY LIST</span>
        </div>

        <div class="container-3">
            <div class="group-37329">
                <div class="container-25">
                    <div class="property-type-3">Property Type</div>
                    <div class="model-3">Model</div>
                    <div class="location-3">Location<br></div>
                    <div class="area-2">Area</div>
                    <div class="price-2">Price</div>
                    <div class="availability-2">Availability</div>
                </div>

                <div class="container-6">
                    <div class="amaia-laguna-3">Amaia Laguna</div>
                    <div class="amaia-lands-3">Amaia Lands</div>
                    <div class="laguna-3">Laguna</div>
                    <div class="sqm-2">50sqm</div>
                    <div class="m-2">2.2 M</div>
                    <div class="ready-for-occupancy-2">Ready for Occupancy</div>
                </div>

                <div class="container-29">
                    <div class="container-16">
                        <div class="uiwmap-3">
                            <img class="vector-3" src="{{ asset('vectors/vector_1_x2.svg') }}" />
                        </div>
                        <div class="view-property-map-3">View Property Map</div>
                    </div>

                    <a href="/property-unit.php" target="_blank" rel="noopener noreferrer">
                        <div class="container-5" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                            <span class="view-property-full-details-2">View Property Unit</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Repeat for other groups and containers -->

        </div>
    </div>
</body>
</html>
