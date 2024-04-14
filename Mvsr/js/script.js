let coinCount = 0;

function registerComplaint() {
    const userMessage = document.getElementById('user-input').value;
    if (!userMessage) return;

    // Simulate a response from the chatbot
    const botResponse = 'Complaint registered. You earned 5 virtual coins.';
    alert(botResponse);

    // Update coin count
    updateCoinCount(5);
}

function updateCoinCount(coins) {
    coinCount += coins;
    document.getElementById('coin-count').textContent = `Coins: ${coinCount}`;
}