$( document ).ready(function() {


    $('#selectBuilding').change(function() {
        var selectedValue = parseInt(jQuery(this).val());
        //call ajax
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

function getBuilding(search){
    if (search = 'undefine'){
        search = " ";
    }
    $.ajax({
        url: "index.php",
        type: "GET",
        data: "controller=stats&action=getBuildingList&search=" + search,
        success: function(data) {
            fillDropDownList(JSON.parse(data),'#selectBuilding');
        }
    });
}

function getBuildingStat(id_building){
    $.ajax({
        url: "index.php",
        type: "GET",
        data: "controller=stats&action=getBuildingStats",
        success: function(data) {

        }
    });
}

function getFlatStat(){
    $.ajax({
        url: "index.php",
        type: "GET",
        data: "controller=stats&action=getFlatStats",
        success: function(data) {

        }
    });
}
function fillDropDownList(options,selector){
    $(selector).empty();
    $.each(options, function(i, p) {
        $(selector).append($('<option></option>').val(p[0]).html(p[1]));
    });
}