// Select all price input fields
const priceFields = document.querySelectorAll('.price-input');

// Function to validate that input is a positive number
function validatePriceInput(event) {
    const value = event.target.value;

    // Check if value is not a number or is negative
    if (isNaN(value) || parseFloat(value) < 0) {
        alert("Please enter a valid positive number for the price.");
        event.target.value = "";  // Clear invalid input
    }
}

// Attach validation event listener to each price field
priceFields.forEach(field => {
    field.addEventListener('input', validatePriceInput);
});

// Prevent form submission if any field has invalid input
document.getElementById('priceUpdateForm').addEventListener('submit', function(event) {
    let isValid = true;

    priceFields.forEach(field => {
        if (field.value !== "" && (isNaN(field.value) || parseFloat(field.value) < 0)) {
            isValid = false;
            field.style.border = "1px solid red";  // Highlight invalid fields
        } else {
            field.style.border = "";  // Clear highlighting for valid fields
        }
    });

    if (!isValid) {
        alert("Please fill out all fields with valid positive prices before submitting.");
        event.preventDefault();  // Stop form submission if validation fails
    }
});
