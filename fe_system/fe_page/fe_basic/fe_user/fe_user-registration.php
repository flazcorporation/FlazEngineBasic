<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            FORMULIR PENGGUNA SISTEM
            <!-- <small>Form Biodata Kelas</small> -->
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
              <!-- Form Element sizes -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <!-- <h2 class="box-title">FORM BIODATA GURU</h2> -->
                </div>
                <div class="box-body">
                <?php
                    $tokenuserreg = bin2hex(openssl_random_pseudo_bytes(16));
                    setcookie("CSRFuserreg", $tokenuserreg, time() + 60 * 60 * 24);
                ?>
                    
                    <form action="<?php echo uri_link('registrasi-proses');?>" name="" enctype="multipart/form-data" method="post">
                      <?php
                      /* Initial Protection code
                       * You can put it anywhere inside the <form> tag
                       */
                      Sasla::protectMe();
                      ?>
                        
                        <div class="form-group">
                            <h4 class="box-title">Name</h4>
                            <input type="text" name="user_f_name" placeholder="Type your name" class="form-control input-lg" value="" required/>
                        </div>
                        <div class="form-group">
                            <h4 class="box-title">Gender</h4>
                            <input type="radio" name="user_f_gender" value="Male" id="Male" required /> Male
                            <input type="radio" name="user_f_gender" value="Female" id="Female" required /> Female
                        </div>
                        <div class="form-group">
                            <h4 class="box-title">Phone</h4>
                            <input type="number" name="user_f_phone" placeholder="Your phone number" class="form-control input-lg" value=""  min="" max="" step=""/>
                        </div>
                        <div class="form-group">
                            <h4 class="box-title">Email</h4>
                            <input type="email" name="user_f_email" placeholder="Type your mail" class="form-control input-lg" value="" required/>
                        </div>
                        <div class="form-group">
                            <h4 class="box-title">Password</h4>
                            <input type="password" name="user_f_password" placeholder="Type to change password" class="form-control input-lg" value="" />
                        </div>
                        <div class="form-group">
                            <h4 class="box-title">Access</h4>
                                <select name="user_f_access" class="form-control input-lg" required>
                                    <option value="">Your access</option>
                                    <option value="Ketua Yayasan" id="user_f_accessLibrarian">Administrator</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <h4 class="box-title">Picture</h4>
                            <input type="file" name="user_f_picture" placeholder="Pick to change picture" class="form-control input-lg" value="" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" 		name="id" 		class="form-control input-lg" value=""/>
                            <input name="CSRFuserreg" type="hidden" value="<?php echo $tokenuserreg; ?>">
                            <input type="submit" value="Simpan" class="form-control input-lg btn btn-primary" />
						<!-- <input type="submit" value="Simpan" onclick="this.disabled=true" class="form-control input-lg btn btn-primary" />
              -->
                        </div>
                    </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </section><!-- /.content -->
