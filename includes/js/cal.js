function calc(){
	var x, y;
	var sign = "+";
	var result;

	function getNum1(){
		x = document.getElementById('num1').value;
		return Number(x);
	}

	function getNum2(){
		y = document.getElementById('num2').value;
		return Number(y);
	}

	function getSign(){
		sign = document.getElementById('sign').value;
		return sign;
	}

	function setResult(){
		document.getElementById('result').value = result;
	}

	function doCalc(){
		var x = getNum1();
		var y = getNum2();

		if(getSign() == "+"){
			result = x + y;
		}
		else if(getSign() == "-"){
			result = x - y;
		}
		else if(getSign() == "*"){
			result = x * y;
		}
		else{
			result = x / y;
		}
		setResult();
	}
	doCalc();
}