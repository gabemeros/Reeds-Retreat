document.getElementById('enterCabin').addEventListener('change', function () {
    // Get the selected cabin
    var selectedCabin = this.value;

    // Update the large image based on the selected cabin
    updateCabinInfo(selectedCabin);

    // Get the selected package
    var selectedPackage = document.getElementById('enterPackage').value;

    // Update the total price based on the selected cabin and package
    updateTotalPrice(selectedCabin, selectedPackage);

    document.getElementById('cabin_id').value = selectedCabin;
});

document.getElementById('enterPackage').addEventListener('change', function () {
    // Get the selected package
    var selectedPackage = this.value;

    // Check if both cabin and package are selected, then update total price
    var selectedCabin = document.getElementById('enterCabin').value;
    if (selectedCabin) {
        updateTotalPrice(selectedCabin, selectedPackage);
    }

    document.getElementById('package_id').value = selectedPackage;
});

function updateCabinInfo(selectedCabin) {
    var cabinImages = document.querySelectorAll('.cabin-image');

    // Hide all images by default
    cabinImages.forEach(function (image) {
        image.style.display = 'none';
    });

    switch (selectedCabin) {
        case "13230" :
            document.getElementById('dreamcatcherImage').style.display = 'inline-block';
            break;
        case "13256" :
            document.getElementById('risingSunImage').style.display = 'inline-block';
            break;
        case "13378":
            document.getElementById('magnoliaImage').style.display = 'inline-block';
            break;
        case "13567":
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
        '13230': 175.00,
        '13256': 85.00,
        '13378': 200.00,
        '13567': 250.00
    };

    // Define package prices
    var packagePrices = {
        '33333': 300.00,
        '33337': 200.00,
        '33340': 150.00
    };

    // Calculate total price based on the selected cabin and package
    var totalPrice = (cabinPrices[selectedCabin] || 0) + (packagePrices[selectedPackage] || 0);

    // Update total price display
    if (!isNaN(totalPrice)) {
        totalElement.textContent = 'Your total is: $' + totalPrice.toFixed(2);
    } else {
        totalElement.textContent = '';
    }

    var TOTAL = totalPrice.toFixed(2);
    console.log(TOTAL);

    document.getElementById('total_price').value = TOTAL;
}
