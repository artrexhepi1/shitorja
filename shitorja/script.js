
        function shtoArtikull(emriArtikullit, button) {
            // Bëni një kërkesë AJAX për të shtuar artikullin në bazën e të dhënave
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    button.style.backgroundColor = "green"; // Ndryshimi i ngjyrës së butonit në gjelbër
                    button.style.color = "white";
                }
            };
            xhttp.open("POST", "shto_artikull.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("artikull=" + emriArtikullit);
        }