;
// Use an AJAX request to retrieve the events for the selected date
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./scripts/getAllEvents.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText, "hey");
            let events = JSON.parse(xhr.responseText)
                        let eventList = document.getElementById("events-container");
            eventList.innerHTML = "";
            events.forEach(function(event) {
                let li = document.createElement("li");
                li.className = "event-item"
                li.innerHTML = `
                    <div class='event'>
                        <div class='event-day'>${new Date (event.date).toDateString()}</div>
                        <div class='event-content'>
                            <div class='event-name'>${event.heure+' '+event.name}</div>
                            <div class='event-description'>${event.description}</div>
                        </div>
                    </div>
                `;
                eventList.appendChild(li);
            });
        }
    }
    xhr.send();
