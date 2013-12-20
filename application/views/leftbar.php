   
  <hr class="noscreen" />
  <!-- Columns -->
  <div id="cols" class="box">
    <!-- Aside (Left Column) -->
   
   
  
    <div id="aside" class="box">
      <div class="padding box">
        <!-- Logo (Max. width = 200px) 
        <p id="logo"><a href="http://www.free-css.com/"><img src="<?php //echo base_url(); ?>application/libraries/images/logo.jpg" alt="" /></a></p>
        <!-- Search 
        <form action="http://www.free-css.com/" method="get" id="search">
          <fieldset>
          <legend>Search</legend>
          <p>
            <input type="text" size="17" name="" class="input-text" />
            &nbsp;
            <input type="submit" value="OK" class="input-submit-02" />
            <br />
            <a href="javascript:toggle('search-options');" class="ico-drop">Advanced search</a></p>
          <!-- Advanced search 
          <div id="search-options" style="display:none;">
            <p>
              <label>
              <input type="checkbox" name="" checked="checked" />
              Option I.</label>
              <br />
              <label>
              <input type="checkbox" name="" />
              Option II.</label>
              <br />
              <label>
              <input type="checkbox" name="" />
              Option III.</label>
            </p>
          </div>
       -->   
          
          <!-- /search-options -->
          </fieldset>
        </form>
        <!-- Create a new project -->
       <?php /*?> <p id="btn-create" class="box"><a href='<?php echo base_url(); ?>index.php/admin/logout/'><span><strong><?php isset($_SESSION['username']) ? $text = "Log Out" : $text = "Log In";  echo $text ; ?> &raquo;</strong></span></a></p><?php */?>
      </div>
      <!-- /padding -->
      <ul class="box">
        <li id="submenu-active"><a href="#"><?php echo $_SESSION['dname']; ?></a>
          <!-- Active -->
          <ul>
            <li><a href="#">Reminders</a></li>
            <li><a href="#">Pending</a></li>
            <li><a href="#">Quick Links</a></li>
            <li><a href="#">Contacts</a></li>
            <li><a href="#">Activities</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /aside -->
    
    <hr class="noscreen" />
    <!-- Content (Right Column) -->
    <div id="content" class="box" style="width:77%;">
      
    