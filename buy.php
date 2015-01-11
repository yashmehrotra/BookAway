<!DOCTYPE html>
<html>
  <head>
    <title>Buy and Rent Books | BookAway.in</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Styles/MAIN.css">
    <link rel="stylesheet" type="text/css" href="Styles/ionicons.css">
    <script src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/buypage.js"></script>
    <script type="text/javascript" src="Scripts/bpopup-min.js"></script>
    <script type="text/javascript" src="Scripts/jquery.ui.core.js"></script>
    <script type="text/javascript" src="Scripts/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="Scripts/jquery.ui.position.js"></script>
    <script type="text/javascript" src="Scripts/jquery.ui.menu.js"></script>
    <script type="text/javascript" src="Scripts/jquery.ui.autocomplete.js"></script>
    <script type="text/javascript" src="Scripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="Scripts/jquery.select-to-autocomplete.js"></script>
    <script type="text/javascript" src="Scripts/header.js"></script>
  </head>
  <body>
    <?php
    require_once('header.php');
    ?>
    <div class="outer-page-wrap">
      <h2 class="head-text">buy books</h2>
      
      <div class="main-containers" id="buy-container">
        <div id="college-input-onload">
          <p>Please enter the name of your college to continue:</p>
          <?php
          require('colleges.php');
          ?>
          <button class="pointer-onhover" id="bpopup-close">Go</button>
        </div>
	
        <aside class="left-panel">
	  <label for="sort-by" id="sort-by-label">Sort By:</label>
	  <select name="sort-by" id="sort-by">
	    <option value="date-latest" selected>Date : Latest First</option>
	    <option value="date-oldest">Date : Oldest First</option>
	    <option value="price-high-low">Price : High to Low</option>
	    <option value="price-low-high">Price : Low to High</option>
	  </select>
          <form class="pure-form pure-form-stacked">
            <div id="buy-search-filters">

	      <div id="search-filters-college-select">
                <?php
                include('colleges.php');		
		?>
                <button class="ion-android-arrow-forward pointer-onhover filter-btn" id="search-filters-college-btn"></button>
		<a href="#" class="clear-filters-btn" id="college-clear" onclick="javascript:clear_college();">
		  Clear
		</a>
              </div>
	      
              <div class="ui-widget">
                <input type="search" id="left-panel-search-bar" placeholder="Search Here">
              </div>
              <button class="ion-android-search pointer-onhover filter-btn" id="left-panel-search-btn"></button>
	      <a class="clear-filters-btn" id="search-query-clear" onclick="javascript:clear_search_query();">
		Clear
	      </a>
	      
              <div class="sub-select" id="left-panel-sub-select">
                <p class="left-panel-text-wrap" id="sub-text-wrapper">
                  Category:
                </p>
                <a class="clear-filters-btn" id="category-clear" onclick="javascript:clear_category();">
                  Clear
                </a>
                <div id="sub-scroll-bar">
                  <?php 
                  require_once("categories.php"); 
                  ?>
                </div>
              </div>
	      
              <p class="left-panel-text-wrap" id="book-for-text-wrapper">
                Available For:
              </p>
              <a class="clear-filters-btn" id="available-for-clear" onclick="javascript:clear_available_for();">
                Clear
              </a>
              <label><input type="radio" name="radio-name" class="radio-available-for" value="4" id="radio-for-all" checked>All</label>
              <br>
              <label><input type="radio" name="radio-name" class="radio-available-for" value="3">Both Buy and Rent</label>
              <br>
              <label><input type="radio" name="radio-name" class="radio-available-for" value="1">Buy</label>
              <br>
              <label><input type="radio" name="radio-name" class="radio-available-for" value="2">Rent</label>
              <br>
	      
              <div id="left-panel-price-range">
                <p class="left-panel-text-wrap" id="price-range-text-wrapper">
                  Price Range:
                </p>
                <a class="clear-filters-btn" id="price-range-clear" onclick="javascript:clear_price_range();">
                  Clear
                </a>
                <input type="number" id="range-min" min="0" placeholder="Min"> to <input type="number" min="1" id="range-max" placeholder="Max">
                <button class="pointer-onhover  filter-btn" id="price-range">Go</button>
              </div>
	      
	      <a class="clear-filters-btn" id="all-filters-clear" onclick="javascript:clear_all();">
		Clear all filters
              </a>
	      
            </div>
          </form>
        </aside>
	
        <div id="buy-content-container">
	  <!-- Content Appended Here -->
	</div>
	
        <div class="pointer-onhover" id='go-to-top' onclick="javascript:smooth_scroll_to_top();">
          <span class="ion-arrow-up-a"></span>
          <p>Go to Top</p>
        </div>
	
      </div>
    </div>
    <?php
    require_once('footer.php');
    ?>
    <script type="text/javascript" src="Scripts/google_analytics.js"></script>
  </body>
</html>
