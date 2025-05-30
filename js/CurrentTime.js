var today = new Date();
var date = today.toDateString();
var time = today.toTimeString();

var date_n_time = '<h4>' + date + ' : ' + time + '</h4>';

document.write(date_n_time);