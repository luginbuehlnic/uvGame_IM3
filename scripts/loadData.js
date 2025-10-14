document.addEventListener("DOMContentLoaded", () => {
    const apiUrl = "https://uv-game.nic-luginbuehl.ch/get_Random.php";

    let searchedLocation = '';
    let selectedLocation = null;
    fetch(apiUrl)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);

            const [date, time] = data.datetime.split(' ');
            document.getElementById("IdDate").innerText = date;
            document.getElementById("IdTime").innerText = time;
            document.getElementById("IdUVI").innerText = data.uvi;

            searchedLocation = data.location+', '+data.country;
        })
        .catch((error) => console.error("Fetch-Fehler:", error));


        const locationButtons = document.querySelectorAll(".location-btn");
        const guessButton = document.getElementById("guessButton");
        const result = document.getElementById("result");

        locationButtons.forEach(button => {
        button.addEventListener("click", () => {
            // alte Auswahl entfernen
            locationButtons.forEach(btn => btn.classList.remove("selected"));

            // neue Auswahl markieren
            button.classList.add("selected");
            selectedLocation = button.dataset.location;
            guessButton.disabled = false;
            guessButton.classList.add("enabled");
        });
        });
        
        
        guessButton.addEventListener("click", () => {
        if (selectedLocation === searchedLocation) {
            result.textContent = `Richtig! ${searchedLocation} war korrekt.`;
            result.style.color = "green";
        } else {
            result.textContent = `Falsch! Die richtige Antwort war: ${searchedLocation}`;
            result.style.color = "red";
        }
            // const url = `unload.php?selected=${encodeURIComponent(selectedLocation)}&correct=${encodeURIComponent(searchedLocation  )}&timestamp=${encodeURIComponent(currentTimestamp)}`;
            // window.location.href = url;
        });

        guessButton.disabled = true;
        guessButton.classList.remove("enabled");  
});