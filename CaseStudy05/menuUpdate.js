//Event registration for Cafe//
var QtyNode1 = document.getElementById("QtyCafe1");
var QtyNode2 = document.getElementById("QtyCafe2");
var QtyNode3 = document.getElementById("QtyCafe3");
var SubPriceNode1 = document.getElementById("sub_price1");
var SubPriceNode2 = document.getElementById("sub_price2");
var SubPriceNode3 = document.getElementById("sub_price3");
var TotalPriceNode = document.getElementById("total_price");

// Radio buttons for Cafe au Lait and Iced Cappuccino
var SingleRadio1 = document.getElementById("single1");
var DoubleRadio1 = document.getElementById("double1");
var SingleRadio2 = document.getElementById("single2");
var DoubleRadio2 = document.getElementById("double2");


//Add event listener//
QtyNode1.addEventListener("input", calculateSubtotal, false);
QtyNode2.addEventListener("input", calculateSubtotal, false);
QtyNode3.addEventListener("input", calculateSubtotal, false);
SingleRadio1.addEventListener("change", calculateSubtotal, false);
DoubleRadio1.addEventListener("change", calculateSubtotal, false);
SingleRadio2.addEventListener("change", calculateSubtotal, false);
DoubleRadio2.addEventListener("change", calculateSubtotal, false);

// Validate input and calculate the subtotal for each item

function calculateSubtotal() {
    var qty1 = parseInt(QtyNode1.value) || 0;
    var qty2 = parseInt(QtyNode2.value) || 0;
    var qty3 = parseInt(QtyNode3.value) || 0;

    // Validate quantity input (ensure numeric)
    if (isNaN(qty1) || isNaN(qty2) || isNaN(qty3)) {
        alert("Please enter valid numbers for quantities.");
        return;
    }

    // Calculate subprices
    var subPrice1 = qty1 * 2.00;
    var subPrice2 = 0;
    var subPrice3 = 0;

    // For Cafe au Lait
    if (SingleRadio1.checked) {
        subPrice2 = qty2 * 2.00;
    } else if (DoubleRadio1.checked) {
        subPrice2 = qty2 * 3.00;
    }

    // For Iced Cappuccino
    if (SingleRadio2.checked) {
        subPrice3 = qty3 * 4.75;
    } else if (DoubleRadio2.checked) {
        subPrice3 = qty3 * 5.75;
    }

    // Update the subtotal fields
    SubPriceNode1.value = subPrice1.toFixed(2);
    SubPriceNode2.value = subPrice2.toFixed(2);
    SubPriceNode3.value = subPrice3.toFixed(2);

    // Calculate the total price
    calculateTotal();
}

// Function to calculate the total price
function calculateTotal() {
    console.log(3);
    console.log(SubPriceNode1.value);
    console.log(SubPriceNode2.value);
    console.log(SubPriceNode3.value);
    var total = parseFloat(SubPriceNode1.value) + parseFloat(SubPriceNode2.value) + parseFloat(SubPriceNode3.value);
    TotalPriceNode.value = total.toFixed(2);
    
}