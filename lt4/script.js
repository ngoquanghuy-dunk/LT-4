function input(value) {
  const display = document.getElementById("display");
  if (display.innerText === "0") display.innerText = "";
  display.innerText += value;
  document.getElementById("input_display").value = display.innerText;
}

function clearDisplay() {
  document.getElementById("display").innerText = "0";
}

function deleteDigit() {
  const display = document.getElementById("display");
  display.innerText = display.innerText.slice(0, -1) || "0";
}

function calculate() {
  const display = document.getElementById("display");
  try {
    // Evaluate the expression
    const result = eval(display.innerText.replace("÷", "/").replace("×", "*"));
    display.innerText = result;
    document.getElementById("input_display").value = result;
  } catch (error) {
    display.innerText = "Error";
    setTimeout(clearDisplay, 1500); // Clear after 1.5 seconds
  }
}

function addOperator(operator) {
  const display = document.getElementById("display");
  const lastChar = display.innerText.slice(-1);

  // Prevent consecutive operators
  if ("+-*/".includes(lastChar)) {
    display.innerText = display.innerText.slice(0, -1) + operator;
  } else {
    display.innerText += operator;
  }
  document.getElementById("input_display").value = display.innerText;
}
