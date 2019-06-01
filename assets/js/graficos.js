$(function () {

    google.charts.load('current', { 'packages': ['corechart', 'geochart'] });

    function getBaseUrl() {
        var hostName = location.hostname;
        if (hostName === "localhost") {
            pathname = window.location.pathname;
            splitPath = pathname.split('/');
            path = splitPath[1];
            baseUrl = "http://" + hostName + "/" + path;
        } else {
            baseUrl = "https://" + hostName;
        }
        return baseUrl;
    }

    function getTotalFiliados() {
        $.ajax({
            method: 'POST',
            url: getBaseUrl() + '/controllers/class/graficos.php',
            data: { type: 1 },
            dataType: 'json',
            success: function (res) {
                google.charts.setOnLoadCallback(drawRegionsMap);
                function drawRegionsMap() {
                    var data = google.visualization.arrayToDataTable([
                        ['Pais', 'Total de filiados'],
                        ['Brazil', res.total],
                    ]);
                    var options = {};
                    var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
                    chart.draw(data, options);
                }
            }
        })
    }

    function getFiliados() {
        $.ajax({
            method: 'POST',
            url: getBaseUrl() + '/controllers/class/graficos.php',
            data: { type: 2 },
            dataType: 'json',
            success: function (res) {
                //grafico em colum
                google.charts.setOnLoadCallback(drawChartColum);
                function drawChartColum() {
                    var data = google.visualization.arrayToDataTable([
                        ["Status", "Total", { role: "style" }],
                        ["Ativo", res.ativos, "#3366cc"],
                        ["Inativo", res.inativos, "#e91e63"],
                    ]);

                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                        {
                            calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation"
                        },
                        2]);

                    var options = {
                        title: "Grafico em coluna de filiados ativos e inativos",
                        height: 300,
                        bar: { groupWidth: "95%" },
                        legend: { position: "none" },
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                    chart.draw(view, options);
                }
                //grafico em pizza
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                    ["Status", "Total"],
                    ["Ativo", res.ativos],
                    ["Inativo", res.inativos],
            
                  ]);
                  var options = {
                    title: 'Grafico em pizza de filiados ativos e inativos',
                    height: 300,
                  };
                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                  chart.draw(data, options);
                }
            }
        })
    }

    getTotalFiliados();
    getFiliados();

});