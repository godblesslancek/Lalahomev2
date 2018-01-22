$( document ).ready(function() {
    createDayTempChart();
    createWeekTempChart();
    createWeekConsoChart();
    createDayConsoChart();

    $("#search-box").autocomplete({
        minLength: 2,
        delay : 400,
        appendTo: "#dialog",
        autofocus: true,
        source: function (request, response) {
            $.ajax({
                url: "index.php", // on donne l'URL du fichier de traitement
                type: "GET", // la requête est de type POST
                data: "controller=building&action=getBuilding&search=" + request.term, // et on envoie nos données,
                success: function(data) {
                    response(JSON.parse(data));
                }
            });
        },
        focus: function(event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
        },
        select: function(event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            $("#IDuserConvModal").val(ui.item.value);
        }
    });

    fillDropDownList(["1", "2", "3", "4", "5"],'#selectBuilding');

    $('#selectBuilding').change(function() {
        var selectedValue = parseInt(jQuery(this).val());

        
    });
});

function renderCanvas(data){
    createDayTempChart(data);
    createWeekTempChart(data);
    createWeekConsoChart(data);
    createDayConsoChart(data);
}
function createDayTempChart(data){

   // data = [{ "label": "0-6h", "value": 18},{ "label": "6-12h" , "value": 20 },{ "label": "12-18h", "value": 21 },{ "label": "18-00h" , "value": 19 }]


    var labels = [], datas=[];
    $.each(data, function(index, obj) {
       labels.push(obj.label);
       datas.push(obj.value);
    });
    var chart = $("#chartTempDay");

    var myChart = new Chart(chart, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Température sur une journée ',
                data: datas,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fontColor: "white",
                    },
                    gridLines: {
                        lineWidth: 1
                    },
                    scaleLabel: {
                        fontColor: "white)",
                        labelString: "C°",
                        display: true,
                        fontSize: 20
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                    },
                    gridLines: {
                        lineWidth: 1
                    }
                }]
            },

        }
    });

}

function createWeekTempChart(data){

    /*data = [{ "label": "Lundi", "value": 18},
        { "label": "Mardi" , "value": 20 },
        { "label": "Mercredi", "value": 21 },
        { "label": "Jeudi" , "value": 19 },
        {"label": "Vendredi","value": 23},
        {"label": "Samedi","value": 22},
        {"label": "Dimanche","value": 21}]
    */
    var labels = [], datas=[];
    $.each(data, function(index, obj) {
        labels.push(obj.label);
        datas.push(obj.value);
    });
    var chart = $("#chartTempWeek");

    var myChart = new Chart(chart, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Température sur la semaine',
                data: datas,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fontColor: "white",
                    },
                    gridLines: {
                        lineWidth: 1
                    },
                    scaleLabel: {
                        fontColor: "white)",
                        labelString: "C°",
                        display: true,
                        fontSize: 20
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                    },
                    gridLines: {
                        lineWidth: 1
                    }
                }]
            },

        }
    });
}

function createWeekConsoChart(data){

    /*data = [{ "label": "Lundi", "value": 18},
        { "label": "Mardi" , "value": 20 },
        { "label": "Mercredi", "value": 21 },
        { "label": "Jeudi" , "value": 19 },
        {"label": "Vendredi","value": 23},
        {"label": "Samedi","value": 22},
        {"label": "Dimanche","value": 21}]
    */

    var labels = [], datas=[];
    $.each(data, function(index, obj) {
        labels.push(obj.label);
        datas.push(obj.value);
    });
    var chart = $("#chartConsoWeek");

    var myChart = new Chart(chart, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Consomation électrique sur la semaine',
                data: datas,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fontColor: "white",
                    },
                    gridLines: {
                        lineWidth: 1
                    },
                    scaleLabel: {
                        fontColor: "white)",
                        labelString: "kWh",
                        display: true,
                        fontSize: 20
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                    },
                    gridLines: {
                        lineWidth: 1
                    }
                }]
            },

        }
    });
}

function createDayConsoChart(data){

    //data = [{ "label": "0-6h", "value": 18},{ "label": "6-12h" , "value": 20 },{ "label": "12-18h", "value": 21 },{ "label": "18-00h" , "value": 19 }]


    var labels = [], datas=[];
    $.each(data, function(index, obj) {
        labels.push(obj.label);
        datas.push(obj.value);
    });
    var chart = $("#chartConsoDay");

    var myChart = new Chart(chart, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Consomation électrique sur la semaine',
                data: datas,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',

                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 18
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fontColor: "white",
                    },
                    gridLines: {
                        lineWidth: 1
                    },
                    scaleLabel: {
                        fontColor: "white)",
                        labelString: "kWh",
                        display: true,
                        fontSize: 20
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                    },
                    gridLines: {
                        lineWidth: 1
                    }
                }]
            },

        }
    });
}

function getBuilding(){
 //call ajax//
}

function fillDropDownList(options,selector){
    $(selector).empty();
    $.each(options, function(i, p) {
        $(selector).append($('<option></option>').val(p).html(p));
    });
}
function createTable(data) {
    $('#content').append('<table id="fieldsetTabUser"></table>');
    var row = JSON.parse(data);
    var header = {
        "name_user": "Nom",
        "surname_user": "Prenom",
        "role_user": "Role",
        "email": "@mail",
        "phone": "Phone",
        "id_flat": "Id_flat",


    };
    createRow(header);
    $.each(row, function (index) {
        createRow(row[index]);
    })
}
function createRow(data) {
    var row = $("<tr />")
    $('#fieldsetTabUser').append(row);
    row.append($("<td>" + data.name_user + "</td>"));
    row.append($("<td>" + data.surname_user+ "</td>"));
    row.append($("<td>" + data.role_user + "</td>"));
    row.append($("<td>" + data.email + "</td>"));
    row.append($("<td>" + data.phone + "</td>"));
    row.append($("<td>" + data.id_flat+ "</td>"));

}