// * variables temporales
var idcenmedicos_seleccionado = "";

function showModalMakeCenMed() {
    $("#modal_cenmedNew").modal("show");
    console.log("show modal");
}

$("#form_createCenMed").submit(function (e) {
    e.preventDefault();
    console.log();
    $.ajax({
        type: "post",
        url: "cenmedicos/store",
        data: $("#form_createCenMed").serialize(),
        // dataType: "dataType",
        success: function (response) {
            if (response) {
                console.log("cen creado");
                $("#modal_cenmedNew").modal("hide");
                $("#form_createCenMed").trigger("reset");
                listCentrosA();
            } else {
                console.log("error");
            }
        },
    });
});

function listCentrosA() {
    $.ajax({
        type: "get",
        url: "cenmedicos/listA",
        // data: "data",
        // dataType: "dataType",
        success: function (response) {
            html = response
                .map(function (cen) {
                    return (a = `
                    <tr>
                        <th scope="row">${$cen.id}</th>
                        <td>${cen.cen_nombre}, ${cen.cen_direccion}</td>
                        <td>${cen.cen_especialidades}</td>
                        <td>${cen.cen_latitud}, ${cen.cen_longitud}</td>
                        <td>${cen.cen_personal}</td>
                        <td>${cen.cen_horario}</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-icon" onclick="editCentro(${cen.id})">
                                <div><i class="fa fa-edit"></i></div>
                            </a>
                            <a href="#" class="btn btn-danger btn-icon" onclick="deleteCen(${cen.id})">
                                <div><i class="fa fa-user-times"></i></div>
                            </a>
                        </td>
                    </tr>
                `);
                })
                .join(" ");
            $("#listCentros").html(html);
        },
    });
}
function deleteCen(id) {
    $.ajax({
        type: "get",
        url: "cenmedicos/delete",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            id_cen: id,
        },
        // dataType: "dataType",
        success: function (response) {
            if (response) {
                console.log("eliminaod");
                listCentrosA();
            } else {
                console.log("error");
            }
        },
    });
}
function editCentro(id) {
    idcenmedicos_seleccionado = id;
    $.ajax({
        type: "get",
        url: "cenmedicos/edit/",
        data: { cen: id },
        // dataType: "dataType",
        success: function (response) {
            $("#form_editCenMed").trigger("reset");
            $("#cen_ci").val(response.cen_ci);
            $("#cen_nombre").val(response.cen_nombre);
            $("#cen_app").val(response.cen_appaterno);
            $("#cen_email").val(response.email);
            $("#modal_cenmededit").modal("show");
        },
    });
}
$("#form_editCenMed").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "cenmedicos/update/" + idcenmedicos_seleccionado,
        data: $("#form_editCenMed").serialize(),
        //   dataType: "dataType",
        success: function (response) {
            if (response) {
                $("#modal_cenmededit").modal("hide");
                listCentrosA();
                console.log("actualizado");
            } else {
                console.log("error");
            }
        },
    });
});


function ubiCentro(id) {
    idcenmedicos_seleccionado = id;
    $.ajax({
        type: "get",
        url: "cenmedicos/ubicacion/",
        data: { mapid: id },
        // dataType: "dataType",
        success: function (response) {
            /*
            mapboxgl.accessToken = 'pk.eyJ1IjoiYnJ5YW43NDAwIiwiYSI6ImNrbHNjbWFhYjBkNzEycG85emZ4aWNkYW0ifQ.vDcMtqPiBpiNtK-p1MVKZQ';
            var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [parseFloat(response.cen_longitud ),parseFloat(response.cen_latitud ) ],
            zoom: 14
            });

            map.on('load', function () {
            map.addSource('places', {
            'type': 'geojson',
            'data': {
            'type': 'FeatureCollection',
            'features': [
            {
            'type': 'Feature',
            'properties': {
            'description':
            '<strong>Make it Mount Pleasant</strong><p><a href="http://www.mtpleasantdc.com/makeitmtpleasant" target="_blank" title="Opens in a new window">Make it Mount Pleasant</a> is a handmade and vintage market and afternoon of live entertainment and kids activities. 12:00-6:00 p.m.</p>',
            'icon': 'marker-stroked'
            },
            'geometry': {
            'type': 'Point',
            'coordinates': [ parseFloat(response.cen_longitud ),parseFloat(response.cen_latitud )]
            }
            }
            ]
            }
            });
            // Add a layer showing the places.
            map.addLayer({
            'id': 'places',
            'type': 'symbol',
            'source': 'places',
            'layout': {
            'icon-image': '{icon}-15',
            'icon-allow-overlap': true
            }
            });

            // When a click event occurs on a feature in the places layer, open a popup at the
            // location of the feature, with description HTML from its properties.
            map.on('click', 'places', function (e) {
            var coordinates = e.features[0].geometry.coordinates.slice();
            var description = e.features[0].properties.description;

            // Ensure that if the map is zoomed out such that multiple
            // copies of the feature are visible, the popup appears
            // over the copy being pointed to.
            while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
            coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
            }

            new mapboxgl.Popup()
            .setLngLat(coordinates)
            .setHTML(description)
            .addTo(map);
            });

            // Change the cursor to a pointer when the mouse is over the places layer.
            map.on('mouseenter', 'places', function () {
            map.getCanvas().style.cursor = 'pointer';
            });

            // Change it back to a pointer when it leaves.
            map.on('mouseleave', 'places', function () {
            map.getCanvas().style.cursor = '';
            });
            });
            */

           mapboxgl.accessToken = 'pk.eyJ1IjoiYnJ5YW43NDAwIiwiYSI6ImNrbHNjbWFhYjBkNzEycG85emZ4aWNkYW0ifQ.vDcMtqPiBpiNtK-p1MVKZQ';
           var map = new mapboxgl.Map({
           container: 'map',
           style: 'mapbox://styles/mapbox/streets-v11',
           center: [parseFloat(response.cen_longitud ),parseFloat(response.cen_latitud)],
           zoom: 15
           });

           var marker = new mapboxgl.Marker()
           .setLngLat([parseFloat(response.cen_longitud ),parseFloat(response.cen_latitud)])
           .addTo(map);
            $("#modal_map").modal("show");



        },
    });
}




