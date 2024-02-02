let fullRandomString = "";

// Valor ASCII a array
function asciiToArray(start, end) {
  const array = [];

  for (let i = start; i <= end; i++) {
    array.push(String.fromCharCode(i));
  }

  return array;
}

// Elegir posición de array aleatoria
function getRandomChar(array) {
  const randomIndex = Math.floor(Math.random() * array.length);

  return array[randomIndex];
}

// Generar contraseña
function nuevaContraseña() {
  // Arrays ASCII
  // https://fastbitlab.com/wp-content/uploads/2022/05/Figure-1-15-1200x705.png
  const mayusculas = asciiToArray(65, 90);
  const minusculas = asciiToArray(97, 122);
  const numeros = asciiToArray(48, 57);
  const simbolos = asciiToArray(33, 47).concat(
    // ! " # $ % & ' ( ) * + ´ - . /
    asciiToArray(58, 64), // : ; < = > ? @
    asciiToArray(91, 96), // [ / ] ^ _ `
    asciiToArray(123, 126) // { | } ~
  );

  let randomString = "";

  const length = 30;
  for (let i = 0; i < length; i++) {
    const randomCategory = Math.floor(Math.random() * 4);

    switch (randomCategory) {
      case 0:
        randomString += getRandomChar(mayusculas);
        break;
      case 1:
        randomString += getRandomChar(minusculas);
        break;
      case 2:
        randomString += getRandomChar(numeros);
        break;
      case 3:
        randomString += getRandomChar(simbolos);
        break;
    }
  }

  fullRandomString = randomString;

  const displayedString =
    randomString.length > 15 ? randomString.slice(0, 15) + "..." : randomString;

  // Display contraseña
  document.getElementById("password").style = "opacity: 1;";
  document.getElementById("password").textContent = displayedString;
}

// Copy to clipboard
document
  .getElementById("copy-to-clipboard")
  .addEventListener("click", function () {
    const password = document.getElementById("password");

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
