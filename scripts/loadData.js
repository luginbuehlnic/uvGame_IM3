document.addEventListener("DOMContentLoaded", () => {
    const apiUrl = "https://uv-game.nic-luginbuehl.ch/get_Random.php";
    sessionStorage.clear();

    let searchedLocation = '';
    let selectedLocation = null;
    let searchedTimestamp = null;
    fetch(apiUrl)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);

            const location = data.location + ', ' + data.country;
            const utcDateTime = data.datetime;

            const { localDate, localTime } = convertUTCToLocalDateTime(utcDateTime, location);

            const [date, time] = data.datetime.split(' ');
            document.getElementById("IdDate").innerText = localDate;
            //Set time to Local Time -> Summer(London +1, EU +2, Athens +3) / Winter (London 0, EU +1, Athens +2) 
            document.getElementById("IdTime").innerText = localTime;
            document.getElementById("IdUVI").innerText = data.uvi;

            searchedLocation = location;
            searchedTimestamp = data.datetime;
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
            // const url = `correct.html?selected=${encodeURIComponent(selectedLocation)}&correct=${encodeURIComponent(searchedLocation )}&timestamp=${encodeURIComponent(searchedTimestamp)}`;
            sessionStorage.setItem('selected', selectedLocation);
            sessionStorage.setItem('correct', searchedLocation);
            sessionStorage.setItem('timestamp', searchedTimestamp);
            window.location.href = 'result.html';
        });

        guessButton.disabled = true;
        guessButton.classList.remove("enabled"); 
        
});

const timeZones = {
  "Valais, Switzerland": "Europe/Zurich",
  "Berlin, Germany": "Europe/Berlin",
  "London, England": "Europe/London",
  "Barcelona, Spain": "Europe/Madrid",
  "Stonehenge, England": "Europe/London",
  "Rome, Italy": "Europe/Rome",
  "Acropolis, Greece": "Europe/Athens",
  "Paris, France": "Europe/Paris",
  "Budapest, Hungary": "Europe/Budapest",
  "Copenhagen, Denmark": "Europe/Copenhagen"
};

function convertUTCToLocalDateTime(utcDateString, location) {
  const timeZone = timeZones[location] || "Europe/Berlin";
  const utcDate = new Date(utcDateString + "Z"); // "Z" = UTC-Zeitzone

  const dateFormatter = new Intl.DateTimeFormat("de-CH", {
    timeZone,
    year: "numeric",
    month: "2-digit",
    day: "2-digit"
  });

  const timeFormatter = new Intl.DateTimeFormat("de-CH", {
    timeZone,
    hour: "2-digit",
    minute: "2-digit",
    hour12: false
  });

  return {
    localDate: dateFormatter.format(utcDate), // z. B. "12.10.2025"
    localTime: timeFormatter.format(utcDate)  // z. B. "12:00:00"
  };
}