<?php
  include_once('./simple_html_dom.php');
  
  $html = file_get_html('http://eu.battle.net/d3/fr/status');
  $ret = $html->find('div[class=column]');
  $status = array();

  for($i = 0; $i <= 2; $i++){
    $retOK = $ret[$i]->find('div[class=status-icon]');
    $retOK = $retOK[0];
    $retOK = $retOK->outertext;
    $var = preg_split('/data-tooltip=\"/', $retOK);
    $var1 = preg_split('/\"/',$var[1]);
    
    $status[$i] = $var1[0];
  }
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="author" content="Arnaud Delante">
  <meta name="description" content="Simply check if you can play Diablo III">
  <meta name="keywords" content="portfolio,blog,high tech,wordpress,ruby,ruby on rails,jeux vidéo,video games,indie games,indépendant,arnaud,delante,arnaud delante" />
  <meta name="viewport" content="width=device-width">
  <meta property="og:image" content="http://www.caniplaydiabloiii.com/img/thumb.png" />
  <meta name="thumbnail" content="http://www.caniplaydiabloiii.com/img/thumb.png" />
  <link rel="image_src" href="http://www.caniplaydiabloiii.com/img/thumb.png" />
  <meta property="og:title" content="Can I play Diablo III?" />
  <meta name="keywords" content="diablo,diablo 3,diablo iii,blizzard,error,error 37,server" />
  <meta property="og:url" content="http://www.caniplaydiabloiii.com/"/>
  
  <title>Can I play Diablo III?</title>
  
  <link rel="shortcut icon" href="./favicon.ico">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="canonical" href="http://www.caniplaydiabloiii.com/" />

  <script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  <header>
    <h1>Can I play Diablo III ?</h1>
  </header>
  <div role="main">
    <section id="map">
      <img src="./img/us_<?php echo $status[0] ?>.png" width="960" height="475" />
      <img src="./img/eu_<?php echo $status[1] ?>.png" width="960" height="475" />
      <img src="./img/asia_<?php echo $status[2] ?>.png" width="960" height="475" />
    </section>
    <?php
      if($status[0] == "Disponible" && $status[1] == "Disponible" && $status[2] == "Disponible") {
        echo "<p class='info info_good'>It's all good !</p>";
      } elseif($status[0] != "Disponible" && $status[1] != "Disponible" && $status[2] != "Disponible") {
        echo "<p class='info info_bad'>We all die today...</p>";
      } elseif($status[0] != "Disponible" || $status[1] != "Disponible" || $status[2] != "Disponible") {
        echo "<p class='info info_bof'>Oops ! It's no play time for somes...</p>";
      }
    ?>
  </div>
  <footer>
    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.caniplaydiabloiii.com/" data-text="Can I play Diablo III?" data-lang="fr" data-related="Axiol" data-hashtags="Diablo3">Tweeter</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    
    <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.caniplaydiabloiii.com%2F&amp;send=false&amp;layout=button_count&amp;width=128&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=292901670804260" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:128px; height:21px;" allowTransparency="true"></iframe>
    
    <!-- Placez cette balise là où vous souhaitez positionner le bouton +1. -->
    <div class="g-plusone" data-size="medium" data-href="http://www.caniplaydiabloiii.com/"></div>

    <!-- Placez cet appel d'affichage à l'endroit approprié. -->
    <script type="text/javascript">
      window.___gcfg = {lang: 'fr'};

      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script>
    
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
    ">
    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
    </form>
  </footer>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>

  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-32011574-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</body>
</html>