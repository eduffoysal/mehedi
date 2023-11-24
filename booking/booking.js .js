   // Add event listener to update total price when quantity or total persons change
   function updateTotalPrice() {
    const quantity = parseInt(document.getElementById('quantity').value);
    const totalPersons = parseInt(document.getElementById('total-persons').value);
    const totalPrice = quantity * totalPersons * 250; // Assuming the price is 250tk per person
    document.getElementById('total-price').innerText = 'Total Price: ' + totalPrice + 'tk';
}

document.getElementById('quantity').addEventListener('change', updateTotalPrice);
document.getElementById('total-persons').addEventListener('change', updateTotalPrice);