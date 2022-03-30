<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
}
@import url(https://fonts.googleapis.com/css?family=Titillium+Web:300);
.fa-2x {
font-size: 2em;
}
.fa {
position: relative;
display: table-cell;
width: 60px;
height: 36px;
text-align: center;
vertical-align: middle;
font-size:20px;
}

.main-menu:hover,nav.main-menu.expanded {
width:250px;
overflow:visible;
}

.main-menu {
background:#212121;
border-right:1px solid #e5e5e5;
position:fixed;
top:0;
bottom:0;
height:100%;
left:0;
width:60px;
overflow:hidden;
-webkit-transition:width .05s linear;
transition:width .05s linear;
-webkit-transform:translateZ(0) scale(1,1);
z-index:1000;
}

.mobimen {
background:#212121;

}

.main-menu>ul {
margin:7px 0;
}
.mobimen>ul {
margin:7px 0;
}

.main-menu li {
position:relative;
display:block;
width:250px;
}

.main-menu li>a {
position:relative;
display:table;
border-collapse:collapse;
border-spacing:0;
color:#999;
 font-family: arial;
font-size: 14px;
text-decoration:none;
-webkit-transform:translateZ(0) scale(1,1);
-webkit-transition:all .1s linear;
transition:all .1s linear;

}
.mobimen li>a {
position:relative;
display:table;
border-collapse:collapse;
border-spacing:0;
color:#999;
 font-family: arial;
font-size: 14px;
text-decoration:none;
-webkit-transform:translateZ(0) scale(1,1);
-webkit-transition:all .1s linear;
transition:all .1s linear;

}

.main-menu .nav-icon {
position:relative;
display:table-cell;
width:60px;
height:36px;
text-align:center;
vertical-align:middle;
font-size:18px;
}
.mobimen .nav-icon {
position:relative;
display:table-cell;
width:60px;
height:36px;
text-align:center;
vertical-align:middle;
font-size:18px;
}

.main-menu .nav-text {
position:relative;
display:table-cell;
vertical-align:middle;
width:190px;
  font-family: 'Titillium Web', sans-serif;
}
.mobimen .nav-text {
position:relative;
display:table-cell;
vertical-align:middle;
width:100vw;
  font-family: 'Titillium Web', sans-serif;
}

.main-menu>ul.logout {
position:absolute;
left:0;
bottom:0;
}

.no-touch .scrollable.hover {
overflow-y:hidden;
}

.no-touch .scrollable.hover:hover {
overflow-y:auto;
overflow:visible;
}

a:hover,a:focus {
text-decoration:none;
}

nav {
-webkit-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
-o-user-select:none;
user-select:none;
}

nav ul,nav li {
outline:0;
margin:0;
padding:0;
}
.main-menu li:hover>a,nav.main-menu li.active>a,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus,.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,.dashboard-page nav.dashboard-menu ul li.active a {
color:#fff;
background-color:#5fa2db;
}

.mobimen li:hover>a,nav.main-menu li.active>a,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus,.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,.dashboard-page nav.dashboard-menu ul li.active a {
color:#fff;
background-color:#5fa2db;
}
.area {
float: left;
background: #e2e2e2;
width: 100%;
height: 100%;
}
@font-face {
  font-family: 'Titillium Web';
  font-style: normal;
  font-weight: 300;
  src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
}


@media only screen and (max-width: 900px) {
        .sidenav{
            display: none;
        }
        .mobinav {
                overflow: hidden;
                background-color: #333;
                position: relative;
                }
        .mobinav #mobilist {
            display: none;
            }
            .mobinav a {
                color: white;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 30px;
                display: block;
                    }
            .mobinav a.icon {
                    background: black;
                    position: relative;
                    display: inline-block;
                    vertical-align: middle;
                    }
                    
       
    }
    
    @media only screen and (min-width: 900px) {
        .mobinav{
            display: none;
        }
        
    }


</style>

<div class="mobinav">
    
     <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
    
    <nav class="mobimen">
       
        <div id="mobilist">
    <ul>
                  <li>
                      <a href="dashboard.php">
                          <i class="fa fa-home fa-2x"></i>
                          <span class="nav-text">
                              Dashboard
                          </span>
                      </a>

                  </li>

                  <li class="has-subnav">
                      <a href="reschedule.php">
                         <i class="fa fa-table fa-2x"></i>
                          <span class="nav-text">
                              Reschedule
                          </span>
                      </a>

                  </li>


                  <li>
                     <a href="addpatient.php">
                         <i class="fa fa-plus fa-2x"></i>
                          <span class="nav-text">
                              Add Patient
                          </span>
                      </a>
                  </li>
                  <li>
                     <a href="addfac.php">
                         <i class="fa fa-hospital-o fa-2x"></i>
                          <span class="nav-text">
                              Add Facility
                          </span>
                      </a>
                  </li>
                  <li>
                     <a href="addprov.php">
                         <i class="fa fa-user-md fa-2x"></i>
                          <span class="nav-text">
                              Add Provider
                          </span>
                      </a>
                  </li>
                  <li>
                     <a href="update.php">
                         <i class="fa fa-list fa-2x"></i>
                          <span class="nav-text">
                              Edit Patient
                          </span>
                      </a>
                  </li>
                  <li>
                     <a href="deletepat.php">
                         <i class="fa fa-times-circle fa-2x"></i>
                          <span class="nav-text">
                              Delete Patient
                          </span>
                      </a>
                  </li>
                                  <li>
                                     <a href="logout.php">
                                           <i class="fa fa-power-off fa-2x"></i>
                                          <span class="nav-text">
                                              Logout
                                          </span>
                                      </a>
                                  </li>
                             </ul>
                             </div>
                             </nav>
    
</div>
<div class="sidenav">
  <nav class="main-menu">
              <ul>
                  <li>
                      <a href="dashboard.php">
                          <i class="fa fa-home fa-2x"></i>
                          <span class="nav-text">
                              Dashboard
                          </span>
                      </a>

                  </li>

                  <li class="has-subnav">
                      <a href="reschedule.php">
                         <i class="fa fa-table fa-2x"></i>
                          <span class="nav-text">
                              Reschedule
                          </span>
                      </a>

                  </li>


                  <li>
                     <a href="addpatient.php">
                         <i class="fa fa-plus fa-2x"></i>
                          <span class="nav-text">
                              Add Patient
                          </span>
                      </a>
                  </li>
                  <li>
                     <a href="addfac.php">
                         <i class="fa fa-hospital-o fa-2x"></i>
                          <span class="nav-text">
                              Add Facility
                          </span>
                      </a>
                  </li>
                  <li>
                     <a href="addprov.php">
                         <i class="fa fa-user-md fa-2x"></i>
                          <span class="nav-text">
                              Add Provider
                          </span>
                      </a>
                  </li>
                  <li>
                     <a href="update.php">
                         <i class="fa fa-list fa-2x"></i>
                          <span class="nav-text">
                              Edit Patient
                          </span>
                      </a>
                  </li>
                  <li>
                     <a href="deletepat.php">
                         <i class="fa fa-times-circle fa-2x"></i>
                          <span class="nav-text">
                              Delete Patient
                          </span>
                      </a>
                  </li>
                </ul>
                  <ul class="logout">
                                  <li>
                                     <a href="logout.php">
                                           <i class="fa fa-power-off fa-2x"></i>
                                          <span class="nav-text">
                                              Logout
                                          </span>
                                      </a>
                                  </li>
                              </ul>
          </nav>
</div>
<script>
function myFunction() {
  var x = document.getElementById("mobilist");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
<div class="section section-lg pt-4">
		<div class="container">
