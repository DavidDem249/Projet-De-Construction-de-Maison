<?php 
    
    require('../config.php');

    $req = $db->prepare("SELECT * FROM users");
    $req->execute();
    $requ = $req->fetchAll();

    $data = $db->prepare("SELECT * FROM demande,service,users WHERE users.id_user = demande.id_user AND service.id_serv = demande.id_serv ");
    $data->execute();
    $datas = $data->fetchAll();

?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panneau d'administration</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="img/daouda.jpg" width="150" />
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <!-- <span class="block m-t-xs font-bold">Sédrick Kouagni</span> -->
                            <span class="text-muted text-xs block">Administrateur <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Messagerie</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="login.html">Déconnection</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        TP
                    </div>
                </li>
                <li class="active">
                    <a href="dashboard.php"><i class="fa fa-th-large"></i> <span class="nav-label">Tableau de bord</span>
                </li>
                
                <li>
                    <a href="../acceuil.php"><i class="fa fa-magic"></i> <span class="nav-label">Acceuil</span></a>
                </li>
                <li class="landing_link">
                    <a target="_blank" href="../login.php"><i class="fa fa-star"></i> <span class="nav-label">Login</span></a>
                </li>
                <li class="special_link">
                    <a href="../acceuil.php"><i class="fa fa-database"></i> <span class="nav-label">Acceuil</span></a>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
            <ul class="nav navbar-top-links navbar-left">
                <li>
                    <h2><span  style="color:blue; class="m-r-sm text-muted welcome-message">Bienvenu sur la plateforme d'administration. Vous avez tous le droit.</span></h2>
                </li>
            </ul> 
        <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-7">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Les Demandes effectuées pour les offres déjà postés</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-hover margin bottom">
                                    <thead>
                                    <tr>
                                        <th style="width: 1%"><span class="label label-info">Nom</span></th>
                                        <th><span class="label label-info">Prénom</span></th>
                                        <th><span class="label label-info">Email</span></th>
                                        <th><span class="label label-info">Numero</span></th>
                                        <th><span class="label label-info">Type construction</span></th>
                                        <th><span class="label label-info">Fonction</span></th>
                                    </tr>
                                    </thead>
                                    <?php foreach($datas as $resultat) { ?>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $resultat['nom'] ?></td>
                                            <td><?php echo $resultat['prenom'] ?></td>
                                                
                                            <td><?php echo $resultat['email'] ?></td>
                                            <td><?php echo $resultat['numero'] ?></span></td>
                                            <td><?php echo $resultat['nom_serv'] ?></td>
                                            <td><?php echo $resultat['fonction'] ?></td>

                                        </tr>
                                        
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="col-lg-5">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Les expériences des utilisateurs</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-hover margin bottom">
                                    <thead>
                                    <tr>
                                        <th style="width: 1%"><span class="label label-info">Expérience</span></th>
                                        
                                    </tr>
                                    </thead>
                                    <?php foreach($datas as $resultat) { ?>
                                    <tbody>
                                    <tr>

                                        <td><?php echo $resultat['experience'] ?></td>
                                        
                                    </tr>
                                    
                                    </tbody>
                                    <?php }?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <!-- <div class="col-lg-2">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Messages</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div> -->
                        <!-- <div class="ibox-content ibox-heading">
                            <h3><i class="fa fa-envelope-o"></i> Nouveaux méssages</h3>
                            <small><i class="fa fa-tim"></i> Vous avez 16 nouveaux messages</small>
                        </div>
                        <div class="ibox-content">
                            <div class="feed-activity-list"> -->

                                <!-- <div class="feed-element">
                                    <div>
                                        <small class="float-right text-navy">il y 2 jours</small>
                                        <strong>Daouda DEMBELE</strong>
                                        <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</div>
                                        <small class="text-muted"> 16H30  - 18.3.2019</small>
                                    </div>
                                </div>-->
                                
                       <!--      </div>
                        </div> -->
                 <!--    </div>
                </div> -->

                <div class="col-lg-12">

                    <?php  

                        $req_serv = $db->prepare("SELECT * FROM service");
                        $req_serv->execute();
                        $req_serve = $req_serv->fetchAll();

                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Liste de services déjà postés</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content table-responsive">
                                    <table class="table table-hover no-margins">
                                        <thead>
                                        <tr>
                                            <th><span class="label label-primary">Objet service</span></th>
                                            <th><span class="label label-primary">Description</span></th>
                                            <th><span class="label label-primary">Lieu</span></th>
                                            <th><span class="label label-primary">Date début</span></th>
                                            <th><span class="label label-primary">Date fin</span></th>
                                            <th><span class="label label-primary">Action</span></th>
                                        </tr>
                                        </thead>
                                        <?php foreach($req_serve as $resul){ ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $resul['nom_serv'] ?></td>
                                                    <td><?php echo $resul['description'] ?></td>
                                                    <td><?php echo $resul['lieu'] ?></td>
                                                    <td><?php echo $resul['date_fin'] ?></td>
                                                    <td><?php echo $resul['date_deb'] ?></td>
                                                    <td><a href="#"><span class="text-danger">Archivé </span></a></td>
                                                </tr>
                                            
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Les comptes d'utilisateur déjà confirmés</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-hover margin bottom">
                                                <thead>
                                                <tr>
                                                    <th style="width: 1%"><span class="label label-primary">Nom</span></th>
                                                    <th><span class="label label-primary">Prénom</span></th>
                                                    <th ><span class="label label-primary">Numero</span></th>
                                                    <th ><span class="label label-primary">Localité</span></th>
                                                    <th><span class="label label-primary">Fonction</span></th>
                                                    <th><span class="label label-primary">Action</span></th>
                                                </tr>
                                                </thead>
                                                <?php foreach($requ as $resu) { ?>
                                                    <tbody>
                                                    <tr>
                                                        <td><?php echo $resu['nom'] ?></td>
                                                        <td><?php echo $resu['prenom'] ?></td>                                                        
                                                        <td><?php echo $resu['numero'] ?></td>
                                                        <td><?php echo $resu['localite'] ?></td>
                                                        <td><?php echo $resu['fonction'] ?></td>
                                                        <td><a href="suppr.php?id=<?php echo $resu['id_user'] ?>"><span class="text-danger">Supprimer</span></a></td>
                                                    </tr>
                                                    
                                                    </tbody>
                                                <?php }?>
                                            </table>
                                        </div>
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer">
            <div>
                <strong>Copyright</strong> Construction &copy; 2014-2018
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <!-- <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

     Flot --> 
    <!-- <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.js"></script>
 -->
    <!-- Peity -->
   <!--  <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script> -->

    <!-- Custom and plugin javascript -->
    <!-- <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script> -->

    <!-- jQuery UI -->
<!--     <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>
 -->
    <!-- Jvectormap -->
   <!--  <script src="js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
 -->
    <!-- EayPIE -->
<!--     <script src="js/plugins/easypiechart/jquery.easypiechart.js"></script>
 -->
    <!-- Sparkline -->
    <!-- <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script> -->

    <!-- Sparkline demo data  -->
    <!-- <script src="js/demo/sparkline-demo.js"></script> -->

    <!-- <script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Number of orders",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script> -->
</body>
</html>
