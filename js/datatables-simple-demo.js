window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple, {
            labels: {
                placeholder: "Buscar...",
                perPage: "Mostrar registros por página",
                noRows: "No se encontraron registros",
                info: "Mostrando {start} a {end} de {rows} registros"
            },
            nextPrev: {
                next: "Siguiente",
                prev: "Anterior"
            },
            sort: {
                sortAscending: "Activar para ordenar de manera ascendente",
                sortDescending: "Activar para ordenar de manera descendente"
            }
        });
    }

    const datatablesSimple2 = document.getElementById('datatablesSimple2');
    if (datatablesSimple2) {
        new simpleDatatables.DataTable(datatablesSimple2, {
            labels: {
                placeholder: "Buscar...",
                perPage: "Mostrar registros por página",
                noRows: "No se encontraron registros",
                info: "Mostrando {start} a {end} de {rows} registros"
            },
            nextPrev: {
                next: "Siguiente",
                prev: "Anterior"
            },
            sort: {
                sortAscending: "Activar para ordenar de manera ascendente",
                sortDescending: "Activar para ordenar de manera descendente"
            }
        });
    }
    const datatablesSimple3 = document.getElementById('datatablesSimple3');
    if (datatablesSimple3) {
        new simpleDatatables.DataTable(datatablesSimple3, {
            labels: {
                placeholder: "Buscar...",
                perPage: "Mostrar registros por página",
                noRows: "No se encontraron registros",
                info: "Mostrando {start} a {end} de {rows} registros"
            },
            nextPrev: {
                next: "Siguiente",
                prev: "Anterior"
            },
            sort: {
                sortAscending: "Activar para ordenar de manera ascendente",
                sortDescending: "Activar para ordenar de manera descendente"
            }
        });
    }
});