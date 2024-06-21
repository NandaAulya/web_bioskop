console.log("jalankok")

document.getElementById('dropdownButton').addEventListener('click', function () {
    var dropdownMenu = document.getElementById('dropdownMenu');
    dropdownMenu.classList.toggle('hidden');
});

// jika user klik diluar dropdown option e ditutup
window.addEventListener('click', function (e) {
    var dropdownButton = document.getElementById('dropdownButton');
    var dropdownMenu = document.getElementById('dropdownMenu');
    if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.classList.add('hidden');
    }
});