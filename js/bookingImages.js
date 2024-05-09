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

    document.getElementById('total_price').value = totalPrice.toFixed(2);
}

function updateTotalPriceBasedOnDates() {
    var totalElement = document.getElementById('total');
    var startDateInput = document.getElementById('start_date');
    var endDateInput = document.getElementById('end_date');
    var cabinSelect = document.getElementById('enterCabin').value;
    var packageSelect = document.getElementById('enterPackage').value;

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

    // Get the start and end dates
    var startDate = new Date(startDateInput.value);
    var endDate = new Date(endDateInput.value);

    // Calculate the duration in days
    var timeDifference = endDate.getTime() - startDate.getTime();
    var duration = Math.ceil(timeDifference / (1000 * 3600 * 24));

    // Calculate total price based on the selected cabin, package, and duration
    var totalPrice = (cabinPrices[cabinSelect] || 0) * duration + (packagePrices[packageSelect] || 0);

    // Update total price display
    if (!isNaN(totalPrice)) {
        totalElement.textContent = 'Your total is: $' + totalPrice.toFixed(2);
    } else {
        totalElement.textContent = '';
    }

    document.getElementById('total_price').value = totalPrice.toFixed(2);
}

// Add event listeners for start date and end date inputs
document.getElementById('start_date').addEventListener('change', updateTotalPriceBasedOnDates);
document.getElementById('end_date').addEventListener('change', updateTotalPriceBasedOnDates);


document.addEventListener("DOMContentLoaded", function() {
    var startDateInput = document.getElementById("start_date");
    var endDateInput = document.getElementById("end_date");
    var status = document.getElementById("booking-status");

    // Function to display error message
    function displayError(message) {
        status.textContent = message;
        status.style.display = "block";
    }

    // Function to hide error message
    function hideError() {
        status.style.display = "none";
    }

    // Add event listener to start date input field
    startDateInput.addEventListener("change", function() {
        // Update min attribute of end date input field to restrict selectable dates
        endDateInput.min = startDateInput.value;

        // If end date is before start date, reset end date value and display error message
        if (endDateInput.value < startDateInput.value) {
            endDateInput.value = startDateInput.value;
            displayError("End date must be at least one day after start date");
        } else {
            // Hide error message if end date is valid
            hideError();
        }
    });

    // Add event listener to end date input field
    endDateInput.addEventListener("change", function() {
        // If end date becomes valid, hide error message
        if (endDateInput.value >= startDateInput.value) {
            hideError();
        }
    });
});
