document.addEventListener("DOMContentLoaded", () => {

    let selectedLocation = sessionStorage.getItem("selected");
    let correctLocation = sessionStorage.getItem("correct");
    let searchedTimestamp = sessionStorage.getItem("timestamp");

    const resultText = document.getElementById("resultText");
    const searchedLocationText = document.getElementById("searchedLocationText");

    if(!selectedLocation || !correctLocation || !searchedTimestamp) {
        resultText.textContent = "Error: No Data found. Please try again.";
        searchedLocationText.textContent = '';
        return;
    }

    if(selectedLocation === correctLocation) {
       resultText.textContent = 'Congratulations, your guess is correct!'
       searchedLocationText.textContent = '';
    } else {
       resultText.textContent = 'Bummer, your answer is incorrect.'
       searchedLocationText.textContent = `The correct answer was: ${correctLocation}`;
    }

    const apiUrl = "https://uv-game.nic-luginbuehl.ch/result.php?timestamp=" + encodeURIComponent(searchedTimestamp);


    dataset = []
    fetch(apiUrl)
        .then((response) => response.json())
        .then((data) => {
            if (!data || data.length === 0) {
                console.warn("Keine Daten für Timestamp gefunden:", searchedTimestamp);
                resultText.textContent += "\nKeine passenden Daten in der Datenbank gefunden.";
                return;
            }
            
            const ctx = document.getElementById("uviChart").getContext("2d");

            dataSet = {
                labels: data.map(item => item.location),
                datasets: [{
                    label: "UV Index",
                    data: data.map(item => item.uvi),
                    backgroundColor: [
                    "#6B7280",
                    "#93C5FD",
                    "#A7F3D0",
                    "#FDE68A",
                    "#FCA5A5", 
                    "#C4B5FD",
                    "#F9A8D4",
                    "#FDBA74",
                    "#86EFAC",
                    "#BFDBFE"
                    ]
                }]
            };      

            new Chart(ctx, { 
                type: 'bar',
                data: dataSet,
                options: {
                    grouped: false,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                            max: 11 // UVI Skala von 0 bis 11+
                        }
                    }
                }
            });
        })
.catch((error) => console.error("Fetch-Fehler:", error)); 


function getRandomColor() {
    var letters = "0123456789ABCDEF";
    var color = "#";
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color; // Erzeugt eine zufällige Farbe
  }// Gibt Fehler im Konsolenlog aus, falls die Daten nicht abgerufen werden können
});