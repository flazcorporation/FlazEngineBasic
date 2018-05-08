<?php
function telegram(){
  ?>
    <div class="box box-warning direct-chat direct-chat-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Direct Chat</h3>
            <div class="box-tools pull-right">
              <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                            data-widget="chat-pane-toggle">
              <i class="fa fa-comments"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="height:auto">
        <!-- Conversations are loaded here -->
          <div class="direct-chat-messages" id="chatlist">
			<!--
            <div class="direct-chat-msg">
              <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-left">Alexander Pierce</span>
                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
              </div>
              <img class="direct-chat-img" src="<?php echo fe_data.'/profile.png';?>" alt="message user image">
              <div class="direct-chat-text">
                Is this template really for free? That's unbelievable!
              </div>
            </div>
            <div class="direct-chat-msg right">
              <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-right">Sarah Bullock</span>
                <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
              </div>
              <img class="direct-chat-img" src="<?php echo fe_data.'/profile.png';?>" alt="message user image">
              <div class="direct-chat-text">
                You better believe it!
              </div>
            </div>
			-->
          <!-- Contacts are loaded here -->
			</div>
          <div class="direct-chat-contacts">
            <ul class="contacts-list">
              <li>
                <a href="#">
              <img class="direct-chat-img" src="<?php echo fe_data.'/profile.png';?>" alt="message user image">
                  <div class="contacts-list-info">
                    <span class="contacts-list-name">
                      Count Dracula
                      <small class="contacts-list-date pull-right">2/28/2015</small>
                    </span>
                    <span class="contacts-list-msg">How have you been? I was...</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
              <li>
                <a href="#">
              <img class="direct-chat-img" src="<?php echo fe_data.'/profile.png';?>" alt="message user image">
                  <div class="contacts-list-info">
                    <span class="contacts-list-name">
                      Sarah Doe
                      <small class="contacts-list-date pull-right">2/23/2015</small>
                    </span>
                    <span class="contacts-list-msg">I will be waiting for...</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
              <li>
                <a href="#">
              <img class="direct-chat-img" src="<?php echo fe_data.'/profile.png';?>" alt="message user image">
                  <div class="contacts-list-info">
                    <span class="contacts-list-name">
                      Nadia Jolie
                      <small class="contacts-list-date pull-right">2/20/2015</small>
                    </span>
                    <span class="contacts-list-msg">I'll call you back at...</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
              <li>
                <a href="#">
              <img class="direct-chat-img" src="<?php echo fe_data.'/profile.png';?>" alt="message user image">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Nora S. Vans
                        <small class="contacts-list-date pull-right">2/10/2015</small>
                      </span>
                      <span class="contacts-list-msg">Where is your new...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
              <li>
                <a href="#">
              <img class="direct-chat-img" src="<?php echo fe_data.'/profile.png';?>" alt="message user image">
                  <div class="contacts-list-info">
                    <span class="contacts-list-name">
                      John K.
                      <small class="contacts-list-date pull-right">1/27/2015</small>
                    </span>
                    <span class="contacts-list-msg">Can I take a look at...</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
              <li>
              <a href="#">
              <img class="direct-chat-img" src="<?php echo fe_data.'/profile.png';?>" alt="message user image">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Kenneth M.
                        <small class="contacts-list-date pull-right">1/4/2015</small>
                      </span>
                      <span class="contacts-list-msg">Never mind I found...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                </a>
              </li>
			<!-- End Contact Item -->
              <!-- End Contact Item -->
              <li>
              <a href="#">
              <img class="direct-chat-img" src="<?php echo fe_data.'/profile.png';?>" alt="message user image">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Kenneth M.
                        <small class="contacts-list-date pull-right">1/4/2015</small>
                      </span>
                      <span class="contacts-list-msg">Never mind I found...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                </a>
              </li>
			<!-- End Contact Item -->
              <!-- End Contact Item -->
              <li>
              <a href="#">
              <img class="direct-chat-img" src="<?php echo fe_data.'/profile.png';?>" alt="message user image">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Kenneth M.
                        <small class="contacts-list-date pull-right">1/4/2015</small>
                      </span>
                      <span class="contacts-list-msg">Never mind I found...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                </a>
              </li>
			<!-- End Contact Item -->
              <!-- End Contact Item -->
              <li>
              <a href="#">
              <img class="direct-chat-img" src="<?php echo fe_data.'/profile.png';?>" alt="message user image">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Kenneth M.
                        <small class="contacts-list-date pull-right">1/4/2015</small>
                      </span>
                      <span class="contacts-list-msg">Never mind I found...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                </a>
              </li>
			<!-- End Contact Item -->
            </ul>
            <!-- /.contatcts-list -->
          </div>
          <!-- /.direct-chat-pane -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <form action="#" name="form-telegram" name="form-telegram" method="post">
            <div class="input-group">
              <input type="text" name="message" id="message" placeholder="Ketik pesan..." class="form-control">
              <span class="input-group-btn">
                <div onclick="sendmessage('92799641')" class="btn btn-warning btn-flat">Send</button>
              </span>
            </div>
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!--/.direct-chat -->
    </div>
    <!-- /.col -->
  </div>
	<script>
	$(document).ready(function(){
		window.setInterval(function(){
			getmessage();
		}, 5000);
		window.getmessage = function(){
			$.ajax({
					type: "POST",
					async: false,
					url: "<?php echo uri_link('telegram-data');?>",
					cache: false,
					dataType: "json",
					success: function(res){
						var data = $.parseJSON(res);
						for(var obj in data){
							var chatexist 	= $("div[class*='itemchat']").length;
							var chatnew   	= data[obj].length;
							var chatlast 	= chatnew-1;
							var html 		= '';
							if(typeof chatexist !== 'undefined' && typeof chatnew !== 'undefined'){
								if(chatexist == 0){
									for(var i=0; i<data[obj].length; i++){
										html += "<div class='direct-chat-msg itemchat'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-left'>"+data[obj][i]['message']['from']['first_name']+" "+data[obj][i]['message']['from']['last_name']+"</span><span class='direct-chat-timestamp pull-right'>"+data[obj][i]['message']['date']+"</span></div><img class='direct-chat-img' src='<?php echo uri_file(fe_data.'/profile.png');?>' alt='message user image'><div class='direct-chat-text'>"+data[obj][i]["message"]["text"]+"</div></div>";
									}
									$('#chatlist').html(html);
								}else{
									if(chatexist !== chatnew){
										for(var i=0; i<data[obj].length; i++){
											html += "<div class='direct-chat-msg itemchat'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-left>"+data[obj][i]['message']['from']['first_name']+" "+data[obj][i]['message']['from']['last_name']+"</span><span class='direct-chat-timestamp pull-right'>"+data[obj][i]['message']['date']+"</span></div><img class='direct-chat-img' src='<?php echo uri_file(fe_data.'/profile.png');?>' alt='message user image'><div class='direct-chat-text'>"+data[obj][i]["message"]["text"]+"</div></div>";
										}	
										$('#chatlist').html(html);
									}									
								}
							}
						}
					}
			});	
		}
		window.sendmessage = function(userid){
			var message = $('#message').val();
			$.ajax({
					type: "POST",
					async: false,
					url: "<?php echo uri_link('telegram-send');?>",
					data: {
						"userid" 		: userid,
						"message" 		: message
						},
					cache: false,
					dataType: "json",
					success: function(res){
						$('#message').val('');
					}
			});	
		}
	});
	</script>
  
  <?php
  }
?>