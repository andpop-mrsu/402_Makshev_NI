var hiddenNumber = [Math.floor((Math.random() * 10)), Math.floor((Math.random() * 10)), 
Math.floor((Math.random() * 10))];
hiddenNumber = hiddenNumber.join('');
hiddenNumber = hiddenNumber.split('');

function calc() {
	currentNumber = document.getElementById("guess").value;
	currentCheckNumber = Number(currentNumber);

	if (!Number.isInteger(currentCheckNumber)) {
    	alert('Ошибка! Введите число.');
    	return;
  	}

	if (currentNumber.length != 3) { 
		alert('Ошибка! Число должно быть трехзначным');
		return;
	}

	currentNumber = currentNumber.split('');
	heat_array = hiddenNumber.filter(value => currentNumber.includes(value));

	currentStrNumber = currentNumber.toString();
	hiddenStrNumber = hiddenNumber.toString();
 
	  if (currentStrNumber == hiddenStrNumber) {
	    alert('Вы выиграли!');
	    return;
	} else if ((currentNumber[0] == hiddenNumber[0]) || (currentNumber[1] == hiddenNumber[1]) 
		|| (currentNumber[2] == hiddenNumber[2])) {
		alert('Горячо!');
	  } else if (heat_array != 0) {
	    alert('Тепло!');
	  } else {
	  	alert('Холодно!');
	  }

}