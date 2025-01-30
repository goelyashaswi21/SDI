// Set donation amount from button click
function setDonationAmount(amount) {
    document.getElementById('donationAmount').value = '₹' + amount;
}

// Handle form submission (This will not submit anywhere yet, it's just a simulation)
function submitDonation(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const amount = document.getElementById('donationAmount').value;

    if (name && email && amount) {
        alert(`Thank you, ${name}! Your donation of ${amount} has been successfully received. We will send you a confirmation email at ${email}.`);
        document.getElementById('donationForm').reset();
    } else {
        alert("Please fill out all fields before submitting.");
    }
}
