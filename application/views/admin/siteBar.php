<div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo">
        <a href="http://www.creative-tim.com/" class="simple-text logo-mini">
             
        </a>

        <a href="<?=  base_url();?>" class="simple-text logo-normal">
              Jio ProCase
        </a>
    </div>

    <div class="sidebar-wrapper">
        
        <div class="user">
            <div class="photo">
                <img src="<?=base_url('assets/img/default-user.png');?>" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                      Admin
                      <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> MP </span>
                              <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=  base_url('admin/login/logout'); ?>">
                              <span class="sidebar-mini"> LG </span>
                              <span class="sidebar-normal"> Logout </span>
                            </a>
                        </li>
<!--                        <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> S </span>
                              <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">

            <li class="nav-item <?= ($this->uri->segment(2) == 'Home') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?=base_url('admin/Home');?>">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(2) == 'Users') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?=base_url('admin/Users');?>">
                    <i class="material-icons">person</i>
                    <p> Users </p>
                </a>
            </li>
        </ul>
        

        
    </div>
</div>
