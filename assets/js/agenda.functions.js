const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid'],
                defaultView: 'dayGridMonth',
                header: {
                    left: 'prev,next,today, timeGridWeek,dayGridMonth',
                    right: 'title',
                },
                locale: 'pt-br',
                timeZone: 'BRT',        
                slotDuration: '00:15',
                minTime: '07:00',
                maxTime: '22:00',
                nowIndicator: true,
                selectable: true,
                editable: true,
                navLinks: true, // can click day/week names to navigate views
                eventLimit: true, // allow "more" link when too many events

                businessHours: {
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    daysOfWeek: [1, 2, 3, 4, 5, 6],
                    startTime: '09:00', // a start time (10am in this example)
                    endTime: '18:00', // an end time (6pm in this example)
                },              
                events: {
                    url: 'REQUEST_FILE',       
                },
                select: function(info) {            
                    // Evento disparado ao selecionar um dia
                    alert(info.startStr);
                    console.log(info);
                },
                eventDrop: function (info) {     
                    //evento disparado ao arrastar o evento (update de data)         
                },
                eventResize: function (info) {                
                    //evento disparado ao redimencionar o evento (update de data)        
                },
                eventClick: function (info) {    
                    //evento disparado ao selecionar um evento (abre o modal de update)        
                },
            });
            
            calendar.render();