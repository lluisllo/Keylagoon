<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- SEO = Básico -->
  <!-- Cada página del sitio tiene que ser diferente el título y la descripción -->
  <title></title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <!-- Etiquetas Open Graph y Twitter Card, para crear el SEO de Redes Sociales -->
  <meta property="og:title" content="Título de tu página" />
  <meta property="og:description" content="Descripción de tu página" />
  <meta property="og:image" content="URL de la imagen que quieres mostrar en las redes sociales" />
  <meta property="og:url" content="URL de tu página" />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Título de tu página" />
  <meta name="twitter:description" content="Descripción de tu página" />
  <meta name="twitter:image" content="URL de la imagen que quieres mostrar en Twitter" />

  <!-- App Web, inidicar al navegador que elementos mostrar en un JSON -->
  <link rel="manifest" href="site.webmanifest" />
  <!-- icono de acceso para IOS -->
  <link rel="apple-touch-icon" href="icon.png" />
  <!-- Recordar que favicon.ico tiene que estar en el directorio inicial -->

  <!-- links de estilos -->
  <link rel="stylesheet" href="css/style.css" />

  <!-- Se cambia el tema de algunos navegadores -->
  <meta name="theme-color" content="#fafafa" />
  <!-- Código de las plataformas de Análisis -->
  <script></script>
  <!-- Scripts a cargar antes de la renderización -->
  <!-- <script src="preloader.js"></script> -->
</head>

<body>
  <!-- Formularios -->
  <!-- Log in -->
  <section class="interface-entrar" id="interface-entrar">

    <h4>Entrar</h4>

    <input type="email" placeholder="Email..." required>
    <input type="password" placeholder="Contraseña..." required>

    <input type="submit" class="submit" value="Entrar">
    <p class="no-tengo-cuenta" id="no-tengo-cuenta">No tengo cuenta</p>

    <span id="closeButtonEntrar">&times;</span>
  </section>

  <!-- Registro -->
  <section class="interface-registrarse" id="interface-registrarse">

    <h4>Registro</h4>

    <input type="email" placeholder="Email..." required>
    <input type="password" placeholder="Contraseña..." required>
    <input type="password" placeholder="Repetir contraseña..." required>

    <label for="">
      <input type="checkbox" class="checkbox" required>
      Accepto términos y condiciones
    </label><br>

    <input type="submit" class="submit" value="Registrarme">
    <p class="ya-tengo-cuenta" id="ya-tengo-cuenta">Ya tengo cuenta</p>

    <span id="closeButtonRegistrarse">&times;</span>
  </section>

  <!-- Guardar contraseña -->
  <section class="interface-guardar-contrasena" id="interface-guardar-contrasena">

    <span id="closeButtonContrasena">&times;</span>
  </section>

  <!-- Page -->
  <div id="container" class="container">
    <header>
      <!--  -->

      <picture>
        <div class="header__logo">
          <img src="svg/Logo.svg" alt="" style="height: 101px" />
        </div>
      </picture>

      <h1>Keylagoon</h1>

      <!-- Entrar / Registrarse -->
      <h3 class="entrar-registrarse">
        <p onclick="interfaceEntrar()">Entrar</p>
        <p>&nbsp;/&nbsp;</p>
        <p onclick="interfaceRegistrarse()">Registrarse</p>
      </h3>

      <button class="header__bbdd">Mis contraseñas</button>

      <!--  -->
    </header>

    <main>
      <!--  -->

      <h4 class="main__instrucciones">
        INSTRUCCIONES: Lorem ipsum, dolor sit amet consectetur adipisicing
        elit. Aperiam laboriosam possimus perferendis earum vel autem
        distinctio repellat mollitia omnis, accusantium consectetur vero eum
        ex deleniti
      </h4>

      <section class="generador">
        <div class="password">
          <p id="password" style="opacity: 0.6">Pulsa "Nueva contraseña"</p>

          <!-- 
              No está con img porque sinó no puedo 
              manipular el 'path' 
            -->

          <svg width="37" height="46" viewBox="0 0 37 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="copy-to-clipboard" id="copy-to-clipboard">
            <path class="path-svg" d="M18.5 0C16.3809 0 14.8841 1.49682 14.1441 3.36364H0V45.4091H37V3.36364H22.8559C22.1159 1.49682 20.6191 0 18.5 0ZM18.5 3.36364C19.425 3.36364 20.1818 4.12045 20.1818 5.04545V6.72727H25.2273V10.0909H11.7727V6.72727H16.8182V5.04545C16.8182 4.12045 17.575 3.36364 18.5 3.36364ZM3.36364 6.72727H8.40909V13.4545H28.5909V6.72727H33.6364V42.0455H3.36364V6.72727ZM6.72727 18.5V21.8636H10.0909V18.5H6.72727ZM13.4545 18.5V21.8636H30.2727V18.5H13.4545ZM6.72727 25.2273V28.5909H10.0909V25.2273H6.72727ZM13.4545 25.2273V28.5909H30.2727V25.2273H13.4545ZM6.72727 31.9545V35.3182H10.0909V31.9545H6.72727ZM13.4545 31.9545V35.3182H30.2727V31.9545H13.4545Z" fill="#4D4F4D" />
          </svg>
        </div>

        <button class="new__password" id="new__password" onclick="nuevaContraseña()">
          Nueva contraseña
        </button>

        <button class="save__password" id="save__password" onclick="interfaceGuardarContraseña()">
          Guardar contraseña
        </button>

        <div class="settings__password">
          <!-- Slider -->
          <input type="range" min="8" max="30" value="8" class="lenght-slider" id="lenght-slider" />

          <div class="slider-output" id="slider-output"></div>

          <input type="checkbox" class="symbol-checkbox" id="symbol-checkbox" checked />
          <label style="font-size: 18px">&nbsp;&nbsp;Símbolos</label>
          <!--  -->
        </div>
      </section>

      <article class="porque__contrasena">
        <!--  -->

        <h2>¿Qué hace que una contraseña sea segura?</h2>

        <section class="exp__1">
          <h4>Las contraseñas seguras son únicas y aleatorias</h4>
          <p>
            Los humanos no son muy buenos para crear contraseñas que sean
            cualquiera de esas cosas, y mucho menos ambas. El 81% de las
            filtraciones de datos son causadas por contraseñas reutilizadas o
            débiles, por lo que las contraseñas únicas y aleatorias son su
            mejor defensa contra las amenazas en línea.
          </p>
        </section>

        <section class="exp__2">
          <h4>¿Por qué mi contraseña debería ser única?</h4>
          <p>
            Si utiliza la misma contraseña tanto para su cuenta de correo
            electrónico como para el inicio de sesión de su cuenta bancaria,
            un atacante solo necesita robar una contraseña para obtener acceso
            a ambas cuentas, duplicando su exposición. Si ha utilizado la
            misma contraseña para 14 cuentas diferentes, le estará facilitando
            mucho el trabajo al atacante. Puedes protegerte utilizando un
            generador para crear contraseñas únicas y almacenarlas.
          </p>
        </section>

        <section class="exp__3">
          <h4>¿Por qué mi contraseña debería ser aleatoria?</h4>
          <p>
            Las contraseñas aleatorias son difíciles de adivinar y más
            difíciles de descifrar para los programas informáticos. Si hay un
            patrón discernible, las probabilidades de que un atacante utilice
            un ataque de fuerza bruta y obtenga acceso a su cuenta aumentan
            exponencialmente. Las contraseñas aleatorias pueden contener una
            mezcla de caracteres no relacionados, pero combinar palabras no
            relacionadas también funciona.
          </p>
        </section>

        <!--  -->
      </article>

      <!--  -->
    </main>

    <footer class="main__footer">
      <!-- <h6>&copy;Copyright</h6> -->
    </footer>
  </div>

  <script src="js/script.js"></script>

  <?php
  include("php/conexiones.php");
  ?>
</body>

</html>