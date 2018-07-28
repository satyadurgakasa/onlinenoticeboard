function formValidation()
{
var regno = document.registration.regno;
var name = document.registration.name;
var father = document.registration.father;
var gender = document.registration.gender;
var female = document.registration.female;
var year = document.registration.year;
var branch = document.registration.branch;
var email = document.registration.email;
var mobile = document.registration.mobile;
var address = document.registration.address;
var password = document.registration.password;

var ufsex = document.registration.fsex; 

if(userid_validation(regno,12))
{
if(passid_validation(password,8,20))
{
if(allLetter(name) && allLetter(father))
{
if(allnumeric(mobile))
{
if(ValidateEmail(email))
{
if(validsex(gender))
{
if(yearselect){
	if (branchselect) {

	}
}
}
} 
}
} 
}
}
}
}
return false;
}


function userid_validation(regno,mx)
{
var uid_len = regno.value.length;
if (uid_len != mx)
{
alert("User Id should not be empty / length be between "+mx+" to "+my);
uid.focus();
return false;
}
return true;
}

function passid_validation(password,mx,my)
{
var passid_len = password.value.length;
if (passid_len == 0 ||passid_len >= my || passid_len < mx)
{
alert("Password should not be empty / length be between "+mx+" to "+my);
passid.focus();
return false;
}
return true;
}


function allLetter(uname)
{ 
var letters = /^[A-Za-z]+$/;
if(uname.value.match(letters))
{
return true;
}
else
{
alert('name must have alphabet characters only');
uname.focus();
return false;
}
}


function allnumeric(uzip)
{ 
var numbers =/^\d{10}$/;;
if(uzip.value.match(numbers))
{
return true;
}
else
{
alert('Enter valid Mobile number');
uzip.focus();
return false;
}
}


function ValidateEmail(uemail)
{
var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
if(uemail.value.match(mailformat))
{
return true;
}
else
{
alert("You have entered an invalid email address!");
uemail.focus();
return false;
}
}

function validsex(umsex)
{
x=0;

if(umsex.checked) 
{
x++;
} 
if(x==0)
{
alert('Select Male/Female');
umsex.focus();
return false;
}
else
{
alert('Form Successfully Submitted');
window.location.reload()
return true;}
}


function yearselect(year)
{
if(year.value == "--select year--")
{
alert('Select your year from the list');
year.focus();
return false;
}
else
{
return true;
}
}

function branchselect(branch)
{
if(branch.value == "--select branch--")
{
alert('Select your branch from the list');
branch.focus();
return false;
}
else
{
return true;
}
}



