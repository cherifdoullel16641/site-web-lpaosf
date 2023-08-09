    function CalendarControl() {
        const calendar = new Date();
        const calendarControl = {
            localDate: new Date(),
            prevMonthLastDate: null,
            calWeekDaysRef: 
                ["Dim", "Lun","Mar", "Mer", "Jeu", "Ven","Sam"]
            ,
            calWeekDays: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            calMonthName: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec"
            ],
            calMonthNameRef: [
                "Janvier",
                "Fevrier",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Aout",
                "Septembre",
                "Octobre",
                "Novembre",
                "Décembre"
            ],
            daysInMonth: function (month, year) {
                return new Date(year, month, 0).getDate();
            },
            firstDay: function () {
                return new Date(calendar.getFullYear(), calendar.getMonth(), 1);
            },
            lastDay: function () {
                return new Date(calendar.getFullYear(), calendar.getMonth() + 1, 0);
            },
            firstDayNumber: function () {
                return calendarControl.firstDay().getDay() + 1;
            },
            lastDayNumber: function () {
                return calendarControl.lastDay().getDay() + 1;
            },
            getPreviousMonthLastDate: function () {
                let lastDate = new Date(
                calendar.getFullYear(),
                calendar.getMonth(),
                0
                ).getDate();
                return lastDate;
            },
            navigateToPreviousMonth: function () {
                calendar.setMonth(calendar.getMonth() - 1);
                calendarControl.attachEventsOnNextPrev();
            },
            navigateToNextMonth: function () {
                calendar.setMonth(calendar.getMonth() + 1);
                calendarControl.attachEventsOnNextPrev();
            },
            navigateToCurrentMonth: function () {
                let currentMonth = calendarControl.localDate.getMonth();
                let currentYear = calendarControl.localDate.getFullYear();
                calendar.setMonth(currentMonth);
                calendar.setYear(currentYear);
                calendarControl.attachEventsOnNextPrev();
            },
            displayYear: function () {
                let yearLabel = document.querySelector(".calendar .calendar-year-label");
                yearLabel.innerHTML = calendar.getFullYear();
            },
            displayMonth: function () {
                let monthLabel = document.querySelector(
                ".calendar .calendar-month-label"
                );
                monthLabel.innerHTML = calendarControl.calMonthNameRef[calendar.getMonth()];
            },
            selectDate: function (e) {
                // console.log(e);
                // document.querySelectorAll(".number-item").forEach(element => {
                //     element.style.backgroundColor = "var(--calendar-event-bg)";
                //     if (element.getAttribute('data-num') === e.target.textContent){
                //         element.style.backgroundColor = "var(--calendar-today-color)";

                //     }
                // })
                // let date =  `${calendar.getFullYear()}-${calendar.getMonth()+1}-${e.target.textContent}`;
                // console.log(date);
                // let xhr = new XMLHttpRequest();
                // xhr.open("GET", "./scripts/getEvents.php?date=" + date, true);
                // xhr.onreadystatechange = function() {
                //     if (xhr.readyState == 4 && xhr.status == 200) {
                //         let events = JSON.parse(xhr.responseText);
            
                //         // Render the events in a list
                //         let eventList = document.getElementById("events-container");
                //         eventList.innerHTML = "";
                //         events.forEach(function(event) {
                //             let li = document.createElement("div");
                //             li.className = "event-item"
                //             li.innerHTML = `
                //                 <div class='event'>
                //                     <div class='event-day'>${new Date (event.date).getDate()}</div>
                //                     <div class='event-date'>${new Date (event.date).toDateString()}</div>
                //                 </div>
                //                 <div class='event-name'>${event.name}</div>
                //                 <div class='event-description'>${event.description}</div>
                //             `;
                //             eventList.appendChild(li);
                //         });
                //     }
                // }
                // xhr.send();
            },

            
            plotSelectors: function () {
                document.querySelector(
                ".calendar"
                ).innerHTML += `<div class="calendar-inner"><div class="calendar-controls">
                <div class="calendar-prev"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128"><path fill="#666" d="M88.2 3.8L35.8 56.23 28 64l7.8 7.78 52.4 52.4 9.78-7.76L45.58 64l52.4-52.4z"/></svg></a></div>
                <div class="calendar-year-month">
                <div class="calendar-month-label"></div>
                <div>-</div>
                <div class="calendar-year-label"></div>
                </div>
                <div class="calendar-next"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128"><path fill="#666" d="M38.8 124.2l52.4-52.42L99 64l-7.77-7.78-52.4-52.4-9.8 7.77L81.44 64 29 116.42z"/></svg></a></div>
                </div>
                <div class="calendar-today-date">
                </div>
                <div class="calendar-body"></div></div>`;
            },
            plotDayNames: function () {
                for (let i = 0; i < calendarControl.calWeekDays.length; i++) {
                document.querySelector(
                    ".calendar .calendar-body"
                ).innerHTML += `<div>${calendarControl.calWeekDaysRef[i]}</div>`;
                }
            },
            plotDates: async function  () {
                document.querySelector(".calendar .calendar-body").innerHTML = "";
                calendarControl.plotDayNames();
                calendarControl.displayMonth();
                calendarControl.displayYear();
                let count = 1;
                let prevDateCount = 0;
        
                calendarControl.prevMonthLastDate = calendarControl.getPreviousMonthLastDate();
                let prevMonthDatesArray = [];
                let calendarDays = calendarControl.daysInMonth(
                calendar.getMonth() + 1,
                calendar.getFullYear()
                );
                // dates of current month
                let allEvents = [];
                let eventList = document.getElementById("events-container");
                eventList.innerHTML = "";

                for (let i = 1; i < calendarDays; i++) {
                    if (i < calendarControl.firstDayNumber()) {
                        prevDateCount += 1;
                        document.querySelector(
                        ".calendar .calendar-body"
                        ).innerHTML += `<div class="prev-dates"></div>`;
                        prevMonthDatesArray.push(calendarControl.prevMonthLastDate--);
                    } else {
                        let date =  `${calendar.getFullYear()}-${calendar.getMonth()+1}-${i}`;
                        let xhr = new XMLHttpRequest();
                        let events = null;
                        xhr.open("GET", "./scripts/getEvents.php?date=" + date, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                if (xhr.responseText) {
                                    events = JSON.parse(xhr.responseText);
                                    if (event)
                                    document.querySelectorAll(".number-item").forEach(element => {
                                        if (i == element.getAttribute("data-num") && events && events[0]) {
                                            element.className += " e-event"
                                            element.children[0].style.color = "white";
                                            element.style.backgroundColor = "var(--calendar-event-bg)"
                                        }
                                    })
                                    console.log(events);
                                    let li = document.createElement("div");
                                    li.className = "event-item"
                                    let dayEvent = ""
                                    events.forEach(function(event) {
                                        dayEvent += `
                                            <li>
                                                <div class='event-name'>${event.heure+' '+event.name}</div>
                                                <div class='event-description'>${event.description}</div>
                                            </li>
                                        `
                                    });
                                    li.innerHTML = `
                                        <h5 class="event-list-title">${new Date (events[0].date).toDateString()}</h5>
                                        <ul class="event-list">
                                            ${dayEvent}
                                        <ul>
                                        
                                    `;
                                    eventList.appendChild(li);
                                }
                            }
                        }
                        xhr.send();
                        document.querySelector(
                        ".calendar .calendar-body"
                        ).innerHTML += `<div class="number-item ${events ? 'has-events' : ''}" data-num=${count}><a class="dateNumber" href="#">${count++}</a></div>`;
                    }
                }
                //remaining dates after month dates
                for (let j = 0; j < prevDateCount + 1; j++) {
                document.querySelector(
                    ".calendar .calendar-body"
                ).innerHTML += `<div class="number-item" data-num=${count}><a class="dateNumber" href="#">${count++}</a></div>`;
                }
                calendarControl.highlightToday();
                calendarControl.plotPrevMonthDates(prevMonthDatesArray);
                calendarControl.plotNextMonthDates();
            },
            attachEvents: function () {
                let prevBtn = document.querySelector(".calendar .calendar-prev a");
                let nextBtn = document.querySelector(".calendar .calendar-next a");
                let todayDate = document.querySelector(".calendar .calendar-today-date");
                let dateNumber = document.querySelectorAll(".calendar .dateNumber");
                prevBtn.addEventListener(
                "click",
                calendarControl.navigateToPreviousMonth
                );
                nextBtn.addEventListener("click", calendarControl.navigateToNextMonth);
                todayDate.addEventListener(
                "click",
                calendarControl.navigateToCurrentMonth
                );
                for (var i = 0; i < dateNumber.length; i++) {
                    dateNumber[i].addEventListener(
                    "click",
                    calendarControl.selectDate,
                    false
                    );
                }
            },
            highlightToday: function () {
                let currentMonth = calendarControl.localDate.getMonth() + 1;
                let changedMonth = calendar.getMonth() + 1;
                let currentYear = calendarControl.localDate.getFullYear();
                let changedYear = calendar.getFullYear();
                if (
                currentYear === changedYear &&
                currentMonth === changedMonth &&
                document.querySelectorAll(".number-item")
                ) {
                document
                    .querySelectorAll(".number-item")
                    [calendar.getDate() - 1].classList.add("calendar-today");
                }
            },
            plotPrevMonthDates: function(dates){
                dates.reverse();
                for(let i=0;i<dates.length;i++) {
                    if(document.querySelectorAll(".prev-dates")) {
                        document.querySelectorAll(".prev-dates")[i].textContent = dates[i];
                    }
                }
            },
            plotNextMonthDates: function(){
            let childElemCount = document.querySelector('.calendar-body').childElementCount;
            //7 lines
            if(childElemCount > 42 ) {
                let diff = 49 - childElemCount;
                calendarControl.loopThroughNextDays(diff);
            }

            //6 lines
            if(childElemCount > 35 && childElemCount <= 42 ) {
                let diff = 42 - childElemCount;
                calendarControl.loopThroughNextDays(42 - childElemCount);
            }

            },
            loopThroughNextDays: function(count) {
                if(count > 0) {
                    for(let i=1;i<=count;i++) {
                        document.querySelector('.calendar-body').innerHTML += `<div class="next-dates">${i}</div>`;
                    }
                }
            },
            attachEventsOnNextPrev: function () {
                calendarControl.plotDates();
                calendarControl.attachEvents();
            },
            init: function () {
                calendarControl.plotSelectors();
                calendarControl.plotDates();
                calendarControl.attachEvents();
            }
        };
        calendarControl.init();
    }
    
    const calendarControl = new CalendarControl();