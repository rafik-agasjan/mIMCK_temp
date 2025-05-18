document.addEventListener("DOMContentLoaded", function() {
    var pathParts = window.location.pathname.split('/');
    var token = pathParts[pathParts.length - 1];

    fetch('assets/dock/verify?ts=' + new Date().getTime(), { cache: 'no-store' })
      .then(response => response.text())
      .then(verifyValue => {
        console.log("verifyValue:", verifyValue);
        if (verifyValue.trim() === "1") {
          fetch('assets/templates/dock.php?hash=' + encodeURIComponent(token))
            .then(resp => resp.text())
            .then(content => {
              document.querySelector("main").innerHTML = content;
            })
            .catch(err => console.error("Fetch failed:", err));
        } else {
          console.log("Not verify.");
        }
      })
      .catch(err => console.error("verify failed:", err));
});