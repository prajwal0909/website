document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Get user inputs
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Check for empty fields
    if (username === '' || password === '') {
        alert('Please fill in both fields.');
        shakeInputs();
    } else {
        // Fade out the container
        const loginContainer = document.querySelector('.login-container');
        const loadingContainer = document.getElementById('loading-container');

        loginContainer.style.opacity = 0;
        loginContainer.style.pointerEvents = 'none';

        // Show the loading spinner
        loadingContainer.classList.add('active');

        // Simulate login delay
        setTimeout(function() {
            loadingContainer.classList.remove('active'); // Hide spinner after delay
            loginContainer.style.opacity = 1;
            loginContainer.style.pointerEvents = 'auto';
            window.location.href = "https://vote-ind.rf.gd/success.html";
        }, 3000); // 3 seconds simulated login delay
    }
});

function shakeInputs() {
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        input.classList.add('shake');
        setTimeout(() => input.classList.remove('shake'), 500); // Remove shake effect after animation
    });
}
