$(document).ready(function() {

    $('#fullcal').fullCalendar({

        googleCalendarApiKey: 'AIzaSyAEKheqfGPngThzUI9DoyUSxYneTlMWeII',
        events: {
            googleCalendarId: 'joeyrsk@gmail.com'
        }
    });

    console.log('fullcal');
});