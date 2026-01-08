# uvGame_IM3

## Projektreflextion
Da wir während der Unterrichtszeit bereits gemeinsam einen Grossteil des Backends abschliessen konnten, mussten wir im Nachhinein hauptsächlich noch das UI finalisieren. Eine besondere Herausforderung stellte dabei die Responsiveness dar, da viele Bilder eingebunden werden mussten. Dieses Problem konnten wir jedoch mit etwas ausprobieren ohne größere Schwierigkeiten lösen. Alles in allem haben wir unsere Stärken im Team ideal aufgeteilt und gut zusammengearbeitet.

## Projektbeschreibung
Dieses Projekt ist eine webbasierte Anwendung, die über eine externe API aktuelle UV-Index-Daten abruft, diese mit PHP verarbeitet und in einer Datenbank speichert.  
Auf Basis der gespeicherten Daten kann der/die Nutzer:in ein kleines Ratespiel spielen, mit bezug zum UV-Index. Dabei wird ein Zufälliger EIntrag aus der Datenbank genommen und im Spiel die Zeit, das Datum und der UV-Index angezeigt. Der Spieler muss nun Raten mit welchem der Aufgezeigten Orte diese Angaben übereinstimmen. Bei der Auflösung wird in einem Balendiagramm der UV-Index zu diesem Zeitpunkt von allen zur Auswahl stehenden Städten angezeigt.

## Funktionen
- UV-Index-Daten werden automatisch aus einer externen Quelle bezogen  
- Die Daten werden gespeichert und für spätere Abfragen verwendet  
- Für das Spiel werden zufällige Datensätze ausgewählt  
- Der/die Nutzer:in spielt ein kurzes Spiel auf Basis dieser UV-Daten  
- Am Ende wird ein Ergebnis angezeigt und die Daten verglichen.

## Projektstruktur
- `index.html` – Startseite der Anwendung  
- `game.html` – Spieloberfläche  
- `result.html` / `result.php` – Anzeige der Spielergebnisse  
- `load.php` / `extract.php` / `transform.php` – Datenverarbeitung (API → DB)  
- `insert.php` – Speichern der Daten in der Datenbank  
- `get_random.php` – Zufällige Datenauswahl für das Spiel  
- `config.php` – Datenbank- und API-Konfiguration  
- `styles/` – CSS-Dateien  
- `scripts/` – JavaScript-Dateien  
- `image/` – Grafiken und Bilder 
