import React from 'react'
import FullCalendar from "@fullcalendar/react";
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from "@fullcalendar/interaction";
import { Calendar } from '@fullcalendar/core';
import './Calendar.css';


function Calendare(){
  return(
    <div>

    
    <div className="content">
            <div id='calendar'></div>
    </div>
            <div id="modale1">
            <section id="pop_header">
                <h2>Réservation</h2>
            </section>
            <div id="menu">
                <div id="resa"><h4>Réservation</h4></div>
                <div id="modele">Peugeot 407<br/>EL-912-KD</div>
                <div id="description"><h4>Description</h4></div>
            </div>
            <div id="formulaire">
                <div className="information">
                    <form>
                        <label for="Nom" className="form-label">Nom du réservant :</label>
                        <select name="Nom" required>
                            <option value="1">jean-paul</option>
                            <option value="2">jean-pierre</option>
                        </select>
                    </form>
                        <p id="Datestart">Date de début : 12 Septembre 2023</p>
                        <p id="DateEnd">Date de fin : 17 Septembre 2023</p>

                </div>
                <div id="align_end" className="description">
                    <p>Nombre de places : 4</p>
                    <p>Kilométrages : 18000,7 km</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad </p>
                </div>

                    <div id="align_end" onClick={displayModaleResa}><button id="annuler">Annuler</button></div>
                    <div><button id="valider" onClick={displayModaleValidation}>valider</button></div>
                    
            </div>
        </div>

        <div id="modale2">
            <section id="pop_header">
                <h2>Récapitulatif</h2>
            </section>
            <div id="menu">
                <div id="resa"><h4>Réservation</h4></div>
            </div>
            <p>Votre numéro de réservation du véhicule <strong>Peugeot 407 EL-912-KD</strong> est :</p>
            <br/>
            <p> N°158</p>

            <div onClick={displayModaleValidation}><button id="valide">valider</button></div>
        </div>

        </div>
  )
}

/**
 * gestion de la partir calendrier
 */
document.addEventListener('DOMContentLoaded', function () {
  let calendarEl = document.getElementById('calendar');
  let calendar = new Calendar(calendarEl, {
      //parametre du calendrier
      plugins: [
        interactionPlugin,
        timeGridPlugin
      ],
      initialView: 'timeGridWeek',
      locale: 'fr',
      allDaySlot: false,
      slotDuration: '12:00:00',

      slotLabelInterval: 0,
      selectable: true,
      headerToolbar: false,

      expandRows: true,
      aspectRatio: 2.1,


      //style de la bare de nav
      footerToolbar: {
          start: 'title',
          center: '',
          end: 'today prev,next'
      },
      titleFormat: {
          year: 'numeric',
          month: 'long',
          day: 'numeric'
      },

      dateClick: function (info) {
          //alert('clicked ' + info.dateStr);
      },
      select: function (info) {
          //alert('selected ' + info.startStr + ' to ' + info.endStr);
          displayModaleResa(info.startStr,info.endStr)
          //addEventResa(info.startStr, info.endStr);
          
      }
  });

  calendar.render();

        /*
        function ajout event reservation
        */
        function addEventResa(startStr, endStr) {
          calendar.addEvent({
              title: 'Réservé',
              start: startStr,
              end: endStr,
              color: '#ED1C24'
          });
      }

      /*
      function ajout event maintenance
      */
      function addEventMaint(startStr, endStr) {
          calendar.addEvent({
              title: 'Maintenance',
              start: startStr,
              end: endStr,
              color: '#cccccc'
          });
      }

      /*
      function ajout event indisponible
      */
      function addEventInd(startStr, endStr) {
          calendar.addEvent({
              title: 'Indisponible',
              start: startStr,
              end: endStr,
              color: '#666666'
          });
      }

});

function addEventFormDB(){
    //peut etre mettre sa dans la parti qui gere le calendar au dessus 
}


/**
 * affiche la premier modale
 * 
 * @param {*} dateStart 
 * @param {*} dateEnd 
 */
function displayModaleResa(dateStart, dateEnd) {
    let mod = document.getElementById("modale1");
    mod.style.visibility = (mod.style.visibility == "visible") ? "hidden" : "visible";

    if(mod.style.visibility == "visible"){
        let start = document.getElementById("Datestart");
        start.innerHTML = "<span'>Date de début :"+ dateStart +"</span>";

        let end = document.getElementById("DateEnd");
        end.innerHTML = "<span'>Date de début :"+ dateEnd +"</span>";
    
    }
}

/**
 *affiche la seconde modale
 */
function displayModaleValidation() {
    let mod2 = document.getElementById("modale2");
    mod2.style.visibility = (mod2.style.visibility == "visible") ? "hidden" : "visible";
    
    let mod = document.getElementById("modale1");
    mod.style.visibility = (mod.style.visibility = "hidden");
    //addEventResa(startStr, endStr)
}

export default Calendare;