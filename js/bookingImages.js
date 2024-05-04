document.getElementById('enterCabin').addEventListener('change', function () {
    // Get the selected cabin
    var selectedCabin = this.value;

    // Update the large image based on the selected cabin
    updateCabinInfo(selectedCabin);

    // Get the selected package
    var selectedPackage = document.getElementById('enterPackage').value;

    // Update the total price based on the selected cabin and package
    updateTotalPrice(selectedCabin, selectedPackage);
});

document.getElementById('enterPackage').addEventListener('change', function () {
    // Get the selected package
    var selectedPackage = this.value;

    // Check if both cabin and package are selected, then update total price
    var selectedCabin = document.getElementById('enterCabin').value;
    if (selectedCabin) {
        updateTotalPrice(selectedCabin, selectedPackage);
    }
});

function updateCabinInfo(selectedCabin) {
    var cabinImages = document.querySelectorAll('.cabin-image');

    // Hide all images by default
    cabinImages.forEach(function (image) {
        image.style.display = 'none';
    });

    switch (selectedCabin) {
        case 'Dreamcatcher':
            document.getElementById('dreamcatcherImage').style.display = 'inline-block';
            break;
        case 'Rising Sun':
            document.getElementById('risingSunImage').style.display = 'inline-block';
            break;
        case 'Magnolia':
            document.getElementById('magnoliaImage').style.display = 'inline-block';
            break;
        case 'Rockpath':
            document.getElementById('rockpathImage').style.display = 'inline-block';
            break;
        default:
            // If no cabin selected, hide all images
            cabinImages.forEach(function (image) {
                image.style.display = 'none';
            });
            break;
    }
}

function updateTotalPrice(selectedCabin, selectedPackage) {
    var totalElement = document.getElementById('total');

    // Define cabin prices
    var cabinPrices = {
        'Dreamcatcher': 175.00,
        'Rising Sun': 85.00,
        'Magnolia': 200.00,
        'Rockpath': 250.00
    };

    // Define package prices
    var packagePrices = {
        'Reed Romance': 300.00,
        'Adventure Haven': 200.00,
        'Tranquil Oasis': 150.00
    };

    // Calculate total price based on the selected cabin and package
    var totalPrice = (cabinPrices[selectedCabin] || 0) + (packagePrices[selectedPackage] || 0);

    // Update total price display
    if (!isNaN(totalPrice)) {
        totalElement.textContent = 'Your total is: $' + totalPrice.toFixed(2);
    } else {
        totalElement.textContent = '';
    }
}
