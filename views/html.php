<!DOCTYPE html>
<html>
<?php include 'head.php';?>

<body style="background-image: url('./mine/bg1.png');background-size: 100%">
    <div class="container">
        <div class="row align-items-center" style="height: 100vh ">
            <div class="col  ">
                <div class="card rounded shadow wow animate__bounceIn " data-wow-duration="2s" data-wow-delay=".1s" style="background: rgb(240, 241, 245)">
                    <?php include 'nav.php';?>
                    <div class="row  overflow-auto">
                        <div class="col-12 appx">
                            <div class="card-body ">
                                <?php if ($data['link'] != 'Login'): ?>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <?php if (isset($data['induk'])): ?>
                                        <li class="breadcrumb-item"><a href="#">
                                                <?php echo $data['induk']; ?></a></li>
                                        <?php endif;?>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <?php echo $data['judul']; ?>
                                        </li>
                                        <?php if ($data['link'] == 'Pohon' || $data['link'] == 'Kinerja'): ?>
                                        <li class="ml-auto">
                                            <div class="d-flex ">
                                                <span class="mx-2">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">Partisi Data Training</span>
                                                        </div>
                                                        <input type="number" value="<?php echo $data['partisi']->partisi; ?>" max="100" min="1" v-model="ps" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">%</span>
                                                        </div>
                                                    </div>
                                                </span>
                                                <span class="mx-2" v-if="ps">
                                                    <a :href="'?hal=Proses&partisi='+barubah" class="btn btn-sm btn-primary">Proses Training</a>
                                                </span>
                                            </div>
                                        </li>
                                        <?php endif;?>
                                    </ol>
                                </nav>
                                <?php endif;?>
                                <?php include $data['path'] . '.php';?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">Copyright © 2020 .
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'js.php';?>
    <script type='text/javascript'>
    $(document).ready(function() {

        <?php if ($data['link'] == 'Pohon' || $data['link'] == 'Kinerja'): ?>
        app.ps = <?php echo $data['partisi']->partisi; ?>;
        <?php endif;?>


        //app.getall();




    });
    </script>
    <script type='text/javascript'>
    var app = new Vue({
        el: '.appx',
        data: {
            kd: null,
            ps: 0,

        },
        computed: {
            // a computed getter
            barubah: function() {
                if (app.ps > 100) {
                    alert('batasan untuk partisi adalah 100%');
                    app.ps = 0;

                }
                return app.ps

            }
        },
        mounted: function() {
            <?php if ($data['link'] == 'Kinerja'): ?>
var ctx = document.getElementById('myChart').getContext('2d');;
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ["Accuracy","Precision","Recall","F-measure"],
        datasets: [{
            label: 'Kinerja ID3',
            backgroundColor: '#5768f3',
            borderColor: '#5768f3',

            data: [<?php echo "$Accuracy,$Precision,$Recall,$Fmeasure"; ?>]
        }]
    },

    // Configuration options go here
    options: {
        scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true,
                 ticks: {
                    // Include a dollar sign in the ticks
                    callback: function(value, index, values) {
                        return   value+"%";
                    }}
            }]
        }
    }
});

<?php endif;?>
        }


    });
    </script>
</body>

</html>
