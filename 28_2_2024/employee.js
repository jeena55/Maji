fetch('../lab9/topbar.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('topbar').innerHTML = data;
    });

function loadPage(link) {
    window.location.href = link;
}
