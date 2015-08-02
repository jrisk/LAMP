$(function() {
	
$.ajax({

	type: 'GET',
	url: 'currentplan'
	
})

var activityDuration = function() {
	var durstart = $('#start').val();

	var durend = $('#end').val();

	dur1 = moment(durstart, 'HH:mm A');
	dur2 = moment(durend, 'HH:mm A');

	durfrom = dur2.from(dur1, true);

	$('#durationmodal').html(durfrom);

	return durfrom;
};




})