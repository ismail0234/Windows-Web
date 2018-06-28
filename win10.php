<?php 

    $desktops = [
    
        "Chrome" => [
            "top"  => 0,
            "left" => 0,
            "image"  => "https://image.noelshack.com/fichiers/2018/22/1/1527510180-chrome-5122.png"
        ],

        "Visual Code" => [
            "top"  => 95,
            "left" => 0,
            "image"  => "https://image.noelshack.com/fichiers/2018/22/1/1527510180-visual-studio-code-0-10-1-icon2.png"
        ],
        "File Explorer" => [
            "top"  => 190,
            "left" => 0,
            "image"  => "https://image.noelshack.com/fichiers/2018/18/6/1525513595-screenshot-5.png"
        ],
        "Trash" => [
            "top"  => 285,
            "left" => 0,
            "image"  => "https://image.noelshack.com/fichiers/2018/18/6/1525514340-screenshot-6.png"
        ]


    ];
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" >
  <meta charset="utf-8">
</head>
<body>


<!-- Taskbar -->
<div class="taskbar">
    <div class="icons">
        <div class="icons-left">
            <a href="#start-menu-modal" id="start-menu"><i class="fab fa-windows"></i></a>
            <a href="#search" id="search"></a>
            <a href="#tabs" id="tabs-windows"></a>
            <a href="#" class="px"></a>
            <a href="#folder" id="folder" class="border"></a>
            <a href="#chrome-pop-up" id="chrome" class="border"></a>
        </div>
        <div class="icons-right">
                <a href="#up" id="up" class="small-icons"><i class="fas fa-chevron-up"></i></a>
                <a href="#sound-modal" id="sound" class="small-icons"></a>
                <a href="#wifi-modal" id="wifi" class="small-icons"></a>
                <div class="datetime">
                    <span class="hour">23:58</span>
                    <span class="date">03/05/2018</span>
                </div>
                <a href="#notifications" id="notifications"><i class="far fa-bell"></i></a>
                <a href="#" class="clear disabled"></a>
                <a href="#" id="return"></a>
        </div>
    </div>
</div>

<!-- Desktop -->
<div class="desktop">

    <!-- Icons on the desktop -->
    <div class="icons-dekstop">

        <?php 
        
            foreach( $desktops as $key => $desktop )
            {

                echo '<div class="icon-desktop icon-desktop-orta" style="top:'.$desktop["top"].'px;left:'.$desktop["left"].'px">';
                echo '<a href="#"><img src="'.$desktop["image"].'" alt=""><span>'.$key.'</span></a>';
                echo '</div>';

            }

        ?>
    </div>

    <!-- Speakers -->
    <div id="sound-modal">
        <div class="sound-text">
            <span>BOT Benson Volume</span>
        </div>
        <div class="sound-progress">
            <i class="fas fa-volume-up"></i>
            <span class="data-value">50%</span>   
            <input type="range" class="custom-range" id="speakerRange"> 
        </div>
    </div>

    <!-- Wifi -->
    <div id="wifi-modal">
        <!-- Bu windows kopyası orjinal değil. -->
            <div class="list-networks">
                <div class="networks">
                    <div class="icons-wifi">
                    <i class="fas fa-wifi"></i>
                    </div>
                    <div class="text-wifi">
                        <span class="name-wifi">BOT Benson Wifi</span>
                        <span class="type-wifi">Connected, no password</span>
                        <span class="propriety">Quality 80%</span>
                        <button>Disconnect</button>
                    </div>
                </div>
                <!--<div class="networks">
                    <div class="icons-wifi">
                            <i class="fas fa-wifi"></i>
                        </div>
                    <span class="name-wifi">Wifi</span>
                    <span class="type-wifi">Open</span>
                </div>
                <div class="networks">
                        <div class="icons-wifi">
                            <i class="fas fa-wifi"></i>
                        </div>
                    <span class="name-wifi">Wifi</span>
                    <span class="type-wifi">Open</span>
                </div>-->
                <div class="options-wifi">
                    <!--<div class="options-wifi-text">
                        <span>Options internet & security</span>
                        <span>Modify options, for a better connection</span>
                    </div>-->
                    <div class="options-bloc">
                        <div class="bloc-options">
                            <i class="fas fa-wifi"></i>
                            <span>Wifi</span>
                        </div>
                        <div class="bloc-options">
                            <i class="fas fa-plane"></i>
                            <span>Plane mode</span>
                        </div>
                        <div class="bloc-options">
                            <i class="fab fa-bluetooth-b"></i>
                            <span>Bluetooth</span>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<!-- Chrome -->
<div class="chrome" id="chrome-pop-up">
    <div class="pop-up">
        
        <!-- Top -->
        <div class="chrome-top">
            <div class="chrome-tabs">
                <div class="triangle"></div>
                <div class="tabs">
                    <span class="icons-tabs">
                        <i class="fab fa-codepen"></i>
                    </span>
                    <span class="text-tabs">CodePen</span>
                    <span class="close-tabs">x</span>
                </div>
                <div class="triangle-2"></div>
                <div class="new-tabs"></div>
            </div>
            <div class="chrome-close">
                <a href="#"><i class="fas fa-minus"></i></a>
                <a href="#"><i class="far fa-window-restore"></i></a>
                <a href="#"><i class="fas fa-times"></i></a>
            </div>
        </div>
        <!-- Bottom -->
        <div class="chrome-bottom">
            <div class="options-bar">
                <div class="icons-bar">
                    <div class="arrows">
                        <a href="#"><i class="fas fa-arrow-left"></i></a>
                        <a href="#"><i class="fas fa-arrow-right"></i></a>
                        <a href="#"><i class="fas fa-sync"></i></a>
                    </div>
                    <div class="search-bar">
                        <span class="info"><i class="fas fa-lock"></i> Securised</span>
                        <input type="text" value="http://codepen.io/Guklam">
                        <span class="star"><i class="far fa-star"></i></span>
                    </div>
                    <div class="points-bar">
                        <div class="points">
                            <span>•</span>
                            <span>•</span>
                            <span>•</span>
                        </div>
                    </div>
                </div>
                <div class="bookmarks">
                    <div class="folder-book">
                        <a target="_blank" href="https://purecss.io/"><span>P</span> Pure</a>
                    </div>
                    <div class="folder-book">
                        <a target="_blank" href="https://developer.mozilla.org/fr/docs/Web/CSS"><i class="fab fa-css3-alt"></i> CSS</a>
                    </div>
                    <div class="folder-book">
                        <a target="_blank" href="https://www.microsoft.com/fr-fr/windows"><i class="fab fa-windows"></i> Windows 10</a>
                    </div>
                </div>
            </div>
            <!-- Bookmarks -->
            
        </div>
        <iframe src="http://codepen.io/Guklam" frameborder="0" width="895px" height="404px"></iframe>
    </div> 
</div>

<!-- Start menu -->
<div id="start-menu-modal">
    <div id="user">
        <a class="push" href="#"><i class="fas fa-bars"></i></a>
        <a href="#"><i class="fas fa-user"></i></a>
        <a href="#"><i class="fas fa-cog"></i></a>
        <a href="#"><i class="fas fa-power-off"></i></a>
    </div>
    <div id="apps">
        <a class="category" href="#">&</a>
        <a href="#"><img src="https://image.noelshack.com/fichiers/2018/22/1/1527510180-logo-microsoft-access-20132.png" alt="access"> <span>Access</span></a>
        <a href="#"><img src="http://assets.nnm-club.ws/forum/image.php?link=http://s019.radikal.ru/i622/1709/cc/334931ae4fe7.png" alt="sublime"> <span>Sublime text 3</span></a>
    </div>
    <div id="others">
        <div class="title-others">
            Office 365
        </div>
        <div class="box-others">
            <div class="box">
                <img src="https://image.noelshack.com/fichiers/2018/22/1/1527527145-logo-microsoft-word-20132.png" alt="">
                <span>Word</span>
            </div>
            <div class="box">
                <img src="https://image.noelshack.com/fichiers/2018/22/1/1527527145-logo-microsoft-excel-20132.png" alt="">
                <span>Excel</span>
            </div>
            <div class="box">
                <img src="https://image.noelshack.com/fichiers/2018/22/1/1527527145-logo-microsoft-powerpoint-2013.png" alt="">
                <span>Powerpoint</span>
            </div>
            <div class="box">
                <img src="https://image.noelshack.com/fichiers/2018/22/1/1527527145-logo-microsoft-outlook-2013.png" alt="">
                <span>Outlook</span>
            </div>
            <div class="box">
                <img src="https://image.noelshack.com/fichiers/2018/22/1/1527527458-publisher-by-navdbest-d6186xo-600x6002.png" alt="">
                <span>Publisher</span>
            </div>
            <div class="box">
                <img src="https://image.noelshack.com/fichiers/2018/22/1/1527527243-logo-microsoft-onenote-20132.png" alt="">
                <span>OneNote</span>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="context-right-click-menu d-none">
        
        <div class="col-md-12 ">

            <a href="">
                <div class="context-row">
                    <div class="context-icon float-left"><i class="fas fa-sync-alt"></i></div> 
                    <div class="context-text float-left">Refresh</div>
                    <div class="clearfix"></div>
                </div>
            </a>
            
        </div>
        
        <div class="col-md-12"><div class="context-row"><hr></div></div>

        <div class="col-md-12">

            <a href="">
                <div class="context-row">
                    <div class="context-icon float-left"><i class="fas fa-folder"></i></div> 
                    <div class="context-text float-left">Create Folder</div>
                </div>
                <div class="clearfix"></div>
            </a>

        </div>
        
        <div class="col-md-12">

            <a href="">
                <div class="context-row">
                    <div class="context-icon float-left"><i class="fas fa-file-alt"></i></div> 
                    <div class="context-text float-left">Create Text Document</div>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>
        
        <div class="col-md-12"><div class="context-row"><hr></div></div>

        <div class="col-md-12">
            
            <a href="">
                <div class="context-row">
                    <div class="context-icon float-left"><i class="fas fa-users"></i></div> 
                    <div class="context-text float-left">Sign Up</div>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>

        <div class="col-md-12">
            
            <a href="">
                <div class="context-row">
                    <div class="context-icon float-left"><i class="fas fa-sign-in-alt"></i></div> 
                    <div class="context-text float-left">Sign In</div>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>        

        <div class="col-md-12"><div class="context-row"><hr></div></div>

        <div class="col-md-12">
            
            <a href="">
                <div class="context-row">
                    <div class="context-icon float-left"><i class="fas fa-desktop"></i></div> 
                    <div class="context-text float-left">System Settings</div>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>

    </div>

</div>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/win10.js"></script>
<script type="text/javascript">
  
$(document).ready(function(){

    botBensonWindowsWeb.timeStart();
    botBensonWindowsWeb.changContextMenuStart();
    botBensonWindowsWeb.volumeStart();

});

</script>

</html>

