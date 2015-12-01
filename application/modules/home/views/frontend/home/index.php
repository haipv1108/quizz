<?php if( isset($list_cate) && !empty($list_cate)){
    foreach ($list_cate as $key => $val) { ?>
        <div class="container">
        	<div class="row">
                <div class="col-md-10">
                  <div class="info-box box box-success box-solid">
                    <span class="info-box-icon">
                      <p class="text-center">
                        <a href="home/listtest/<?php echo $val['id'];?>">
                          <img src="template/frontend/Online Examination System/image/english.jpg" alt="Nihongo">
                        </a> 
                      </p> 
                    </span>
                    <div class="info-box-content">
                      <a href="home/listtest/<?php echo $val['id'];?>"><span class="info-box-text"><b><?php echo $val['name']?></b></span></a>
                      <p>
                        <span><i><?php echo $val['decription']?></i></span>
                      </p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
<?php  } 
} ?>
