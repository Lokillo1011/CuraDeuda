<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="../css/app.css">
    <!--paquete de iconos de boostrap para menu hamburguesa-->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css"
          integrity="sha512-1fPmaHba3v4A7PaUsComSM4TBsrrRGs+/fv0vrzafQ+Rw+siILTiJa0NtFfvGeyY5E182SDTaF5PqP+XOHgJag=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body onload="comprobarDatos()">
<nav>
    <ul class="menu">
        <li class="logo"><a href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Pokebola-pokeball-png-0.png">
            </a></li>
        <li class="menuItem"><a href="#">Inicio</a></li>
        <li class="menuItem"><a href="#noticias">Noticias</a></li>
        <li class="menuItem"><a href="#pokedex">Pokedex</a></li>
        <div class="buscador menuItem">
            <input type="text" id="inputBusqueda" placeholder="Buscar Pokemon.." name="buscar">
            <button onclick="abrirModalBuscador()"><i class="bi bi-search"></i></button>
        </div>
        <li class="menuIcon" onclick="collapse()"><a href="#"><i id="iconMenu" class="bi bi-list"></i></a></li>
    </ul>
</nav>
<header class="header">
    <div class="opacidadHeader"></div>
    <div class="contenedor">
        <div class="textoHeader">
            <div class="textoPrincipal">
                <span>Bienvenido a la Pokedex Online</span>
            </div>
            <div class="textoGrande">
                <span>Atrapalos Ya!</span>
            </div>
        </div>
    </div>
</header>
<section style="position: relative" id="noticias">
    <div class="contenedor">
        <div class="fila" style="justify-content: center">
            <div style="text-align: center">
                <h2 style="font-size: 40px;margin-top: 0;margin-bottom: 15px;">Noticias mas recientes</h2>
            </div>
        </div>
        <div class="fila" style="justify-content: center">
            <div style="text-align: center" class="columna">
                <div class="cardGira">
                    <div class="cardBody">
                        <div class="cardFrente">
                            <img src="https://assets.pokemon.com/assets/cms2-es-xl/img/misc/pokemon-tv-app/pokemon-tv-app-169.png"
                                 alt="Avatar" style="width:100%">
                            <div class="cardFooter">
                                <h4><b>Aplicacion movil pokemon</b></h4>
                            </div>
                        </div>
                        <div class="cardAtras">
                            <h4 style="position: relative"><b>Aplicacion movil pokemon</b></h4>
                            <img src="https://assets.pokemon.com/assets/cms2-es-xl/img/misc/pokemon-tv-app/pokemon-tv-app-169.png"
                                 alt="Avatar" style="width:100%;filter: brightness(50%);">
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: center" class="columna">
                <div class="cardGira">
                    <div class="cardBody">
                        <div class="cardFrente">
                            <img src="https://assets.pokemon.com/assets/cms2-es-xl/img/video-games/video-games/pokemon_cafe_mix/pokemon-cafe-mix-169.jpg"
                                 alt="Avatar" style="width:100%">
                            <div class="cardFooter">
                                <h4><b>Pokemon Cafe mix</b></h4>
                            </div>
                        </div>
                        <div class="cardAtras">
                            <h4 style="position: relative"><b>Pokemon Cafe mix</b></h4>
                            <img src="https://assets.pokemon.com/assets/cms2-es-xl/img/video-games/video-games/pokemon_cafe_mix/pokemon-cafe-mix-169.jpg"
                                 alt="Avatar" style="width:100%;filter: brightness(50%);">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="position: relative; background: white" id="pokedex">
    <div class="contenedor">
        <div style="text-align: center">
            <h2 style="font-size: 40px;margin-top: 0;margin-bottom: 15px;">Descubrelos a todos con la Pokedex</h2>
        </div>
        <div class="fila" style="justify-content: center">
            <table class="display" cellspacing="0" cellpadding="2" width="100%" style="width: 0px;text-align: center"
                   id="pokemons">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</section>
<div id="modalPokemon" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div style="text-align: center;" class="modal-header">
            <span class="close">&times;</span>
            <img style="width: 50px" id="imgModal" src="">
            <h2 id="nombrePokemon"></h2>
        </div>
        <div class="modal-body">
            <h3 style="text-align: center">Información</h3> <br>
            <div style="place-content: center;margin-top: calc(1 * -12px) !important;" class="fila">

                <table>
                    <tr>
                        <th> <span id="nPokemonModal"></span></th>
                    </tr>
                    <tr>
                        <th><span id="especiePokemonModal"></span></th>
                    </tr>
                    <tr> <th><span id="tipoPokemonModal"></span></th>
                    </tr>
                    <tr>
                        <th> <span id="pesoPokemonModal"></span></th>
                    </tr>
                </table>
            </div>
            <h3 style="text-align: center">Imagenes</h3>
            <table id="tableModal">
                <tr>
                    <th>Normal Trasero</th>
                    <th>Normal Frente</th>
                </tr>
                <tr>
                    <th><img style="width: 120px" id="splashTrasero"></th>
                    <th><img style="width: 120px" id="splashFrente"></th>
                </tr>
                <tr>
                    <th>Shiny Trasero</th>
                    <th>Shiny Frente</th>
                </tr>
                <tr>
                    <th><img style="width: 120px" id="shinyTrasero"></th>
                    <th><img style="width: 120px" id="shinyFrente"></th>
                </tr>
            </table>

        </div>
    </div>
</div>

<div class="botonDiv">
    <a href="https://pokeapi.co" target="_blank" class="botonFlotante">
        <i id="iconflotante" style="margin: 12px;" class="bi bi-geo-alt"></i>
    </a>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
<script src="../js/script.js"></script>
</body>
</html>
