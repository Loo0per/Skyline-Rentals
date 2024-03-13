document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.rating input');
    const feedbackDiv = document.getElementById('feedback');
    
    stars.forEach(star => {
        star.addEventListener('change', () => {
            const value = star.value;
            feedbackDiv.innerText = `You rated this ${value} star(s).`;
        });
    });
});