// ===================== Generador de contraseñas =====================
// Arrays ASCII
// https://fastbitlab.com/wp-content/uploads/2022/05/Figure-1-15-1200x705.png
const mayusculas = asciiToArray(65, 90);
const minusculas = asciiToArray(97, 122);
const numeros = asciiToArray(48, 57);
const simbolos = asciiToArray(33, 47).concat(
  // --> ! " # $ % & ' ( ) * + ´ - . /
  asciiToArray(58, 64), // --> : ; < = > ? @
  asciiToArray(91, 96), // --> [ / ] ^ _ `
  asciiToArray(123, 126) // --> { | } ~
);

// Elegir posición de array aleatoria
function getRandomChar(array) {
  const randomIndex = Math.floor(Math.random() * array.length);

  return array[randomIndex];
}

// Valor ASCII a array
function asciiToArray(start, end) {
  const array = [];

  for (let i = start; i <= end; i++) {
    array.push(String.fromCharCode(i));
  }

  return array;
}

// Slider
let sliderInput = document.getElementById("lenght-slider");
let sliderOutput = document.getElementById("slider-output");
let stringLenght = sliderOutput.value;
stringLenght = sliderInput.value;
sliderOutput.innerHTML = sliderInput.value;

sliderInput.oninput = function () {
  sliderOutput.innerHTML = this.value;
  stringLenght = this.value;
};

let randomString = "";
let fullRandomString = "";

// Generar contraseña
function nuevaContraseña() {
  let randomString = "";
  let counts = { 0: 0, 1: 0, 2: 0, 3: 0 };
  let caracterAnterior = -1;

  for (let i = 0; i < stringLenght; i++) {
    let randomArray;

    // Evita dos carácteres seguidos procedentes del mismo array
    do {
      randomArray = Math.floor(Math.random() * 4);
    } while (randomArray === caracterAnterior);

    caracterAnterior = randomArray;

    // Garantiza que haya, al menos, dos carácteres de cada tipo, si:
    if (
      stringLenght > 8 &&
      document.getElementById("symbol-checkbox").checked
    ) {
      if (
        i === stringLenght - 1 &&
        !Object.values(counts).every((count) => count >= 2)
      ) {
        return nuevaContraseña();
      }
    }

    let charToAdd;
    switch (randomArray) {
      case 0:
        charToAdd = getRandomChar(mayusculas);
        counts[0]++;
        break;
      case 1:
        charToAdd = getRandomChar(minusculas);
        counts[1]++;
        break;
      case 2:
        if (document.getElementById("symbol-checkbox").checked) {
          charToAdd = getRandomChar(simbolos);
          counts[2]++;
        }
        break;
      case 3:
        charToAdd = getRandomChar(numeros);
        counts[3]++;
        break;
    }

    randomString += charToAdd;
  }

  if (comprovarAdyacencia(randomString)) {
    randomString;
  } else {
    return nuevaContraseña();
  }

  if (comprovarDuplicidad(randomString)) {
    randomString;
  } else {
    return nuevaContraseña();
  }

  if (comprovarUpperLower(randomString)) {
    randomString;
  } else {
    return nuevaContraseña();
  }

  // Ocutar contraseña a partir de X carácteres
  fullRandomString = randomString;
  const displayedString =
    stringLenght > 15 ? randomString.slice(0, 15) + "..." : randomString;

  // Display contraseña
  document.getElementById("password").style = "opacity: 1;";
  document.getElementById("password").textContent = displayedString;
}

// Garantiza que no haya valores ASCII adyacentes entre si
function comprovarAdyacencia(randomString) {
  for (let i = 1; i < randomString.length; i++) {
    const currentCharCode = randomString.charCodeAt(i);
    const prevCharCode = randomString.charCodeAt(i - 1);
    if (
      currentCharCode === prevCharCode ||
      currentCharCode === prevCharCode + 1 ||
      currentCharCode === prevCharCode - 1
    ) {
      return false;
    }
  }
  return true;
}

// Comprueba que no se repitan caracteres
function comprovarDuplicidad(randomString) {
  const presente = new Set();
  for (let i = 0; i < randomString.length; i++) {
    const charCode = randomString.charCodeAt(i);
    if (presente.has(charCode)) {
      return false;
    }
    presente.add(charCode);
  }
  return true;
}

// Comprueba que no haya una misma letra en mayúscula y minúscula
function comprovarUpperLower(randomString) {
  const seen = new Set();
  for (let i = 0; i < randomString.length; i++) {
    const char = randomString[i].toLowerCase();
    const charCode = char.charCodeAt(0);
    if (seen.has(charCode)) {
      return false;
    }
    seen.add(charCode);
  }
  return true;
}

// Copiar al portapapeles
document
  .getElementById("copy-to-clipboard")
  .addEventListener("click", function () {
    copyToClipboard(fullRandomString);
  });

function copyToClipboard(fullRandomString) {
  const textarea = document.createElement("textarea");
  textarea.value = fullRandomString;
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand("copy");
  document.body.removeChild(textarea);
}

// ===================== Interfaz de usuario =====================
// interface-entrar
function interfaceEntrar() {
  interfaceEntrar = document.getElementById("interface-entrar");
  interfaceEntrar.style = "display: block";
}

// interface-Registrarse
function interfaceRegistrarse() {
  interfaceRegistrarse = document.getElementById("interface-registrarse");
  interfaceRegistrarse.style = "display: block";
}

// interface-GuardarContraseña
function interfaceGuardarContraseña() {
  interfaceGuardarContraseña = document.getElementById(
    "interface-guardar-contrasena"
  );
  interfaceGuardarContraseña.style = "display: block";
}
