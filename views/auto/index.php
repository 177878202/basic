<?php




?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <form class="form-horizontal" action="?act=set" method="post">
                <div class="input-group">
                    <span class="input-group-addon">挂机网址</span>
                    <select class="form-control"  name="url">
                        <option value=0 >www.ozc288.com</option>
                        <option value=1 <?php  if(isset($_SESSION['zd28v35']["url"])&&$_SESSION['zd28v35']["url"]==1){echo("selected");} ?>>www.douwan2888.net</option>
                        <option value=2 <?php  if(isset($_SESSION['zd28v35']["url"])&&$_SESSION['zd28v35']["url"]==2){echo("selected");} ?>>120.25.63.223:8123</option>
                        <option value=3 <?php  if(isset($_SESSION['zd28v35']["url"])&&$_SESSION['zd28v35']["url"]==3){echo("selected");} ?>>120.26.89.78</option>
                        <option value=4 <?php  if(isset($_SESSION['zd28v35']["url"])&&$_SESSION['zd28v35']["url"]==4){echo("selected");} ?>>www.ozc28.com</option>
                        <option value=5 <?php  if(isset($_SESSION['zd28v35']["url"])&&$_SESSION['zd28v35']["url"]==5){echo("selected");} ?>>121.43.96.131:833</option>
                    </select>
                    <span class="input-group-addon">PHPSESSID</span>
                    <input type="text" name="PHPSESSID" class="form-control" placeholder="输入从上面网址获取到的PHPSESSID" value="<?php if(isset($_GET["PHPSESSID"])){echo($_GET["PHPSESSID"]);}else{if(isset($_SESSION['zd28v35']["PHPSESSID"])){echo($_SESSION['zd28v35']["PHPSESSID"]);}} ?>">
                </div>

                <div class="input-group">
                    <span class="input-group-addon">停止分数</span>
                    <input type="text" name="stop" class="form-control" placeholder="达到设定分数时停止投注" value="<?php if(isset($_SESSION['zd28v35']["stop"])){echo($_SESSION['zd28v35']["stop"]);} ?>">
                    <span class="input-group-addon">基础倍数</span>
                    <input type="text" name="jcbs" class="form-control" placeholder="默认为1" value="<?php if(isset($_SESSION['zd28v35']["jcbs"])){echo($_SESSION['zd28v35']["jcbs"]);} ?>">


                    <span class="input-group-addon">运行</span>
                    <span class="input-group-addon">
                  <input  name="y_n" type="checkbox" <?php  if(isset($_SESSION['zd28v35']["y_n"])&&$_SESSION['zd28v35']["y_n"]){echo("checked");} ?>>
               </span>
                    <span class="input-group-btn">
							  <button class="btn btn-default" type="submit">
								 设置
							  </button>
					   </span>

                </div>
            </form>
        </div>
        <iframe id="iframe" height="800" src="<?= \yii\helpers\Url::to(['tz']) ?>" frameBorder="0" width="100%"></iframe>
    </div>
</div>
