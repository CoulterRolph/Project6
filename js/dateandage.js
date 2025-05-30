var today = new Date();
var year = today.getFullYear(); 

var C_birthdate = new Date('Dec 3, 2004 14:30:00');
var S_birthdate = new Date('July 24, 1998 19:30:00');
var D_birthdate = new Date('July 1, 2004 20:00:00');

var C_age = Math.floor((today.getTime() - C_birthdate.getTime()) / 31556900000);
var S_age = Math.floor((today.getTime() - S_birthdate.getTime()) / 31556900000);
var D_age = Math.floor((today.getTime() - D_birthdate.getTime()) / 31556900000);

var C_msg = '<p>' + C_age + ' years old</p>';
var S_msg = '<p>' + S_age + ' years old</p>';
var D_msg = '<p>' + D_age + ' years old</p>';
var year_msg = '<p>Copyright &copy ' + year + '</p>';

document.getElementById('year_msg').innerHTML = year_msg;
document.getElementById('C_age').innerHTML = C_msg;
document.getElementById('S_age').innerHTML = S_msg;
document.getElementById('D_age').innerHTML = D_msg;
