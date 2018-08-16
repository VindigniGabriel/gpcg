<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="Gabriel Medina" content="">

  <title>Web</title>

  <link href="../Include/css/bootstrap.min.css" rel="stylesheet">

  <link href="../Include/css/web.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
  <link rel="stylesheet" href="../Include/alertifyjs/css/alertify.css">
  <link rel="stylesheet" href="../Include/alertifyjs/css/themes/bootstrap.css">
  <link rel="stylesheet" href="../Include/css/mdb.css">
  <style type="text/css">
  footer {
    background-color: #f5f5f5;
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 40px;
    color: white;
  }
  .progress-bar-vertical {
    width: 30px;
    min-height: 100px;
    display: flex;
    align-items: flex-end;
    margin-right: 20px;
    float: left;
  }

  .progress-bar-vertical .progress-bar {
    width: 100%;
    height: 0;
    -webkit-transition: height 0.6s ease;
    -o-transition: height 0.6s ease;
    transition: height 0.6s ease;
  }
  .progress{
    height: 10px;
    border: 1px solid #e0e0e0;
    background: transparent;
    box-shadow: none;
    overflow: visible;
    margin-bottom: 30px;
  }
  .progress .progress-bar{
    position: relative;
    -webkit-animation: animate-positive 4s;
    animation: animate-positive 4s;
  }
  .progress .progress-bar:after{
    content: "";
    width: 1px;
    height: 20px;
    position: absolute;
    top: -6px;
  }
  .progress .progress-value{
    font-size: 11px;
    font-weight: bold;
    color: #97a5b6;
    position: absolute;
    bottom: -25px;
  }

  @-webkit-keyframes animate-positive{
    0% { height: 0%; }
  }
  @keyframes animate-positive{
    0% { height: 0%; }
  }

  .btn{
    position: relative;
    color:#fff;
    border-radius:30px;
    text-transform: uppercase;
    transform: scale(1.1,1.1);
    transition:all 0.3s ease-out 0s;
  }
  .btn:hover{
    transform: scale(1,1);
    color:#fff;
  }
  .btn i{
    margin-right:15px;
    color:#fff;
  }
  .btn:before {
    content: "";
    position: absolute;
    bottom: -8px;
    left:0px;
    width:100%;
    height: 10px;
    filter: blur(20px);
    border-radius: 30px;
    display: inline-block;
    z-index: -1;
    transition: all 0.3s ease-out 0s;
  }
  .btn:hover:before{
    bottom:0;
    filter: blur(10px);
  }
  .btn.blue{
    background: linear-gradient(to left, #7474bf , #348ac7);
  }
  .btn.blue:before{
    background: linear-gradient(to right,#7474bf,#348ac7);
  }
  .btn.green{
    background: linear-gradient(to left, #414d0b , #727a17);
  }
  .btn.green:before{
    background: linear-gradient(to right,#414d0b,#727a17);
  }
  .btn.orange{
    background: linear-gradient(to left, #fe8c00 , #f83600);
  }
  .btn.orange:before{
    background: linear-gradient(to right,#fe8c00,#f83600);
  }
  .btn.purple{
    background: linear-gradient(to left, #c04848 , #480048);
  }
  .btn.purple:before{
    background: linear-gradient(to right,#c04848,#480048);
  }
  @media only screen and (max-width: 767px){
    .btn{
      margin-bottom:15px;
    }
  }
  .switch input { 
    display:none;
  }
  .switch {
    display:inline-block;
    width:60px;
    height:30px;
    margin:8px;
    transform:translateY(50%);
    position:relative;
  }

  .slider {
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    right:0;
    border-radius:30px;
    box-shadow:0 0 0 2px #777, 0 0 4px #777;
    cursor:pointer;
    border:4px solid transparent;
    overflow:hidden;
    transition:.4s;
  }
  .slider:before {
    position:absolute;
    content:"";
    width:100%;
    height:100%;
    background:#777;
    border-radius:30px;
    transform:translateX(-30px);
    transition:.4s;
  }

  input:checked + .slider:before {
    transform:translateX(30px);
    background:#00695c;
  }
  input:checked + .slider {
    box-shadow:0 0 0 2px #00695c,0 0 2px #00695c;
  }

</style>
</head>

<body>
  <nav class="navbar navbar-dark fixed-top deep-orange lighten-1 flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0">
      <div class="row">
        <div class="col-8 text-center">GPCG</div>
        <div class="col-4 d-sm-none text-right" id="opcMenuM"></div>
      </div>
    </a>

    <ul class="navbar-nav px-3 d-none d-sm-inline">
      <li class="nav-item text-nowrap" id="opcMenuD">
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block deep-orange lighten-1 sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="../Views">
                <span data-feather="home" class="text-white"></span>
                Inicio
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#!" onclick="crear('personal',0)">
                <span data-feather="users" class="text-white"></span>
                Personal OCM/ROL
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#!" onclick="crear('esquema',0)">
                <span data-feather="bar-chart-2" class="text-white"></span>
                Esquema RxP
              </a>
            </li>
            <li>
              <span>Ajustes Global</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#!" onclick="crear('individual',0)">
                <span data-feather="trending-up" class="text-white"></span>
                Ind. Individual
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#!" onclick="crear('colectivo',0)">
                <span data-feather="trending-up" class="text-white"></span>
                Ind. Colectivo
              </a>
            </li>
          </ul>
          <ul class="nav flex-column mb-2" id="opcionemp">
            <li class="nav-item">
              <a class="nav-link" href="#!" onclick="crear('habilitarEmpresarial',1)">
                <span data-feather="trending-up" class="text-white"></span>
                Ind. Empresarial
              </a>
              <div class="mx-3 emp" style="display: none">
                <select class="custom-select" name="selectEmp" id="selectEmp" onclick="crear('establecerEmpresarial',1)" >
                  <option value="10" >Meta Máxima (10%)</option>
                  <option value="9" >Meta Media (9%)</option>
                  <option value="7" >Meta Mínima (7%)</option>
                  <option value="0" >Sin Logro (0%)</option>
                </select>
              </div>
            </li>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span></span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span ></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="out.php">
                <span data-feather="power" class="text-white"></span>
                Salir
              </a>
            </li>
          </ul>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" id="buscador">
                <input class="form-control my-0 py-1 grey-border" type="text" placeholder="Buscar OCM" aria-label="Search" id="buscarocm" onkeyup="buscarocm()">
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2" id="menutitulo"></h1><span id="idoficina" class="d-none"></span>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <h4 class="h4 text-right d-none" id="tpaoficina"></h4>
              <h4 class="h4 text-right" id="tpatitulo"></h4>
            </div>
          </div>
        </div>

        <div id="contenedor" class="mb-5"></div>

      </main>
    </div>
  </div>

  <div class="d-md-none"><footer>
    <div class="row">
      <div class="col"></div>
    </div>
  </footer></div>


  <script type="text/javascript" src="../Include/js/jquery-3.3.1.min.js"></script>
  <script src="../Include/alertifyjs/alertify.js"></script>

  <script type="text/javascript" src="../Include/js/clases.js"></script>
  <script type="text/javascript" src="../Include/js/funciones.js"></script>
  <script type="text/javascript" src="../Include/js/mdb.js"></script>

  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <script src="../Include/js/bootstrap-select.js" type="text/javascript"></script>

</body>
</html>