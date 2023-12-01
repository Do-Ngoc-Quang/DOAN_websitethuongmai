
<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
    <h3 class="	text-center mb-5">iPhone</h3>
    <div class="container">

        <div class="row isotope-grid">

            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">

                <div class="block2 border border-info rounded p-3 ">

                    <div class="block2-pic hov-img0">
                        <img src="" alt="IMG-PRODUCT">

                        <!-- <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a> -->
                        <a class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                            <form action="/cart.add.iphone" method="POST">
                                
                                <input type="hidden" value="iphone" name="type">
                                <input type="hidden" value="{{$iphone->id}}" name="id">
                                <input type="hidden" value="{{$iphone->name}}" name="name">
                                <input type="hidden" value="{{$iphone->price}}" name="price">
                                <input type="hidden" value="1" name="quantity">
                                <input type="hidden" value="{{$iphone->picture}}" name="picture">
                                <button type="submit" class="btn_hover">
                                    Add to cart
                                </button>
                            </form>
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/iphone-{{$iphone->id}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                name
                            </a>

                            <span class="stext-105 cl3">
                                price
                            </span>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach
        </div>

    </div>
</div>
