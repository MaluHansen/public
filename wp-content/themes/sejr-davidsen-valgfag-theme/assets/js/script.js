
//alt info om JS date formatting og metoder er hentet fra kilden: https://www.w3schools.com/jsref/jsref_obj_date.asp
// opretter to variabler, en function som bruger js indbyggede dateconstructor til at lave et 'date object' med dato ud fra aktuel tid
const currentDate = new Date();
// det andet er et array som indeholder alle årets måneder i string form
const months = ["Januar", "Februar", "Marts", "April", "Maj", "Juni", "Juli", "August", "September", "Oktober", "November", "December"];

//skal vise den aktuelle måned og år over kalenderen.
//ændre i h3 som har classen calendar-header(den er tom fra default) og indsætter istedet den data som er i variablerne months og currentDate
//der kigges ind i months arrayet som blev lavet ovefor for at finde navnet på den aktuelle måned. getMonth og getFullYear er metoder som høre til Date(her gemt i variablen currentDate)
document.querySelector('.calendar-header').innerHTML = `${months[currentDate.getMonth()]} ${currentDate.getFullYear()}`;

//en funktion som skal lave en synlig kalender på siden ud fra det som er i html og css dokumnterne. datoerne skal genereres efter den aktuelle dato
function createCalendar(year, month) {
    //i første del af funktionen oprettes der to variabler, firstDay og totalDays
    //de er med til at finde både hvilken dato det er idag og hvor mange dage den aktuelle måned har, så måneder er ikke starter på en mandag vil have 'tomme pladser' istedet

    const firstDay = new Date(year, month, 1).getDay();
    //firstDay = et nyt date-objekt for den første dag i år og måned(year, month parameterne som henter den aktuelle måned og år) .getDay() er en metode som høre til new Date og retunere datoen
    // tallet er dag, her er den sat til 1 for at retunere den første dag i måneden.

    const totalDays = new Date(year, month + 1, 0).getDate(); 
    //totalDays ligner meget firstDay, her skal det totale antal dage findes.
    //fordi måneder bliver angivet fra 0-11 ligges der 1 til month så jeg finder den næste måned, og derefter bruger jeg dag 0 til at indikere dagen, fordi js date-objekt angiver datoer 1-31, derfor for jeg returneret den sidste dag i den måned jeg er i lige nu på en dynamisk måde der tager hensyn til kortere måneder eller skudår
    
    const datesGrid = document.querySelector('.dates');
    datesGrid.innerHTML = ''; 
    //opretter en variabel og referere til diven med classen 'dates' i html og fjerner derefter eksisterende indhold i datesGrid(dates diven)
  
    //opsætter et forloop, forloop er foretrukket i mit tilfælde fordi jeg allerede kender start og slut
    //firstDay udregnes højere oppe og værdien for den første dag i måneden bliver brugt her til at oprette en række div elementer i 'datesGrid', afhængigt af hvilken dag i ugen den første dag falder på, hvis 'firstDay' er 0 (søndag, fordi ugen går fra søn-lør og er indekseret 0-6), tilføjer vi 6 div elementer der fungere som tomme tal i kalenderen eller indtil 'firstDay - 1'

    //loopet tjekker om firstDay er 0 ved at bruge en ternary operator (i stdet for et if else statement), hvis det er 0 returneres 6 og der bliver lavet 6 tomme divver 
    // ellers (:) returneres værdien af firstDay, -1 for at vide hvor mange tomme diver der skal indsættes for firstDay, i øges med en hver gang løkken kører til i er mindre end værdien for firstDay
    for (let i = 0; i < (firstDay == 0 ? 6 : firstDay - 1); i++) {
        //de tomme diver bliver lavet og appendet til datesGrid('.dates')
      datesGrid.appendChild(document.createElement('div'));
    }
  
    //looper igennem alle dage i måneden ud fra mængden af dage i totalDays
    for (let day = 1; day <= totalDays; day++) {

    //skal oprette en ny div ligesom ovenover, men istdet for at være tomme skal de indeholde datoen, altså day
    const dateDiv = document.createElement('div');
    dateDiv.innerHTML = day;
  
    //for at markere den dato man har klikket på tilføjes der en eventlistener som lytter efter click på hver dateDiv
    dateDiv.addEventListener('click', () => {
        //her bruges qsAll til at fjerne id 'dates-grid' fra alle datoerne 
        document.querySelectorAll('#dates-grid div').forEach(div => div.classList.remove('selected'));

        //tilføjer classen selected til den datodiv som klikkes på
        dateDiv.classList.add('selected');

        //skal opdatere den valgte dato så den vises i det lille felt under kalenderen
        //toLocaleDateString er en metode fra date objektet som opdatere år, måned og dag til det format man normalt ser i danmark
        document.querySelector('.selectedDate').innerHTML = new Date(year, month, day).toLocaleDateString('da-DK');
    });
    datesGrid.appendChild(dateDiv);
    }
  
}

//kører functionen til at lave kalenderen ud fra det aktuelle år og måned ud fra variablen currentDate som blev oprettet helt i starten
createCalendar(currentDate.getFullYear(), currentDate.getMonth());

function selectButton(buttonId) {
    // Fjerner 'active' class fra begge knapper
    document.querySelectorAll('.buttonCatDog').forEach(button => {
        button.classList.remove('active');
    });

    // Tilføjer 'active' class til den knap der bliver trykket op
    document.getElementById(buttonId).classList.add('active');
}



