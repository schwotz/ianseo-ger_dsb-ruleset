# Erweiterung "DSB Regelwerk"

## Autor(en)

- Andreas Schwotzer <andreas-schwotzer-bogensport@t-online.de>
  
## Inhalt

In der Auswahl der Regelwerke wird zusätzlich "DSB-Regelwerk" zur Verfügung gestellt.

Als Unter-Regelwerk sind umgesetzt:

- "Halle 18m - zwei Runden" (DSB)

## Technische Umsetzung

Im Verzeichnis "Modules/Sets/" wird ein Verzeichnis "GER_DSB" angelegt.

In anderen Ländern wurden zusätzlich die Dateien "lib.php" und "Setup_Target.php" genutzt um die Routinen zu effektivieren.

In dieser Umsetzung wurde Wert darauf gelegt, den Programmcode möglichst übersichtlich zu gestalten. Die dabei entstehende Redundanzen werden in Kauf genommen.

### Datei `"sets.php"`

Diese Datei beinhaltet die Aufbereitung der Auswahl für "Regelwerk" und "Unter-Regelwerk".

### Datei `"Setup_x_GER_DSB.php"`

Diese Dateien beinhalten die Routinen zur Erzeugung der Regelwerke in der Datenbank.

## Inbetriebnahme

### In Docker-Container kopieren

<https://www.geeksforgeeks.org/devops/copying-files-to-and-from-docker-containers/#docker-copy-folder-from-host-to-container>

```shell
docker exec ianseo rm /opt/ianseo/Modules/Sets/GER/*
docker cp GER ianseo:/opt/ianseo/Modules/Sets/
docker exec ianseo chown -R www-data:www-data /opt/ianseo/Modules/Sets/GER
```
