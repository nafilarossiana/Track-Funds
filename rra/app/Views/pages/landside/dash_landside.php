<?= $this->section('content'); ?>

<style>
        .center .content-1 {
            background-color: #fff;
            border-radius: 2px;
            margin: 10px;
            flex-grow: 1;
            padding: 20px;
            margin-left: 40px;
            transition: padding 0.3s ease;
            text-align: justify;
            max-width: 100%;
            height: 100%;
            overflow-x: auto;
            order: 1;
        }
        .center .content-1 .header-text .section-header{
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
            background-color: #fff;
            border-radius: 3px;
            border: none;
            position: relative;
            margin-bottom: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
        }
        
        .header-text h4{
            font-weight: 700;
        }
        .card.border-left-sisa {
            border-left: 6px solid #e74a3b;
        }
        .card.border-left-realisasi {
            border-left: 6px solid #92C044;
        }
        .card.border-left-total {
            border-left: 6px solid #68A7DA;
        }
    

        
        .button-export .custom-button {
            background-color: #3088CF;
            color: white; /* Sesuaikan dengan kebutuhan Anda */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button-export .custom-button:hover {
            background-color: #0F6AB7; /* Warna saat tombol dihover */
        }
        .theadrekap {
            background-color: #0B5394; 
            color: white; 
            border: 1px solid; 
            padding: 0.4rem; 
        }
        .trRekap{
            background-color: #4985BB;
            color: white; 
            border: 1px solid; 
            padding: 0.4rem; 
        }
        .trRekap1{
            background-color: #E3F0FC;
            color: black; 
            border: 1px solid; 
            padding: 0.4rem; 
            text-align: center;
        }
        .center .content-1 .table {
            width: 100%;
        }
        .center .content-1 .header-text .section-header .button-data {
            text-align: right;
        }
    
        .button-data .custom-button {
            background-color: #3088CF;
            color: white; /* Sesuaikan dengan kebutuhan Anda */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button-data .custom-button:hover {
            background-color: #0F6AB7; /* Warna saat tombol dihover */
        }
    </style>

<div class="center">
    <div class="content-1">
        <div class="header-text">
            <div class="section-header">
                <h4 style="margin-bottom: 5px;">Dashboard Landside Facilities</h4>
                <div class="button-data" style="position: absolute; top: 0; right: 0; margin: 10px;">
                    <button type="button" class="btn custom-button" onclick="redirectToPage('/landside/landside')">
                        <i class="fa fa-file"></i>&nbsp; &nbsp; Data
                    </button>
                </div>
            </div>
        </div>
        <div class="button-export">
       
</div>
            
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered" style="width:100%;">
                        <thead class="theadrekap">
                            <tr>
                                <th class="text-center" colspan="9">Laporan Bulanan Eksploitasi</th>
                            </tr>
                            <tr>
                                <th class="text-center" colspan="9">Airport Landside Department</th>
                            </tr>
                            <tr class="trRekap">
                                <th class="text-center">Gl-Account</th>
                                <th class="text-center">RKA</th>
                                <th class="text-center">Geser Anggaran</th>
                                <th class="text-center">Nilai Pekerjaan</th>
                                <th class="text-center">Realisasi</th>
                                <th class="text-center">Belum Realisasi</th>
                                <th class="text-center">Rencana Program</th>
                                <th class="text-center">Sisa RKA</th>
                                <th class="text-center">Estimasi Sisa Anggaran</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php foreach ($rekapData as $row) : ?>
        <tr>
            <td class="trRekap">
                <?php 
                    $glAccountKey = key($gl_account[$row['id_akun']]);
                    echo $gl_account[$row['id_akun']][$glAccountKey]['gl_account'];
                ?>
            </td>
            <td class="trRekap1"><?= number_format($row['rka'], 0, ',', '.'); ?></td>
            <td class="trRekap1"><?= number_format($row['geser_anggaran'], 0, ',', '.'); ?></td>
            <td class="trRekap1"><?= number_format($row['nilai_pekerjaan'], 0, ',', '.'); ?></td>
            <td class="trRekap1"><?= number_format($row['bulan'], 0, ',', '.'); ?></td>
            <td class="trRekap1"><?= number_format($row['sisa_belum'], 0, ',', '.'); ?></td>
            <td class="trRekap1"><?= number_format($row['rencana_program'], 0, ',', '.'); ?></td>
            <td class="trRekap1"><?= number_format($row['sisa_rka'], 0, ',', '.'); ?></td>
            <td class="trRekap1"><?= number_format($row['estimasi_sisa'], 0, ',', '.'); ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>

                    </table>
                </div>
            </div>
            </div>

        <div class="row">
            <div class="col-lg-4 mb-6">
                <figure class="highcharts-figure">
                    <div id="container-pie"></div>
                    <p class="highcharts-description">
                        <div class="row px-3">
                            <div class="col">
                                <div class="card border-left-realisasi p-0 mb-2">
                                    <div class="card-body p-1">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Realisasi</div>
                                        <div class="text-xs mb-0 font-weight-bold text-gray-800 text-nowrap">Rp. <?= number_format($totalPengeluaran, 0, ',', '.') ?> (<?= number_format($persentaseRealisasi, 2) ?>%)</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card border-left-sisa p-0 mb-2">
                                    <div class="card-body p-1">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Sisa Anggaran</div>
                                        <div class="text-xs mb-0 font-weight-bold text-gray-800 text-nowrap">Rp. <?= number_format($totalsisaRka, 0, ',', '.') ?> (<?= number_format($persentaseSisaAnggaran, 2) ?>%)</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card border-left-total p-0 mb-2">
                                    <div class="card-body p-1">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Anggaran</div>
                                        <div class="text-xs mb-0 font-weight-bold text-gray-800 text-nowrap">Rp. <?= number_format($totalAnggaran, 0, ',', '.') ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </figure>
            </div>
            <div class="col-lg-8 col-md-6">
                <figure class="highcharts-figure">
                    <div id="barchart-rekap"></div>
                </figure>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-1">
                        <div class="row">
                            <div class="col-lg-6">
                                <figure class="highcharts-figure">
                                    <div id="bulanan-bar"></div>
                                </figure>
                            </div>
                            <div class="col-lg-6">
                                <div class="table-responsive pt-3">
                                    <table class="table table-sm table-bordered">
                                        <thead class="theadrekap">
                                            <tr>
                                                <th class="text-center">Bulan</th>
                                                <th class="text-center">Rencana</th>
                                                <th class="text-center">Realisasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($rrbulanan as $row) : ?>
                                                <tr>
                                                    <td class="trRekap1"><?= $row['bulan']; ?></td>
                                                    <td class="trRekap1"><?= number_format($row['rencana'], 0, ',', '.'); ?></td>
                                                    <td class="trRekap1"><?= number_format($row['realisasi'], 0, ',', '.'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card my-2">
                    <div class="card-body p-1">
                        <figure class="highcharts-figure">
                        <ul class="nav nav-tabs" id="grafik-jenis" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="jenis-tab" data-toggle="tab" href="#jenis-tab-content" role="tab" aria-controls="jenis-tab-content" aria-selected="true">
                                Distribusi Jenis Program
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="jeniskontrak-tab" data-toggle="tab" href="#jeniskontrak-tab-content" role="tab" aria-controls="jeniskontrak-tab-content" aria-selected="false">
                                Distribusi Jenis Kontrak Program
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="jenis-tab-content" role="tabpanel" aria-labelledby="jenis-tab">
                            <div id="jenis-bar"></div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered">
                                            <thead class="theadrekap">
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Jenis</th>
                                                    <th class="text-center">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $counter=1;
                                                $totalJumlah = 0;
                                                foreach ($jenisValues as $row) : 
                                                    $totalJumlah += $row['jumlah'];
                                                ?>
                                                    <tr>
                                                        <td class="trRekap1"><?= $counter++; ?></td>
                                                        <td class="trRekap1"><?= $row['nama']; ?></td>
                                                        <td class="trRekap1"><?= $row['jumlah']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr class="theadrekap">
                                                    <th class="text-center" colspan="2">Total</th>
                                                    <th class="text-center"><?= $totalJumlah; ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="jeniskontrak-tab-content" role="tabpanel" aria-labelledby="jeniskontrak-tab">
                            <div id="jeniskontrak-bar"></div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered">
                                            <thead class="theadrekap">
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Jenis</th>
                                                    <th class="text-center">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $counter=1;
                                                $totalJumlah = 0;
                                                foreach ($jeniskontrakValues as $row) : 
                                                    $totalJumlah += $row['jumlah'];
                                                ?>
                                                    <tr>
                                                        <td class="trRekap1"><?= $counter++; ?></td>
                                                        <td class="trRekap1"><?= $row['nama']; ?></td>
                                                        <td class="trRekap1"><?= $row['jumlah']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr class="theadrekap">
                                                    <th class="text-center" colspan="2">Total</th>
                                                    <th class="text-center"><?= $totalJumlah; ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card my-2">
                    <div class="card-body p-1">
                        <figure class="highcharts-figure">
                            <div id="status-bar"></div>
                        </figure>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead class="theadrekap">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $counter=1;
                                    $totalJumlah = 0;
                                    foreach ($statusValues as $row) : 
                                        $totalJumlah += $row['jumlah'];
                                    ?>
                                        <tr>
                                            <td class="trRekap1"><?= $counter++; ?></td>
                                            <td class="trRekap1"><?= $row['status']; ?></td>
                                            <td class="trRekap1"><?= $row['jumlah']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="theadrekap">
                                        <th class="text-center" colspan="2">Total</th>
                                        <th class="text-center"><?= $totalJumlah; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


            
 


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/no-data-to-display.js"></script>

<script>
    Highcharts.setOptions({
        lang: {
            thousandsSep: '.',
            numericSymbols: [" Ribu", " Juta", " Milyar", " Trillion", " P", " E"]
        }
    });

    // Use PHP variables for dynamic data

    var totalsisaRka = <?= $totalsisaRka ?>;
    var totalPengeluaran = <?= $totalPengeluaran ?>;

    Highcharts.chart('container-pie', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            fontSize: 8,
            height: 350
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Rencana Realisasi Anggaran',
            style: {
                fontSize: '14px',
                fontWeight: 'bold'
            }
        },
        tooltip: {
            pointFormat: '<b>{series.name}</b>: <b>Rp. {point.value}</b><br>Persentase : <b>{point.percentage:.2f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: ' %'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.percentage:.2f} %',
                    distance: -50
                },
                showInLegend: true,
            }
        },
        series: [{
            name: 'Nilai',
            colorByPoint: true,
            data: [{
                name: 'Realisasi',
                y: totalPengeluaran,  // Use PHP variable
                color: '#62C59F',
                value: totalPengeluaran,
                sliced: true
            }, {
                name: 'Sisa Anggaran',
                y: totalsisaRka,  // Use PHP variable
                color: '#68A7DA',
                value: totalsisaRka
            }]
        }]
    });

    var anggaranData = <?= json_encode(array_map('floatval', array_column($dataForChart, 'totalAnggaranPerId'))) ?>;
    var sisaAnggaranData = <?= json_encode(array_map('floatval', array_column($dataForChart, 'totalSisaPerId'))) ?>;
    var realisasiData = <?= json_encode(array_map('floatval', array_column($dataForChart, 'totalRealisasiPerId'))) ?>;

    
    Highcharts.chart('barchart-rekap', {
    chart: {
        type: 'column',
        fontSize: 8,
        height: 420
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'Distribusi & Realisasi Anggaran Per Akun',
        style: {
            fontSize: '14px',
            fontWeight: 'bold'
        }
    },
    xAxis: {
        categories: <?= json_encode(array_column($dataForChart, 'glAccountData')) ?>,
        labels: {
            rotation: -45,
            style: {
                fontSize: '10px'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Persentase ( % )'
        }
    },
    tooltip: {
    formatter: function() {
        console.log(anggaranData); // Tambahkan ini untuk memeriksa data
        var sum = 0;
        var formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });

        $.each(this.points, function(i, point) {
            sum += point.y;
        });
        
        var s = '<b>' + this.x + '</b><br>';

        var anggaranValue = anggaranData[this.point.index].toLocaleString().replace(",", ".");  // Accessing total anggaran for the specific point

        s += 'Total Anggaran : <b>' + anggaranValue + '</b><br>';

        $.each(this.points, function(i, point) {
    var value = formatter.format(point.y); // Format nilai titik dalam tooltip
    if (point.series.name === "Anggaran") {
        s += '<span style="font-weight:normal">' + point.series.name + ': ' + '</span><b>' + value + '</b> <br>';
    } else {
        var roundedPercentage = Math.round(point.percentage);
        s += '<span style="font-weight:normal">' + point.series.name + ': </span><b>' + value + '</b> (' + roundedPercentage + '%)<br>';
    }
});


        return s;
    },
    shared: true
},

    plotOptions: {
        column: {
            stacking: 'percent'
        }
    },
    series: [
        {
            name: 'Sisa Anggaran',
            data: sisaAnggaranData,
            color: '#E9C780',
            total:anggaranData
        },
        {
            name: 'Realisasi',
            data: realisasiData,
            color: '#68A7DA',
            total: anggaranData
        },
    ],
    total: anggaranData
});


// BARCHART BULANAN -----------------------------------------------------------------

var categories = <?= json_encode($categories) ?>;
    var rencanaData = <?= json_encode($rencanaData) ?>;
    var realisasiData = <?= json_encode($realisasiData) ?>;

    Highcharts.chart('bulanan-bar', {
    chart: {
        type: 'line',
        fontSize: 8,
        height: 420
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'Distribusi & Realisasi Anggaran Per Bulan',
        style: {
            fontSize: '14px',
            fontWeight: 'bold'
        }
    },
    xAxis: {
        categories: categories,
        labels: {
            rotation: -45,
            style: {
                fontSize: '10px'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Persentase ( % )'
        }
    },
    tooltip: {
        formatter: function() {
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });

            var rencanaValue = formatter.format(rencanaData[this.point.index]);
            var realisasiValue = formatter.format(realisasiData[this.point.index]);

            var s = '<b>' + this.x + '</b><br>';
            s += 'Rencana: <b>' + rencanaValue + '</b><br>';
            s += 'Realisasi: <b>' + realisasiValue + '</b>';

            return s;
        },
        shared: true
    },
    plotOptions: {
        line: {
            marker: {
                enabled: false
            }
        }
    },
    series: [{
        name: 'Rencana',
        data: rencanaData,
        color: '#E9C780'
    }, {
        name: 'Realisasi',
        data: realisasiData,
        color: '#68A7DA'
    }]
});

//BAR JENIS ------------------

Highcharts.chart('jenis-bar', {
    chart: {
        type: 'bar',
        fontSize: 8,
        height: 420
    },
    column: {
        opacity: 0.5
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'Distribusi Jenis Program',
        style: {
            fontSize: '14px',
            fontWeight: 'bold'
        }
    },
    xAxis: {
        categories: <?php echo json_encode(array_column($jenisValues, 'nama')); ?> // Gunakan data jenis dari model
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        },
        allowDecimals: false
    },
    legend: {
        reversed: true
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'Jumlah',
        data: <?php echo json_encode(array_column($jenisValues, 'jumlah')); ?>, 
        color : '#62C59F' // Gunakan data jumlah dari model
    }]
});

// BAR CHART JENIS KONTRAK --------------------------------------------

Highcharts.chart('status-bar', {
    chart: {
        type: 'column',
        fontSize: 8,
        height: 420
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'Distribusi Status Program',
        style: {
            fontSize: '14px',
            fontWeight: 'bold'
        }
    },
    xAxis: {
        categories: <?php echo json_encode(array_column($statusValues, 'status')); ?> // Gunakan data jenis dari model
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        },
        allowDecimals: false
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'Jumlah',
        data: <?php echo json_encode(array_column($statusValues, 'jumlah')); ?>, // Gunakan data jumlah dari model
        color: '#F18170'
    }]
});

// BAR CHART STATUS --------------------------------------------

Highcharts.chart('jeniskontrak-bar', {
    chart: {
        type: 'column',
        fontSize: 8,
        height: 420
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'Distribusi Jenis Kontrak Program',
        style: {
            fontSize: '14px',
            fontWeight: 'bold'
        }
    },
    xAxis: {
        categories: <?php echo json_encode(array_column($jeniskontrakValues, 'nama')); ?> // Gunakan data jenis dari model
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        },
        allowDecimals: false
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'Jumlah',
        data: <?php echo json_encode(array_column($jeniskontrakValues, 'jumlah')); ?>, // Gunakan data jumlah dari model
        color: '#62C59F'
    }]
});

</script>
<script>
    function redirectToPage(page) {
        window.location.href = page;
    }
</script>

<?= $this->endSection(); ?>