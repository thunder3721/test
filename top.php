<?
//print1($aWebConfig);
$sql = "select * from z_article_type where `no` > 1  order  by  `sort`  ";
$aArticleType = getAll($sql);

if(!empty($aWebConfig["banner"]))
{
	$banner = 'style=" background-image:url('.$aWebConfig["banner"].')"';
}
?>
<div class="top_fz" <?=$banner?>  >
  <div class="w_ck">
    <div class="w_nc">
      <div class="top1">
        <ul>
          <li><?=strip_tags($aWebConfig["ch_name"])?></li>
          <li><?=strip_tags($aWebConfig["title_say"])?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="muen">
  <div class="w_ck">
    <div id="left-flyout-nav" class="layout-left-flyout visible-sm"></div>
    <div class="layout-right-content">
      <header class="the-header">
        <div class="navbar container"><a class="btn-navbar btn-navbar-navtoggle btn-flyout-trigger" href="javascript:;">
          <div><span class="icon-bar btn-flyout-trigger"></span> <span class="icon-bar btn-flyout-trigger"></span> <span class="icon-bar btn-flyout-trigger"></span></div>
          <b>主選單</b></a>
          <nav class="the-nav nav-collapse clearfix">
            <ul class="nav nav-pill pull-left">
              <li class="dropdown"><a onclick="location.href='index.php'" >首頁</a></li>
              
              <?
              for($i=0;$i<count($aArticleType);$i++)
			  {
				  $rArticleType = $aArticleType[$i];
				  $sql = "select * from z_article where type='".addslashes($rArticleType["no"])."'  order  by  `sort`  ";
				  $aArticle = getAll($sql);
			  ?>
              <li class="dropdown"><a href="index.php?action=article&type=<?=$rArticleType["no"]?>" ><?=$rArticleType["name"]?><b class="caret"></b></a>
              <?
              if(!empty($aArticle))
			  {
			  ?>
                <ul class="subnav">
                <?
             	 for($j=0;$j<count($aArticle);$j++)
				{
					 $rArticle = $aArticle[$j];
				?>
                  <li><a href="index.php?action=article&no=<?=$rArticle["no"]?>" ><?=$rArticle["title"]?></a></li>
                <?	
				}
				?>
                </ul>
              <?
			  }
			  ?>
              </li>
			  <?				  
			  }
			  ?>
              
              
              
			  
              <li class="dropdown"><a>活動報導<b class="caret"></b></a>
                <ul class="subnav">
				<?
                $sql = "select count(*) from z_big_think where 1 ";
                $DB->query($sql);
                $s  = $DB->getOne();
                if(!empty($s))
                {
                ?>
                  <li><a onclick="location.href='index.php?action=big_think'" >本會行事曆</a></li>
                <?
                }
                else
                {
                ?>
                 <?
                }
                ?>
                <?
                $sql = "select count(*) from z_news where 1 ";
                $DB->query($sql);
                $s  = $DB->getOne();
                if(!empty($s))
                {
                ?>
                  <li><a onclick="location.href='index.php?action=news_list'" >最新消息</a></li>
                <?
                }
                else
                {
                ?>
                 <?
                }
                ?>
                <?
                $sql = "select count(*) from z_active_pic where 1  ";
                $DB->query($sql);
                $s  = $DB->getOne();
                if(!empty($s))
                {
                ?>
                 <li><a onclick="location.href='index.php?action=active_list'" >活動花絮</a></li>
                <?
                }
                else
                {
                ?>
                 <?
                }
                ?>
                </ul>
              </li>

              <li class="dropdown"><a onclick="location.href='index.php?action=article&no=5'" >聯絡我們</a></li>
            </ul>
          </nav>
        </div>
      </header>
    </div>
    <script>$(document).ready(function(){$('.the-nav').cbFlyout();});</script> 
  </div>
</div>
