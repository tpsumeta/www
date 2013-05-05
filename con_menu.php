		
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        <a class="brand" href="index.php">SAKURA HOUSE</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
            <?php  
				if(isset($_GET['nav'])){
						$nav = $_GET['nav']; 
						if($nav == "home") $home = "active";
						else $home ="#"; 
						if($nav == "food") $food = "active";
						else $food ="#";  
						if($nav == "about") $about = "active";
						else $about ="#";  
						if($nav == "contact") $contact = "active";
						else $contact ="#";  
						if($nav == "member") $member = "active";
						else $member ="#";  
				}
			?>
              <li class="<?= $home ?>"><a href="home.php?nav=home">Home</a></li>
              <li class="<?= $food ?>"><a href="food.php?nav=food">Food</a></li>
              <li class="<?= $about ?>"><a href="about.php?nav=about">About</a></li>
              <li class ="<?=$contact?>"><a href="contact.php?nav=contact">Contact</a></li>
              <li class ="<?=$member?>"><a href="member.php?nav=member">Member</a></li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
          
              </div>
      </div>
    </div>
