 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PRAICOM</title> 
        <link rel="icon" href="./img/imagotipo.png">
    <link rel="stylesheet" href="./css/styles.css">
    <!-- <link rel="stylesheet" href="./css/productos.css"> -->

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    </head>
    
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    var header = document.querySelector("header");
    window.addEventListener("scroll", function() {
        if (window.scrollY > 50) { 
            header.classList.add("solid");
            header.classList.remove("transparent");
        } else {
            header.classList.add("transparent");
            header.classList.remove("solid");
        }
    });
        });
    </script>
</head>
<body>
<header>
    <div class="logo" >
        <div class="imagelogo">
        <img src="./img/logo.png" width="350" height="" alt="Logo de la empresa">
        </div>
        <div class="navegacion w-100">
  <nav class="navbar navbar-light bg-light w-100">
    <nav class="navbar navbar-expand-lg justify-content-end">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarToggleExternalContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 w-100 justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./landinpage.php">Marcas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./about.html">Conocenos</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="./index.php#Contactanos">Contactanos</a>
          </li>
        </ul>
      </div>
    </nav>
  </nav>
</div>
    </div>
    </header>
    <main>
    <div class="Inicio">
    <div class="background-image">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/aire1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/aire2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/aire3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/aire4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/aire5.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>
    <div class="contenido">
        <h2> PRAICOM</h2>
        <p>En  PRAICOM nos enorgullecemos de ofrecer soluciones integrales para sistemas de aire comprimido. Con años de experiencia en la industria, nuestro equipo está comprometido a proporcionar productos de calidad y un servicio excepcional a nuestros clientes en todo momento.</p>
        
    </div>
</div>
    <section>
    <h1 class="titulo" style="text-align: center; margin: 20px; font-size: 40px">Marcas Populares</h1>
    <div class="container">
        <div class="info">
        <p class="info" style="
        text-align: center;
  font-family: sans-serif;
  font-size: 20px;
        ">Conoce los productos que tenemos disponibles</p>

        </div>
        <div id="carouselExampleBrands" class="carousel slide" data-bs-ride="carousel" style="margin: 50px">
        <div class="carousel-inner">
            <?php for ($j = 0; $j < 3; $j++): ?>
                <div class="carousel-item <?= $j === 0 ? 'active' : '' ?>">
                    <div class="d-flex justify-content-between">
                        <div class="card h-100" style="flex: 1; margin: 10px; height: 450px;">
                            <img src="./img/AirPipe-Logo-2-800-600x450.png" class="card-img-top img-fluid" style="height: 250px; object-fit: contain;" alt="Airpipe">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title" style="text-align: center;">Airpipe</h5>
                                <p class="card-text"></p>
                                
                            </div>
                        </div>
                        <div class="card h-100" style="flex: 1; margin: 10px; height: 450px;">
                            <img src="./img/beko.jpg" class="card-img-top img-fluid" style="height: 250px; object-fit: contain;" alt="Beko">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title" style="text-align: center;">Beko</h5>
                                <p class="card-text"></p>
                                
                            </div>
                        </div>
                        <div class="card h-100" style="flex: 1; margin: 10px; height: 450px;">
                            <img src="./img/smc.png" class="card-img-top img-fluid" style="height: 250px; object-fit: contain;" alt="SMC">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title" style="text-align: center;">SMC</h5>
                                <p class="card-text"></p>
                                
                            </div>
                        </div>
                        <div class="card h-100" style="flex: 1; margin: 10px; height: 450px;">
                            <img src="./img/fortric.jpg" class="card-img-top img-fluid" style="height: 250px; object-fit: contain;" alt="Fortric">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"style="text-align: center;">Fortric</h5>
                                <p class="card-text"></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleBrands" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleBrands" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

</div>
<div class="price text-center">
    <a href="./landinpage.php" class="btn btn-primary btn-lg">Ver Más</a>
</div>



    <div class="conocenos" id="Conocenos">
        <div class="descripcion">
        <h2>Conocenos</h2>
        <p>
            En  PRAICOM, nos comprometemos a 
            proporcionar productos de calidad superior 
            respaldados por un servicio excepcional. 
            Trabajamos en estrecha colaboración con 
            nuestros clientes para entender sus necesidades 
            y ofrecer soluciones personalizadas que impulsen su éxito.
        </p>
        <div>
            <h4>Direccion</h4>
            <p>
                Somos una empresa ubicada en Toluca, Estado de México
                
            </p>  
            <h4> Nuestras redes sociales</h4>  
            <div class="redes">
                <a href="https://www.facebook.com/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="50" fill="currentColor" class="facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                    </svg>
                </a>
                <a href="https://www.instagram.com/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="50" fill="currentColor" class="instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                    </svg>
                </a>
                <a href="https://www.x.com/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="50" fill="currentColor" class="twitter-x" viewBox="0 0 16 16">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                    </svg>
                </a>
            </div>
            </div>
    </div>
    <div class="map">
        <a href="https://maps.app.goo.gl/tnbESvZigJEQ7EU39">
            <img src="./img/mapa.jpeg" style="border-radius: 16%;"/>
        </a>
    </div>
</div>
</section>
<section>
    <div class="Contactanos" id="Contactanos">
        
    <div class="whatsapp" >
        <h2>Contactanos</h2>
        <p>Envianos un mensaje directo o un correo electronico para la cotizacion de tu proyecto.</p>
        <h3>Whatsapp</h3>
        <a href="https://wa.me/527228627612?text=Hola%20quiero%20una%20cotizacion!">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#43ac35" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg> 
        </a>    
    </div>
        <div class="formulario">
            <form id="form" method="post" action="formulario.php" class="form">
                <label for="name">Nombre <span> </span></label>
                <input name="name" required type="text" id="name" placeholder="Nombre">
                <label for="subject">Asunto <span> </span></label>
                <input name="subject" required type="text" id="subject" placeholder="Asunto">
                <label for="email">Correo electrónico <span> </span></label>
                <input name="email" type="text" id="email" required placeholder="example@gmail.com">
                <label for="message">Mensaje</label>
                <textarea id="message" name="message" id="" cols="" rows=""></textarea>
                <input type=submit name="Enviar">
            </form>
        </div>

</div>
</section>
</main>
<footer>
    <div class="social-media">
    <div class="text-muted">&copy; PRAICOM <script>new Date().getFullYear()>2010&&document.write(""+new Date().getFullYear());</script>.
    </div>    
    <a href="https://www.facebook.com/">
        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" fill="currentColor" class="facebook" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
        </svg>
    </a>
    <a href="https://www.instagram.com/">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="50" fill="currentColor" class="instagram" viewBox="0 0 16 16">
            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
        </svg>
    </a>
    <a href="https://www.x.com/">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="50" fill="currentColor" class="twitter-x" viewBox="0 0 16 16">
            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
        </svg>
    </a>
</div>
    
    <ul class="footer-options">
        <li><a href="./index.php">Inicio</a></li>
        <li><a href="./landinpage.php">Marcas Populares</a></li>
        <li><a href="./about.html">Conocenos</a></li>
        <li><a href="#contactanos">Contactanos</a></li>
    </ul>
    <ul class="footer-options">
        <li><a href="./landinpage.php">Marcas</a></li>
        <li><a href="./landinpage.php">Airpaipe</a></li>
    </ul>
    <ul class="footer-options">
        <li><a href="#contactanos">Contactanos</a></li>
        <li><a href="#contactanos">Informacion de contacto</a></li>
    </ul>
</footer>
<script>
    var myCarousel = document.querySelector('#carouselExampleBrands');
    var carousel = new bootstrap.Carousel(myCarousel, {
      interval: 5000,  // Intervalo en milisegundos (3 segundos)
      ride: 'carousel'
    });
</script>
</body>
</html>
