<form action="" method="post">
<section class="content">
   <div class="row">
      <div class="col-md-10">
         <!-- Hiển thị các danh ĐỀ THI của content -->
            <div class="box box-success">
               <!-- Title của đề thi -->
               <div class="row" style="padding-top: 20px;">
                  <div class="col-md-5">
                     <p class="text-center" style="font-size: 18px;"><b>Trường Đại học Bách Khoa Hà Nội</b></p>
                     <p class="text-center" style="font-size: 16px;"><b>Dự án đào tạo HEDSPI</b></p>
                  </div>
                  <div class="col-md-6 col-md-offset-1">
                     <p class="text-center" style="font-size: 16px;"><b>
                        <?php if(isset($test_info) && !empty($test_info)){
                           echo "Đề thi: ".$test_info['name']."<br>";
                           echo 'Mã đề thi: '.$test_info['madethi'].'<br/>';
                           echo 'Thời gian: '.$test_info['time'].' phút'.'<br/>';
                           echo 'Số lượng câu: '.$test_info['sl'].'<br/>';
                           }?>
                        </b>    
                     </p>
                  </div>
               </div>
               <div class="box-header">
                  <p class="pull-right"><b>Lưu ý:</b> Một câu hỏi có thể có nhiều hơn một đáp án đúng.</p>
				 <?php if(isset($user['level']) && $user['level'] == 2){?>
					 <a href="test/printTest/<?php if(isset($test_info) && !empty($test_info)) echo $test_info['id'];?>" class="btn btn-primary">Click to Print this Test >>></a>
				 <?php } ?>
         <div class="divider divider2"></div>
         </div>
         <div class="text-center delay"><p>Bạn sẽ bắt đầu trong <span id="demlui5s"></span>s</p></div>
         <div class="text-center shownotice"> <p>Bạn đã hết giờ làm bài,hãy bấm nút nộp bài để hiển thị điểm</p></div>
         <div class="box-body">
         <?php if(isset($test) && !empty($test)){
            $number_question = 1;
            foreach($test as $key=>$val){?>
         <div class="clearfix cauhoi-wrap chanle">
         <span class="cauhoi"><?php echo $number_question++;?>. <?php echo $val['question'];?></span>
         <div class="form-group">
         <?php if(isset($val['answer']) && !empty($val['answer'])){
            $answer_choice = json_decode($val['answer'],true);?>
         <?php $number_choice = count($answer_choice);
            for($choice = 1; $choice<= $number_choice; $choice++){?>
         <?php if(isset($answer_choice[$choice]) && !empty($answer_choice[$choice])){?>
         <div class="radio">
         <label>
         <input type="checkbox" value="<?php echo $choice;?>" name="answer[<?php echo $key;?>][]">
         <?php echo $answer_choice[$choice];?>
         </label>
         </div>
         <?php }?>
         <?php }?>
         <?php }?>                     
         </div>
         </div>   
         <?php 
            }
            }?>   
         <div class="divider divider2"></div>
         <div class="col-md-6 col-md-offset-5"> 
         <input type="submit" class="btn btn-success" name="submit" value="Nộp bài">
         </div>
         </div>
         </div>
      </div>
      <!-- Time -->
     
      <div id="practiceScore" style="display: block;">
         <table style="width: 15 0px">
            <tbody>
               <tr>
                  <td>Thời gian còn lại:</td>
               </tr> 
               <tr>
                   <td style="text-align : center;">
                     <span id="phut"></span>
                     :
                     <span id="giay">00</span>
                  </td>
               </tr>
            </tbody>
             <tr>
                  <!--<td><a type ="submit" id="testFinish" class="button" name="submit" value="Nộp bài">Nộp Bài</a></td>-->
                  <td>
                     <input type="submit"  id ="testFinish" class="button" name="submit" value="Nộp bài">

                  </td>
             </tr> 
         </table>
      </div>
      <!-- end Time -->
   </div><!-- Row-->
</section>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
      $(window).ready(function(){
        $(window).scroll(function(){
          var top=$(window).scrollTop();
          if (top>20) {
            $('#practiceScore').addClass('fixed');
          }else{
            $('#practiceScore').removeClass('fixed');          }
        })
      })
</script>
<script type="text/javascript">
      $(document).ready(function(){
         var m = 2; // Phút //var m = <?php echo $test_info['time'] ?>; // Phút
         var s = 5 ; // Giây
         var dem = 5;
         var timeout = null;
         function start(){
         if(dem == 0){
            $('.delay').fadeOut(300);

         }
         $('#demlui5s').html('').html(dem);
         if (s === -1){
                    m -= 1;
                    s = 59;
                }
         if (m == -1){
                    clearTimeout(timeout);
                    $('.box-body').hide();
                    $('.shownotice').fadeIn(300);
                    alert('Hết giờ,bạn hãy bấm nút nộp bài');
                    
                    return false;

                }

         $('#phut').html('').html(m);
         $('#giay').html('').html(s);

         timeout = setTimeout(function(){
                    s--;
                    dem--;
                    start();
                }, 1000);

         }
         start();
         $('.shownotice').hide()
         $('.box-body').hide();
         setTimeout(function(){
            $('.box-body').fadeIn(300);
            /*$('.delay').fadeOut(300);*/
         },6000);

      })
</script>
</form>
