document.getElementById('cta-button').addEventListener('click', function() {
    fetch('c2c.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            document.getElementById('response-window').textContent += data + '\n';
        })
        .catch(error => console.error('There has been a problem with the fetch operation:', error));
});
