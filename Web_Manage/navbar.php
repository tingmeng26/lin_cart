        <!-- BEGIN Theme Setting -->
        <!-- <div id="theme-setting">
            <a href="#"><i class="icon-gears icon-2x"></i></a>
            <ul>
                <li>
                    <span>Skin</span>
                    <ul class="colors" data-target="body" data-prefix="skin-">
                        <li class="active"><a class="blue" href="#"></a></li>
                        <li><a class="red" href="#"></a></li>
                        <li><a class="green" href="#"></a></li>
                        <li><a class="orange" href="#"></a></li>
                        <li><a class="yellow" href="#"></a></li>
                        <li><a class="pink" href="#"></a></li>
                        <li><a class="magenta" href="#"></a></li>
                        <li><a class="gray" href="#"></a></li>
                        <li><a class="black" href="#"></a></li>
                    </ul>
                </li>
                <li>
                    <span>Navbar</span>
                    <ul class="colors" data-target="#navbar" data-prefix="navbar-">
                        <li class="active"><a class="blue" href="#"></a></li>
                        <li><a class="red" href="#"></a></li>
                        <li><a class="green" href="#"></a></li>
                        <li><a class="orange" href="#"></a></li>
                        <li><a class="yellow" href="#"></a></li>
                        <li><a class="pink" href="#"></a></li>
                        <li><a class="magenta" href="#"></a></li>
                        <li><a class="gray" href="#"></a></li>
                        <li><a class="black" href="#"></a></li>
                    </ul>
                </li>
                <li>
                    <span>Sidebar</span>
                    <ul class="colors" data-target="#main-container" data-prefix="sidebar-">
                        <li class="active"><a class="blue" href="#"></a></li>
                        <li><a class="red" href="#"></a></li>
                        <li><a class="green" href="#"></a></li>
                        <li><a class="orange" href="#"></a></li>
                        <li><a class="yellow" href="#"></a></li>
                        <li><a class="pink" href="#"></a></li>
                        <li><a class="magenta" href="#"></a></li>
                        <li><a class="gray" href="#"></a></li>
                        <li><a class="black" href="#"></a></li>
                    </ul>
                </li>
                <li>
                    <span></span>
                    <a data-target="navbar" href="#"><i class="icon-check-empty"></i> Fixed Navbar</a>
                    <a class="pull-right hidden-xs" data-target="sidebar" href="#"><i class="icon-check-empty"></i> Fixed Sidebar</a>
                </li>
            </ul>
        </div> -->
        <!-- END Theme Setting -->
        <!-- BEGIN Navbar -->

        <div id="navbar" class="navbar">

            <button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
                <span class="icon-reorder"></span>
            </button>
            <a class="navbar-brand" href="#">

                <img src="../images/logo_header.png" style="margin-top:-5px" />
                <?php echo $webname . $webmanagename ?><?php //coderLang::t("manage_title"); //後台管理系統-Neptunus
                                                        ?>

            </a>

            <!-- BEGIN Navbar Buttons -->
            <ul class="nav flaty-nav pull-right">
                <?php //if($adminuser['isadmin']=='0'){ 
                ?>
                <!-- BEGIN Button Tasks -->
                <!--<li class="user-profile">
                    <a href="#" id="my_navbar" style="cursor: default;">
                        <?php
                        /*                            echo coderLang::t("admin8",1)."：".class_qcontrol_company::getName_mselect($adminuser['company_login'])." &nbsp; ".coderLang::t("admin9",1)."：".class_qcontrol_factory::getName_mselect($adminuser['factory_login'])." &nbsp; ".coderLang::t("admin10",1)."：".class_qcontrol_work::getName_mselect(1,$adminuser['work_login'])." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
                            //公司[admin8] 廠別[admin9] 工作中心[admin10]
                        */ ?>
                    </a>
                </li>-->
                <!-- END Button Tasks -->
                <?php //}
                ?>

                <!-- BEGIN Button User -->
                <li class="user-profile">
                    <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
                        <?php
                        if ($adminuser['pic'] != '') {
                        ?>
                            <img class="nav-user-photo" src="<?php echo $adminuser['pic'] ?>" alt="Penny's Photo" />
                        <?php
                        }
                        ?>
                        <span id="user_info" class="user_info">
                            <?php echo $adminuser['name'] ?>
                        </span>
                        <i class="icon-caret-down"></i>
                    </a>

                    <!-- BEGIN User Dropdown -->
                    <ul class="dropdown-menu dropdown-navbar" id="user_menu">
                        <li class="nav-header">
                            <i class="icon-time"></i>
                            <?php coderLang::t("navbar1"); //登入時間[navbar1] 
                            ?> <?php echo $adminuser['time'] ?>
                        </li>


                        <li>
                            <a href="javascript:void(0)" onclick="openBox('../admin/manage.php?username=<?php echo $adminuser['username'] ?>')">
                                <i class="icon-user"></i>
                                <?php coderLang::t("navbar2"); //修改個人資料[navbar2] 
                                ?>
                            </a>
                        </li>
                        <?php
                        foreach ($m_lang_data as $_lang_key => $_lang_val) {
                        ?>
                            <li <?php echo ($_lang_key === $user_lang) ? 'class="active"' : ''; ?>>
                                <a href="javascript:void(0)" lang="<?php echo $_lang_key; ?>" class="lang">
                                    <i class="icon-globe"></i>
                                    <?php echo $_lang_val; ?>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="divider"></li>

                        <li>
                            <a href="../loginout.php">
                                <i class="icon-off"></i>
                                <?php coderLang::t("navbar3"); //登出[navbar3] 
                                ?>
                            </a>
                        </li>
                    </ul>
                    <!-- BEGIN User Dropdown -->
                </li>
                <!-- END Button User -->
            </ul>
            <!-- END Navbar Buttons -->
        </div>
        <!-- END Navbar -->