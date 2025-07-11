@extends('kasir::layouts.master')

@section('content')
  <!-- BEGIN pos -->
  <div class="pos pos-with-menu pos-with-sidebar" id="pos">
    <!-- BEGIN pos-menu -->
    <div class="pos-menu">
      <div class="logo">
        <a href="index_v3.html">
          <div class="logo-img"><i class="fa fa-bowl-rice"></i></div>
          <div class="logo-text">Pine & Dine</div>
        </a>
      </div>
      <div class="nav-container">
        <div data-scrollbar="true" data-height="100%" data-skip-mobile="true">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#" data-filter="all">
                <div class="nav-icon"><i class="fa fa-fw fa-utensils"></i></div>
                <div class="nav-text">All Dishes</div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-filter="meat">
                <div class="nav-icon"><i class="fa fa-fw fa-drumstick-bite"></i></div>
                <div class="nav-text">Meat</div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-filter="burger">
                <div class="nav-icon"><i class="fa fa-fw fa-hamburger"></i></div>
                <div class="nav-text">Burger</div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-filter="pizza">
                <div class="nav-icon"><i class="fa fa-fw fa-pizza-slice"></i></div>
                <div class="nav-text">Pizza</div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-filter="drinks">
                <div class="nav-icon"><i class="fa fa-fw fa-cocktail"></i></div>
                <div class="nav-text">Drinks</div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-filter="desserts">
                <div class="nav-icon"><i class="fa fa-fw fa-ice-cream"></i></div>
                <div class="nav-text">Desserts</div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-filter="snacks">
                <div class="nav-icon"><i class="fa fa-fw fa-cookie-bite"></i></div>
                <div class="nav-text">Snacks</div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- END pos-menu -->

    <!-- BEGIN pos-content -->
    <div class="pos-content">
      <div class="pos-content-container h-100">
        <div class="product-row">
          <div class="product-container" data-type="meat">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-1.jpg)"></div>
              <div class="text">
                <div class="title">Grill Chicken Chop&reg;</div>
                <div class="desc">chicken, egg, mushroom, salad</div>
                <div class="price">$10.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="meat">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-2.jpg)"></div>
              <div class="text">
                <div class="title">Grill Pork Chop&reg;</div>
                <div class="desc">pork, egg, mushroom, salad</div>
                <div class="price">$12.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="meat">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-3.jpg)"></div>
              <div class="text">
                <div class="title">Capellini Tomato Sauce&reg;</div>
                <div class="desc">spaghetti, tomato, mushroom </div>
                <div class="price">$11.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="meat">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-4.jpg)"></div>
              <div class="text">
                <div class="title">Vegan Salad Bowl&reg;</div>
                <div class="desc">apple, carrot, tomato </div>
                <div class="price">$6.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="pizza">
            <div class="product not-available">
              <div class="img" style="background-image: url(../assets/img/pos/product-5.jpg)"></div>
              <div class="text">
                <div class="title">Hawaiian Pizza&reg;</div>
                <div class="desc">pizza, crab meat, pineapple </div>
                <div class="price">$20.99</div>
              </div>
              <div class="not-available-text">
                <div>Not Available</div>
              </div>
            </div>
          </div>
          <div class="product-container" data-type="burger">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-17.jpg)"></div>
              <div class="text">
                <div class="title">Perfect Burger</div>
                <div class="desc">Dill pickle, cheddar cheese, tomato, red onion, ground chuck beef</div>
                <div class="price">$8.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="drinks">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-6.jpg)"></div>
              <div class="text">
                <div class="title">Avocado Shake</div>
                <div class="desc">avocado, milk, vanilla</div>
                <div class="price">$3.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="drinks">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-7.jpg)"></div>
              <div class="text">
                <div class="title">Coffee Latte</div>
                <div class="desc">espresso, milk</div>
                <div class="price">$2.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="drinks">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-8.jpg)"></div>
              <div class="text">
                <div class="title">Vita C Detox Juice</div>
                <div class="desc">apricot, apple, carrot and ginger juice</div>
                <div class="price">$2.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="snacks">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-9.jpg)"></div>
              <div class="text">
                <div class="title">Pancake</div>
                <div class="desc">Non dairy, egg, baking soda, sugar, all purpose flour</div>
                <div class="price">$5.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="snacks">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-10.jpg)"></div>
              <div class="text">
                <div class="title">Mushroom soup</div>
                <div class="desc">Evaporated milk, marsala wine, beef cubes, chicken broth, butter</div>
                <div class="price">$3.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="snacks">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-11.jpg)"></div>
              <div class="text">
                <div class="title">Baked chicken wing</div>
                <div class="desc">Chicken wings, a1 steak sauce, honey, cayenne pepper</div>
                <div class="price">$6.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="meat">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-12.jpg)"></div>
              <div class="text">
                <div class="title">Veggie Spaghetti</div>
                <div class="desc">Yellow squash, pasta, roasted red peppers, zucchini</div>
                <div class="price">$12.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="desserts">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-13.jpg)"></div>
              <div class="text">
                <div class="title">Vanilla Ice Cream</div>
                <div class="desc">Heavy whipping cream, white sugar, vanilla extract</div>
                <div class="price">$3.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="desserts">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-15.jpg)"></div>
              <div class="text">
                <div class="title">Perfect Yeast Doughnuts</div>
                <div class="desc">Chocolate hazelnut spread, bread flour, doughnuts, quick rise yeast, butter</div>
                <div class="price">$2.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="desserts">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-14.jpg)"></div>
              <div class="text">
                <div class="title">Macarons</div>
                <div class="desc">Almond flour, egg whites, heavy cream, food coloring, powdered sugar</div>
                <div class="price">$4.99</div>
              </div>
            </a>
          </div>
          <div class="product-container" data-type="desserts">
            <a href="#" class="product" data-bs-toggle="modal" data-bs-target="#modalPos">
              <div class="img" style="background-image: url(../assets/img/pos/product-16.jpg)"></div>
              <div class="text">
                <div class="title">Perfect Vanilla Cupcake</div>
                <div class="desc">Baking powder, all purpose flour, plain kefir, vanilla extract</div>
                <div class="price">$2.99</div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- END pos-content -->

    <!-- BEGIN pos-sidebar -->
    <div class="pos-sidebar">
      <div class="h-100 d-flex flex-column p-0">
        <div class="pos-sidebar-header">
          <div class="back-btn">
            <button type="button" data-dismiss-class="pos-sidebar-mobile-toggled" data-target="#pos"
              class="btn border-0">
              <i class="fa fa-chevron-left"></i>
            </button>
          </div>
          <div class="icon"><i class="fa fa-plate-wheat"></i></div>
          <div class="title">Table 01</div>
          <div class="order">Order: <b>#0056</b></div>
        </div>
        <div class="pos-sidebar-nav">
          <ul class="nav nav-tabs nav-fill">
            <li class="nav-item">
              <a class="nav-link active" href="#" data-bs-toggle="tab" data-bs-target="#newOrderTab">New Order
                (5)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#orderHistoryTab">Order History
                (0)</a>
            </li>
          </ul>
        </div>
        <div class="pos-sidebar-body tab-content" data-scrollbar="true" data-height="100%">
          <div class="tab-pane fade h-100 show active" id="newOrderTab">
            <div class="pos-table">
              <div class="row pos-table-row">
                <div class="col-9">
                  <div class="pos-product-thumb">
                    <div class="img" style="background-image: url(../assets/img/pos/product-2.jpg)"></div>
                    <div class="info">
                      <div class="title">Grill Pork Chop</div>
                      <div class="single-price">$12.99</div>
                      <div class="desc">- size: large</div>
                      <div class="input-group qty">
                        <div class="input-group-append">
                          <a href="#" class="btn btn-default"><i class="fa fa-minus"></i></a>
                        </div>
                        <input type="text" class="form-control" value="01" />
                        <div class="input-group-prepend">
                          <a href="#" class="btn btn-default"><i class="fa fa-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-3 total-price">$12.99</div>
              </div>
              <div class="row pos-table-row">
                <div class="col-9">
                  <div class="pos-product-thumb">
                    <div class="img" style="background-image: url(../assets/img/pos/product-8.jpg)"></div>
                    <div class="info">
                      <div class="title">Orange Juice</div>
                      <div class="single-price">$5.00</div>
                      <div class="desc">
                        - size: large<br />
                        - less ice
                      </div>
                      <div class="input-group qty">
                        <div class="input-group-append">
                          <a href="#" class="btn btn-default"><i class="fa fa-minus"></i></a>
                        </div>
                        <input type="text" class="form-control" value="02" />
                        <div class="input-group-prepend">
                          <a href="#" class="btn btn-default"><i class="fa fa-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-3 total-price">$10.00</div>
              </div>
              <div class="row pos-table-row">
                <div class="col-9">
                  <div class="pos-product-thumb">
                    <div class="img" style="background-image: url(../assets/img/pos/product-1.jpg)"></div>
                    <div class="info">
                      <div class="title">Grill chicken chop</div>
                      <div class="single-price">$10.99</div>
                      <div class="desc">
                        - size: large<br />
                        - spicy: medium
                      </div>
                      <div class="input-group qty">
                        <div class="input-group-append">
                          <a href="#" class="btn btn-default"><i class="fa fa-minus"></i></a>
                        </div>
                        <input type="text" class="form-control" value="01" />
                        <div class="input-group-prepend">
                          <a href="#" class="btn btn-default"><i class="fa fa-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-3 total-price">$10.99</div>
              </div>
              <div class="row pos-table-row">
                <div class="col-9">
                  <div class="pos-product-thumb">
                    <div class="img" style="background-image: url(../assets/img/pos/product-5.jpg)"></div>
                    <div class="info">
                      <div class="title">Hawaiian Pizza</div>
                      <div class="single-price">$15.00</div>
                      <div class="desc">
                        - size: large<br />
                        - more onion
                      </div>
                      <div class="input-group qty">
                        <div class="input-group-append">
                          <a href="#" class="btn btn-default"><i class="fa fa-minus"></i></a>
                        </div>
                        <input type="text" class="form-control" value="01" />
                        <div class="input-group-prepend">
                          <a href="#" class="btn btn-default"><i class="fa fa-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-3 total-price">$15.00</div>
                <div class="pos-remove-confirmation">
                  <div class="text-center mx-auto">
                    <div><i class="far fa-trash-can fa-2x text-body text-opacity-50"></i></div>
                    <div class="mt-1 mb-2">Confirm to remove this item? </div>
                    <div>
                      <a href="#" class="btn btn-default w-60px me-2">No</a>
                      <a href="#" class="btn btn-danger w-60px">Yes</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row pos-table-row">
                <div class="col-9">
                  <div class="pos-product-thumb">
                    <div class="img" style="background-image: url(../assets/img/pos/product-10.jpg)"></div>
                    <div class="info">
                      <div class="title">Mushroom Soup</div>
                      <div class="single-price">$3.99</div>
                      <div class="desc">
                        - size: large<br />
                        - more cheese
                      </div>
                      <div class="input-group qty">
                        <div class="input-group-append">
                          <a href="#" class="btn btn-default"><i class="fa fa-minus"></i></a>
                        </div>
                        <input type="text" class="form-control" value="01" />
                        <div class="input-group-prepend">
                          <a href="#" class="btn btn-default"><i class="fa fa-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-3 total-price">$3.99</div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade h-100" id="orderHistoryTab">
            <div class="h-100 d-flex align-items-center justify-content-center text-center p-20">
              <div>
                <div class="mb-3 mt-n5">
                  <svg width="6em" height="6em" viewBox="0 0 16 16" class="text-gray-300" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M14 5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5zM1 4v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4H1z" />
                    <path d="M8 1.5A2.5 2.5 0 0 0 5.5 4h-1a3.5 3.5 0 1 1 7 0h-1A2.5 2.5 0 0 0 8 1.5z" />
                  </svg>
                </div>
                <h4>No order history found</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="pos-sidebar-footer">
          <div class="d-flex align-items-center mb-2">
            <div>Subtotal</div>
            <div class="flex-1 text-end h6 mb-0">$30.98</div>
          </div>
          <div class="d-flex align-items-center">
            <div>Taxes (6%)</div>
            <div class="flex-1 text-end h6 mb-0">$2.12</div>
          </div>
          <hr class="opacity-1 my-10px">
          <div class="d-flex align-items-center mb-2">
            <div>Total</div>
            <div class="flex-1 text-end h4 mb-0">$33.10</div>
          </div>
          <div class="d-flex align-items-center mt-3">
            <a href="#" class="btn btn-default rounded-3 text-center me-10px w-70px"><i
                class="fa fa-bell d-block fs-18px my-1"></i> Service</a>
            <a href="#" class="btn btn-default rounded-3 text-center me-10px w-70px"><i
                class="fa fa-receipt d-block fs-18px my-1"></i> Bill</a>
            <a href="#" class="btn btn-theme rounded-3 text-center flex-1"><i
                class="fa fa-shopping-cart d-block fs-18px my-1"></i> Submit Order</a>
          </div>
        </div>
      </div>
    </div>
    <!-- END pos-sidebar -->
  </div>
  <!-- END pos -->
@endsection
