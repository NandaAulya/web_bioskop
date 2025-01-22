document.addEventListener('DOMContentLoaded', function() {
    // Select all studio buttons
    const studioButtons = document.querySelectorAll('.studio-button');
    const jamPenayanganItems = document.querySelectorAll('.jam-item');

    studioButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            // Reset active state for all buttons and hide all jam items
            studioButtons.forEach(btn => btn.classList.remove('active'));
            jamPenayanganItems.forEach(item => item.classList.add('hidden'));

            // Add active class to the clicked button
            this.classList.add('active');

            // Show the corresponding jam penayangan items
            const jamItem = document.querySelector(`.jam-item.jam-${index}`);
            jamItem.classList.remove('hidden');
        });
    });
});
