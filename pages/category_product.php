   <?php
    get_header();
    ?>
   <nav class="navigation">
       <div class="title-nav">
           <div class="container">
               <h3>Fashion</h3>
               <div class="description-nav">
                   <a href="index.html">Home</a> / <span>Products</span>
               </div>
           </div>
       </div>


       <div class="production p-80">

           <div class="container">
               <div class="row structer">

                   <div class="left control-filter col-xl-3">
                       <div class="blur">
                           <div class="content-blur">
                               <div class="product-category">
                                   <h3 class="heading">
                                       Product Categories
                                   </h3>
                                   <p>Fashion</p>
                                   <ul class="list-option">
                                       <li>
                                           <input type="radio" name="checkone" value="All" id="input0" checked>
                                           <label for="input0"> All</label>
                                       </li>
                                       <li>
                                           <input type="radio" name="checkone" value="Accessories" id="input1">
                                           <label for="input1"> Accessories</label>
                                       </li>
                                       <li>
                                           <input type="radio" name="checkone" value="Backpack" id="input2">
                                           <label for="input2"> Backpack</label>
                                       </li>
                                       <li>
                                           <input type="radio" name="checkone" value="Mens" id="input3">
                                           <label for="input3"> Mens</label>
                                       </li>
                                       <li>
                                           <input type="radio" name="checkone" value="Shoes" id="input4">
                                           <label for="input4"> Shoes</label>
                                       </li>
                                       <li>
                                           <input type="radio" name="checkone" value="Womens" id="input5">
                                           <label for="input5"> Womens</label>
                                       </li>
                                   </ul>
                               </div>

                               <div class="price-range">
                                   <h3 class="heading">
                                       Price
                                   </h3>
                                   <div class="multi-range-slider">
                                       <input type="range" id="input-left" min="0" max="100" value="25">
                                       <input type="range" id="input-right" min="0" max="100" value="75">

                                       <div class="slider">
                                           <div class="track"></div>
                                           <div class="range"></div>
                                           <div class="thumb left"></div>
                                           <div class="thumb right"></div>
                                       </div>
                                   </div>
                                   <p class="mini-price">
                                       price :
                                       <span class="min">$0</span> -
                                       <span class="max">$200</span>
                                   </p>
                               </div>

                               <div class="featured-product">

                                   <h3 class="heading">
                                       Featured Products
                                   </h3>

                                   <ul class="list-pro">

                                       <li class="d-flex a-center">

                                           <div class="img">
                                               <img src="./img/product/20_1-copy-600x745.jpg" alt="">
                                           </div>

                                           <div class="content">

                                               <a href="#">
                                                   Women's Classic Glasses
                                               </a>

                                               <div class="price">
                                                   $80.00
                                               </div>

                                               <div class="rate">
                                                   <i class="bi bi-star-fill"></i>
                                                   <i class="bi bi-star-fill"></i>
                                                   <i class="bi bi-star-fill"></i>
                                                   <i class="bi bi-star-fill"></i>
                                                   <i class="bi bi-star-fill"></i>
                                               </div>

                                           </div>

                                       </li>

                                       <li class="d-flex a-center">

                                           <div class="img">
                                               <img src="./img/product/2_1-copy-600x745.jpg" alt="">
                                           </div>

                                           <div class="content">

                                               <a href="#">
                                                   Women Blue Coat
                                               </a>

                                               <div class="price">
                                                   $39.00
                                               </div>

                                               <div class="rate">
                                                   <i class="bi bi-star-fill"></i>
                                                   <i class="bi bi-star-fill"></i>
                                                   <i class="bi bi-star-fill"></i>
                                                   <i class="bi bi-star-fill"></i>
                                                   <i class="bi bi-star-fill"></i>
                                               </div>

                                           </div>

                                       </li>

                                       <li class="d-flex a-center">

                                           <div class="img">
                                               <img src="./img/product/7_1-copy-600x745.jpg" alt="">
                                           </div>

                                           <div class="content">

                                               <a href="#">
                                                   Mogens Koch Bookca
                                               </a>

                                               <div class="price">
                                                   $28.00
                                               </div>

                                               <div class="rate">
                                                   <i class="bi bi-star-fill"></i>
                                                   <i class="bi bi-star-fill"></i>
                                                   <i class="bi bi-star-fill"></i>
                                                   <i class="bi bi-star-fill"></i>
                                                   <i class="bi bi-star-fill"></i>
                                               </div>

                                           </div>

                                       </li>
                                   </ul>

                               </div>
                           </div>

                           <i class="filter-mode fas fa-filter"></i>
                       </div>


                   </div>

                   <div class="right col-lg-12 col-xl-9">

                       <div class="row control-title a-center">
                           <div class="col-lg-4 col-xl-4 left-col">Showing 1–12 of 19 results</div>
                           <div class="col-lg-6 col-xl-4 middle-col">
                               Views:
                               <span class="two-cols" data-cols="6">
                                   <i class="bi bi-grid"></i>
                               </span>

                               <span class="three-cols" data-cols="4">
                                   <i class="bi bi-grid-3x3-gap-fill"></i>
                               </span>

                               <span class="four-cols" data-cols="3">
                                   <i class="bi bi-grip-horizontal"></i>
                               </span>
                           </div>
                           <div class="col-xs-12 col-md-6 col-lg-4 col-xl-4 right-col">
                               <select name="" id="filterProduct">
                                   <option value="all">Defaul Sorting</option>
                                   <option value="low">Sort by price: low to high</option>
                                   <option value="high">Sort by price: high to low</option>
                               </select>
                           </div>
                       </div>

                       <div class="products row" id="addproductsCate">

                       </div>
                       <div class="group-btn-products">
                       </div>

                   </div>
               </div>

           </div>
       </div>

   </nav>

   <div class="quickview d-flex a-center">
       <div class="modal d-flex">
           <div class="img item-modal">
               <div class="owl-carousel owl-theme" id="quickviewSl">

               </div>

               <a href="#" class="btn btn-primary viewDetails">
                   View Details
               </a>

           </div>
           <div class="content item-modal">

           </div>
           <div class="close">
               &times;
           </div>
       </div>
   </div>

   <div class="compare-product">

       <div class="compare-product-box">

           <div class="top">
               <p class="heading">
                   Compare Products
               </p>
           </div>

           <table class="comparelist content">

           </table>

           <div class="close">
               &times;
           </div>
       </div>
   </div>
   <?php
    get_footer();
    ?>