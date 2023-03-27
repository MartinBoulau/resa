import React from 'react'
import FullCalendar from "@fullcalendar/react";
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from "@fullcalendar/interaction"
import { Calendar } from '@fullcalendar/core';


function Calendare(){
  return(
    <div class="content">
            <div id='calendar'></div>
    </div>
  )
}

document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');
  var calendar = new Calendar(calendarEl, {
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
      footerToolbar: true,
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
          //modale(info.startStr,info.endStr)
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

export default Calendare;

/*
function Calendar() {
    return (
    <div>
        <FullCalendar 
        plugins={[timeGridPlugin, interactionPlugin]} 
        
        locale= 'fr'
        allDaySlot= 'false'
        slotDuration= '12:00:00'

        slotLabelInterval= '0'
        selectable= 'true'
        headerToolbar= 'false'

        expandRows= "true"
        aspectRatio= "2.1"

        footerToolbar={{
            start: 'title',
            center: '',
            end: 'today prev,next'
          }}

          titleFormat={{
            year: 'numeric',
            month: 'long',
            day: 'numeric'
          }}         

        />
    </div>
    )
  
}

export default Calendar;
*/