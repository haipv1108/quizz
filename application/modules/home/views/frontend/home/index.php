<!-- Main Content -->
<section class="content">
  <?php if( isset($list_cate) && !empty($list_cate)){
            foreach ($list_cate as $key => $val) { ?>
              <div class="row box box-success box-solid row-category">
                <div class="col-md-12">
                  <div class="info-box">
                    <span class="info-box-icon">
                      <p class="text-center">
                        <a href="#">
                          <img src="template/frontend/Online Examination System/image/english.jpg" alt="Nihongo">
                        </a> 
                      </p> 
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text"><b><?php echo $val['name']?></b></span>
                      <p>
                        <span><i><?php echo $val['decription']?></i></span>
                      </p>
                    </div>
                  </div>
                </div>
  <?php if(isset($subject[$val['name']]) && !empty($subject[$val['name']])){
          $j = 0; ?>
                <div class="col-md-12">
                  <div class="box">
                    <div class="box-body no-padding">
                      <ul class="nav nav-pills nav-stacked">
                <?php foreach($subject[$val['name']] as $k=>$v){
                        $j++;?>
                        <li>
                          <a href="<?php echo site_url();?>home/listtest/<?php echo $v['id'];?>"><?php echo $v['name'];?>
                            <span class="label <?php if($j <2) echo 'label-warning'; else if($j < 3) echo 'label-primary'; else {echo 'label-info';$j = 0;}?> pull-right"><?php echo $v['sl'];?></span>
                          </a>
                        </li>
              <?php   }?>

                      </ul>
                    </div>
                  </div>
                </div>
          <?php } ?>
              </div>
     <?php  }
  } ?>
  <!-- Introduction -->
  <div class="row">
    <div class="col-md-10">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"># Introduction</h3>
        </div>
        <div class="box-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero voluptatem architecto necessitatibus illo amet consequatur praesentium quas. Voluptatum corrupti aut non dolores, dignissimos magnam quam quis incidunt ea, adipisci porro!
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero voluptatem architecto necessitatibus illo amet consequatur praesentium quas. Voluptatum corrupti aut non dolores, dignissimos magnam quam quis incidunt ea, adipisci porro!
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero voluptatem architecto necessitatibus illo amet consequatur praesentium quas. Voluptatum corrupti aut non dolores, dignissimos magnam quam quis incidunt ea, adipisci porro!
          </p>
          
        </div>
      </div>
    </div> 
  </div> <!-- Introduction -->
</section>
<!-- Main content -->