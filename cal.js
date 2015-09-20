$(function () {

var fcSources = {

	wholePlan: { 
		url: '/feed.php',
		color: 'blue',
		textColor: 'white',
		error: function() { console.log("error"); }
	},

	allActivities: {
		url: './bigfeed.php',
		error: function() { console.log("big feed not showing"); }

	}

};

var count = 0;
	
$('#fullcal').fullCalendar({
		
	header: {
		left: 'title',
		center: 'month agendaWeek agendaDay',
		right: 'today, prev next'
	},

	defaultView: 'agendaWeek',

	eventSources: [fcSources.allActivities, fcSources.wholePlan],

	eventRender: function(event, element, view) {
			console.log('The element is: ' + element.attr);
			console.log('View object: ' + view.name);

			$(element).on('click tap', function() {
				window.location = './editplan2.php';
			});

			$(element).hover(function(e) {
				$(this).css({'background-color': 'green', 'cursor': 'pointer'});
			}, function(o) {
				$(this).css('background-color', 'blue');
			});
		},

	viewRender: function(view) {

			var lastView = view.name;

			if (view.name == 'agendaWeek' || view.name == 'month') {
				$('#fullcal').fullCalendar('removeEventSource', fcSources.allActivities);

				if (count > 0) {
					$('#fullcal').fullCalendar('addEventSource', fcSources.wholePlan);
				console.log(lastView);
				}

				count = 0;
				//$('#fullcal').fullCalendar( 'removeEventSource', fcSources.allActivities );
				//$('#fullcal').fullCalendar('refetchEvents');
			}

			if (view.name == 'agendaDay' && count < 1) {
				$('#fullcal').fullCalendar( 'addEventSource', fcSources.allActivities );
				$('#fullcal').fullCalendar('removeEventSource', fcSources.wholePlan);

				count += 1;

				//$('#fullcal').fullCalendar('removeEventSource', fcSources.wholePlan);
				//$('#fullcal').fullCalendar('refetchEvents');
			} 
		}

	/*views: {
		agendaWeek: {
			events: {
				url: '/feed.php',
				color: 'blue',
				textColor: 'white',
				error: function() { console.log("error"); }
			}

		},

		agendaDay: {
			events: {
				url: '/bigfeed.php',
		error: function() { console.log("big feed not showing"); }
			}
		}
	}*/

});

/*switch ($('#fullcal').fullCalendar('getView').name) {

	case ('agendaWeek') 
}*/

});