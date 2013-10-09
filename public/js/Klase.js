var Person = {
	
	constructor : function(firstName, lastName, gender) {
		this._firstName = firstName;
		this._lastName = lastName;
		this._gender = gender;
		Person._counter +=1;
	},

	getFirstName : function(firstName) {
		return this._firstName;
	},
	
	getLastName : function(lastName) {
		return this._lastName;
	},
	
	getGender : function(gender) {
		return this._gender;
	},
	
	work : function() {
		return 'Zivi.';
	},
	
	_counter : 0,
	
	getNumberOfPersons : function() {
		return this._counter;
	}
		
};

var person = Object.create(Person);
person.constructor('Mitar', 'Miric', 'musko');

var Doctor = Object.create(Person);
Doctor.constructor = function(firstName, lastName, gender, hospitalName) {
	Person.constructor(firstName, lastName, gender);
	this._hospitalName=hospitalName;
};
Doctor.getHospitalName = function() {
	return this._hospitalName;
};
Doctor.work = function() {
	return Person.work() + "Doktor u bolnici: " + this.getHospitalName();
};

var doctor = Object.create(Doctor);
Doctor.constructor('Mitar', 'Miric', 'musko', 'VMA');

document.write(person.work());
document.write(doctor.work());
document.write(Person.getNumberOfPersons());