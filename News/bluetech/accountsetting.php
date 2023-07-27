<?php
if(isset ($_POST['update']))
{
    $sql="update login set username='".$_POST['username']."' , password='".$_POST['password']."'";
    $q=mysql_query($sql)or die(mysql_error().$sql);
    if($q)
    {
      echo '<script>alert("Username & Password Changed Succesfully");window.location="index.php";</script>';  
    }
}
$sql="select * from login where id ='".$_SESSION['udata']['id']."'";
$q=  mysql_query($sql)or die(mysql_error().$sql);
$r=  mysql_fetch_assoc($q);
?>
<div class="container-fluid main-content">
   
    <div class="row">
        <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="fa fa-table"></i>Account Setting
                </div>
                
                <div class="widget-content padded">
                    
                    <form action="#" class="form-horizontal" method="post">
                        
                
          <div class="form-group">
            <label class="control-label col-md-2">Username </label>
            <div class="col-md-7">
              <div class="input-group">
                  <span class="input-group-addon">@</span><input class="form-control"  type="text" name="username" value="<?php echo $r['username']; ?>" />
              </div>
            </div>
          </div>
                        
                        
                        <div class="form-group">
            <label class="control-label col-md-2">Password</label>
            <div class="col-md-7">
              <div class="input-group">
                  <span class="input-group-addon">$</span><input class="form-control" type="password" name="password" value="<?php echo $r['password']; ?>" />
              </div>
            </div>
          </div>
          
            
                         
          <div class="form-group">
          
              <div class="col-md-7" style="text-align: right;">
                  <button class="btn btn-primary" type="submit" name="update">Change</button><button class="btn btn-default-outline">Cancel   </button>
            </div>
          </div>
        </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end DataTables Example -->
</div>
