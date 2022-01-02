var menuItem = document.getElementsByClassName("menuItem");
var iconMenu = document.querySelector("#iconMenu");
function collapse() {
    if (iconMenu.classList.contains('bi-list')) {
        iconMenu.classList.remove('bi-list')
        iconMenu.classList.add('bi-x')
    } else {
        iconMenu.classList.remove('bi-x')
        iconMenu.classList.add('bi-list')
    }
    for (var i = 0; i < menuItem.length; i++) {
        if (menuItem[i].classList.contains('active')) {
            menuItem[i].classList.remove('active')
        } else {
            menuItem[i].classList.add('active')
        }
    }
}
var datos = [];
let compruebaDatos;
fetch('https://pokeapi.co/api/v2/pokemon?limit=2000')
    .then(res => res.json())
    .then(res => {
        for (var i = 0; i < res.results.length; i++) {
            fetch(res.results[i].url)
                .then(res => res.json())
                .then(res =>
                    datos.push({res})
                )
                .catch(err => console.log(err));
        }
    })
    .catch(err => console.log(err));
function comprobarDatos()
{
    compruebaDatos=setInterval(detenerIntervalo,3000)
}
function detenerIntervalo()
{
    if(datos.length>0)
    {
        clearInterval(compruebaDatos)
        ejecutarDT(datos);
    }
}
function ejecutarDT(dato)
{
    var idPokemon=[];
    var nombrePokemon=[];
    var imagenPokemon=[];
    const obj = Object.entries(dato)
    for (var i=0;i<datos.length;i++){
        idPokemon.push(datos[i].res.id)
        nombrePokemon.push(datos[i].res.name)
        imagenPokemon.push(datos[i].res.sprites.other.dream_world.front_default)
    }
    var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;
            matches = [];
            substrRegex = new RegExp(q, 'i');
            $.each(strs, function(i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });
            cb(matches);
        };
    };
    $('#inputBusqueda').typeahead(null,
        {
            int: true,
            highlight: true, /* Enable substring highlighting */
            minLength: 1,
            name: 'pokemones',
            source: substringMatcher(nombrePokemon)

        })
    let table = new DataTable('#pokemons', {
        data:obj,
        "lengthMenu": [[5,10, 50, -1], [5,10, 50, "All"]],
        "searching": true,
        destroy:true,
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        columns:
            [
                {data:"1.res.id"},
                {data:"1.res.name"},
                {
                    "render": function (data, type, row, meta) {
                        let imgSrc=row[1].res.sprites.front_default;
                        return '<img style="width: 75px" src="'+imgSrc+'">'
                    }
                }, {
                "render": function (data, type, row, meta) {
                    let nPokemon = row[1].res.id;
                    return '<button onclick="abrirModal('+nPokemon+')" class="botonVer"><i class="bi bi-eye"></i></button>'
                }
            },

            ]
    });
}
var modal = document.getElementById("modalPokemon");
var span = document.getElementsByClassName("close")[0];
function abrirModal(nPokemon){
    for(var i = 0;i<datos.length;i++)
    {
        if(datos[i].res.id==nPokemon)
        {
            document.getElementById('nombrePokemon').innerHTML=datos[i].res.name
            document.getElementById('nPokemonModal').textContent='N° en la pokedex: '+datos[i].res.id
            document.getElementById('especiePokemonModal').textContent='Especie: '+datos[i].res.species.name
            document.getElementById('pesoPokemonModal').textContent='Peso: '+datos[i].res.weight
            document.getElementById('imgModal').src=datos[i].res.sprites.other.dream_world.front_default
            document.getElementById('splashTrasero').src=datos[i].res.sprites.back_default
            document.getElementById('splashFrente').src=datos[i].res.sprites.front_default
            document.getElementById('shinyTrasero').src=datos[i].res.sprites.back_shiny
            document.getElementById('shinyFrente').src=datos[i].res.sprites.front_shiny
            modal.style.display = "block";
        }
    }
}
function abrirModalBuscador(){
    let nombre=document.getElementById('inputBusqueda').value;
    for(var i = 0;i<datos.length;i++)
    {
        if(datos[i].res.name==nombre)
        {
            document.getElementById('nombrePokemon').innerHTML=datos[i].res.name
            document.getElementById('nPokemonModal').textContent='N° en la pokedex: '+datos[i].res.id
            document.getElementById('especiePokemonModal').textContent='Especie: '+datos[i].res.species.name
            document.getElementById('pesoPokemonModal').textContent='Peso: '+datos[i].res.weight
            document.getElementById('imgModal').src=datos[i].res.sprites.other.dream_world.front_default
            document.getElementById('splashTrasero').src=datos[i].res.sprites.back_default
            document.getElementById('splashFrente').src=datos[i].res.sprites.front_default
            document.getElementById('shinyTrasero').src=datos[i].res.sprites.back_shiny
            document.getElementById('shinyFrente').src=datos[i].res.sprites.front_shiny
            modal.style.display = "block";
        }
    }
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
