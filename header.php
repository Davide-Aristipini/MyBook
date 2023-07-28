    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="index.php" class="brand-logo">
            <img class="logo-abbr" src="./images/logo.png" alt="">
            <img class="logo-compact" src="./images/logo-text.png" alt="">
            <img class="brand-title" src="./images/logo-text.png" alt="">
        </a>
    </div>
    <style> 
        
    </style>
    <!--**********************************
        Nav header end
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <a href="./index.php">
                            <div class="dashboard_bar">
                                
                                MyBook
                                
                            </div>
                        </a>
                    </div>
                    <?php 
                    if(!isset($_SESSION['nome'])){
                        echo '<a href="./page-login.php"> <button type="button" class="btn btn-rounded btn-primary">Accedi</button> </a>';
                    } else {
                        echo '
                        
                    <ul class="navbar-nav header-right">
                        <li class="nav-item" style="margin-left: -20%;">
								<div class="input-group search-area d-xl-inline-flex d-none" style="display: inline-flex !important;">
									<div class="input-group-append">
										<span class="input-group-text"><a href="javascript:myFunction()"><i class="flaticon-381-search-2"></i></a></span>
									</div>
									<input type="text" class="form-control" placeholder="Cerca un libro..." id="ricerca">
								</div>
							</li>
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                <img src="'.$_SESSION['img'].'" width="20" alt=""/>
                                <div class="header-info">
                                    <span class="text-black"><strong>' . $_SESSION['nome'] . ' ' . $_SESSION['cognome'].'</strong></span>
                                    <p class="fs-12 mb-0">'.$_SESSION['mail'].'</p>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="./app-profile.php" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="ml-2">Profile </span>
                                </a>
                                <a href="./logout.php" class="dropdown-item ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    <span class="ml-2">Logout </span>
                                </a>
                            </div>
                        </li>
                    </ul>';
                    }
                    ?>
                </div>
            </nav>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("ricerca").value;
            window.location.href = "./index.php?ricerca="+x;
        }
    </script>