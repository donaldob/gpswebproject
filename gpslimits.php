<?php ?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  
  <title>How GPS Works</title>
  <meta name="description" content="A project about GPS">
  <meta name="keywords" content="Satellite, navigation, Android,  GPS">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" media="all" href="gpsstyle.css">

</head>
<body class="article tutorial">

  <header class="main" id="siteheader">
    <h1 id="title">
     http://html5test.com/index.html
    </h1>
    <a href="#sitenav" id="navtoggle">Show</a>

    
    <a id="toctoggle" href="#toc">Table of Contents</a>
    

  

<nav id="sitenav">
<table class='BannerTableStyle'>
<tr>
<td style = 'width:245px;'>
<img src="images/220px-ConstellationGPS.gif" alt = "GPS Animation"></td>
<td>Don's GPS<br/>Resource</td>
</tr>
</table>
      <ul>
        
        <li id="about_menu"><a href="aboutgps.php" class="home">About GPS</a></li>
        <li id="limits_menu"><a href="gpslimits.php" class="tutorials">GPS Limits</a></li>
        <li id="project_menu"><a href="dongpsdemo.php" class="slides">Don's Android Demo</a></li>
      </ul>
    </nav>

    
    <nav class="toc" id="toc">
      <h1>Table of Contents</h1>

      <ul><li><a href='#toc-introduction'>Introduction</a></li>
<li><a href='#toc-barriers'>Physical Barriers</a></li>
<li><a href='#toc-geometry'>Satellite Geometry</a></li>
<li><a href='#toc-augment'>Augment GPS accuracy</a></li>
</ul>
    </nav>
    
  </header>





  <div class="body-content">
    

  <section class="title">

    

    <section class="PageHeading"> 
      
      <h1>Limits On GPS</h1>
      
      

     
    </section>
  </section>

  <article class="content-wrapper">

    <section class="container">

      

      <div class="article-meta" id="article-meta">
        <nav class="toc">
          <h1>Table of Contents</h1>

          <ul><li><a href='#toc-introduction'>Introduction</a></li>
<li><a href='#toc-barriers'>Physical Barriers</a></li>
<li><a href='#toc-geometry'>Satellite Geometry</a></li>
<li><a href='#toc-augment'>Augment GPS accuracy</a></li>
</ul>
        </nav>

        
      </div>
       

      <div class="content" id="article-content"> 


        
  <h2 id="toc-introduction">Introduction</h2>
  <p>At any one time half or more of the Satellites have their signals blocked by the Earth. You can see this in the animation used for the banner.</p>
<p>Even with half of all satellites available and only three required to achieve a position fix, there can still be problems for the GPS receiver trying to "lock" onto the message signals from the remaining satellites.</p>
  
<h2 id="toc-barriers">Physical barriers</h2>
<p>GPS signals can be blocked by physical obstructions.</p><p>Most GPS units will not work inside a building. Many will work inside a car.</p><p>If you are in a city street surrounded by tall buildings, then the signals from several satellites may be blocked.</p>

<h2 id="toc-geometry">Satellite Geometry</h2>
<p>"Geometry" refers to the spacing of the "locked on" satellites, those that the receiver is getting messages from.</p>
<img src="images/geo_good.png" alt = "good geometry">
<p>If the Satellites are spaced out then the mathematical calculations of the receiver aer more accurate. If the satellites are closer together, accuracy is not so good.</p>
<p><img src="images/geo_bad.png" alt = "bad geometry"></p>

<h2 id="toc-augment">Augment GPS accuracy</h2>
<p>The engineers have developed various methods to compensate for the limits of GPS. Some of these methods are constrained to more expensive sophisticated systems, but some good ones are available on smart phones like Androids and IPhones.</p>
<p>The location services of Androids and iPhones use cell-phone towers and Wi-Fi networks to improve the accuracy of position-fixing.</p>



  
 </div>
    </section>
  </article>
 

      <footer>
<p>Don O'Brien  2014</p> 
<p>donald_ob@hotmail.com</p>
<p>Thanks to Google and the HTML5 Rocks site for code and layout ideas through the <a href = "http://creativecommons.org/licenses/by/3.0/" target="_blank" >Creative Commons Attribution 3.0 License.</a></p>    
<p><a href = "http://en.wikipedia.org/wiki/File:ConstellationGPS.gif">GPS animation</a> courtesy of Wikipedia<p> 
</footer>

 </div>



</body>

<script>
    (function() {
    var site_Header = document.getElementById('siteheader');
    var nav_Toggle = document.getElementById('navtoggle');
    var site_Nav = document.getElementById('sitenav');

    function toggle(target, forceActive) {

      if (typeof toc !== 'undefined') {
        // Switch off the one that is not the current target
        if (target === toc)
          site_Nav.classList.remove('active');
        else
          toc.classList.remove('active');
      }

      // Toggle if no force parameter is set
      if (typeof forceActive === 'undefined') {
        target.classList.toggle('active');
      } else {
        if (forceActive)
          target.classList.add('active');
        else
          target.classList.remove('active');
      }

      // now find out what the set state ended up being
      var isActive = target.classList.contains('active');

      if (isActive)
        site_Header.classList.add('expanded');
      else
        site_Header.classList.remove('expanded');

    }

    nav_Toggle.addEventListener('click', function(e) {
      toggle(site_Nav);
      e.preventDefault();
    });

    

    var tocToggle = document.getElementById('toctoggle');
    var toc = document.getElementById('toc');
    var this_article_Meta = document.getElementById('article-meta');
    var this_article_Content = document.getElementById('article-content');
    var this_article_MetaHeight = 0;
    var this_article_MetaMaxY = 0;
    var this_article_MetaMinY = 0;
    var this_article_ContentPadding = 200;

    var tocLinks = document.querySelectorAll('.toc a');
    for (var t = 0; t < tocLinks.length; t++)
      tocLinks[t].addEventListener('click', onTocLinkGetClick);

    tocToggle.addEventListener('click', function(e) {
      toggle(toc);
      e.preventDefault();
    });

    toc.addEventListener('click', function(e) {
      if (e.target !== site_Nav)
        toggle(toc, false);
    });

    function onTocLinkGetClick() {
      _gag.push(['_trackEvent', 'Interactions', 'TOC', 'TOC Clicked']);
    }

    function setMinYScroll_FromMetaY() {
      var scrollPosition = window.scrollY;

      var this_article_MetaBounds = this_article_Meta.getBoundingClientRect();
      var this_article_MetaTop = Math.max(352,
          this_article_MetaBounds.top - 20 + scrollPosition);

      this_article_MetaHeight = this_article_MetaBounds.bottom - this_article_MetaBounds.top;
      this_article_MetaMinY = this_article_MetaTop;
    }

    function set_MaxYScroll_FromContentHeight() {

      var scrollPosition = window.scrollY;

      var this_article_ContentBounds = this_article_Content.getBoundingClientRect();
      var this_article_ContentTop = this_article_ContentBounds.top + scrollPosition;
      var this_article_ContentHeight = this_article_ContentBounds.bottom - this_article_ContentBounds.top;

      this_article_MetaMaxY = this_article_ContentTop +
          this_article_ContentHeight -
          this_article_MetaHeight -
          this_article_ContentPadding;

    }

    function onScroll(e) {

      if (window.scrollY >= this_article_MetaMinY) {

        this_article_Meta.classList.add('sticky');

        var this_article_MetaTop = 22 - Math.max(0, window.scrollY - this_article_MetaMaxY);
        this_article_Meta.style.top = this_article_MetaTop + 'px';

      } else {
        this_article_Meta.classList.remove('sticky');
        this_article_Meta.style.top = 'auto';
      }
    }

    if (this_article_Meta.getBoundingClientRect) {
      setMinYScroll_FromMetaY();
      set_MaxYScroll_FromContentHeight();
      document.addEventListener('scroll', onScroll);
      window.addEventListener('load', set_MaxYScroll_FromContentHeight, false);
    }

    
  })();

</script>
</html>
<?php exit; ?>
