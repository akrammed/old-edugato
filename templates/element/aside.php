<style>
        .sideBariItem{
        margin-left: 4%;
        color:black; 
        font-size:16px; 
        font-style:normal; 
        font-weight:300; 
        line-height:20px; 
        font-family: Poppins;
    }
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme custom-aside-width">
            <div class="app-brand demo">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row" style="margin-left: -8%;">
                            <div class="col-sm-12">
                                <h6 class="cours-title-aside">
                                <?= $this->Html->link(
                   $this->Html->image('logo.png', ['class' => 'img-cover','style'=>'width: 100px;']),
                   '/home-lms',
                  ['escape' => false, 'class' => 'navbar-brand navbar-order d-flex align-items-center justify-content-center mr-0']
                ) ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-inner-shadow"></div>
            <ul class="flex flex-col justify-center items-center">
                <li class="menu-item custom-menu-item active parent-lesson-element ">
                <div class="mb-3">
                    <a href="javascript:void(0);" id="btn" class="  lesson-element-style">
                        <?php echo $this->element('icons/home'); ?>
        
                            <span  class="activities-count sideBariItem"> Home</span>
                        

                    </a>
                </div>
                <div class="mb-3">
                    <a href="javascript:void(0);" class="  lesson-element-style">
                        <?php echo $this->element('icons/direction right'); ?>
                    
                            <span class="activities-count sideBariItem">Learning Path</span>


                    </a>
                </div>
                <div class="mb-3">

                    <a href="javascript:void(0);" class="  lesson-element-style">
                        <?php echo $this->element('icons/graduated'); ?>
                    
                            <span class="activities-count sideBariItem">Courses</span>
        

                    </a>
                </div>
                <div class="mb-3">
                    <a href="javascript:void(0);" class="  lesson-element-style">
                        <?php echo $this->element('icons/profile'); ?>
                    
                            <span class="activities-count sideBariItem">Profile</span>
                        

                    </a>
                </div>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a style="height: 48px !important;" href="#" id="1" class="menu-link sub-menu-link chapter-element chap">
                                <span class="icon-video" style="margin-left: -13%;"></span>
                                <span class="course-title-style"> chapter 1 </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>