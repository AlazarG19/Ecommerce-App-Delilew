// jquery for the filtering
$(document).ready(function () {
  console.log('is this connected')
  // isotope filter
  var $grid = $('.grid').isotope({
    itemSelector: '.grid-items',
    layoutMode: 'fitRows',
  })
  // filter items on button click
  $('.button-group').on('click', 'button', function () {
    var filterValue = $(this).attr('data-filter')
    $grid.isotope({ filter: filterValue })
  })
  // end of filter items on button click
  // product qty sectoin
  let $qtyup = $('.qty .qty-up')
  let $qtydown = $('.qty .qty-down')

  let $qtyup2 = $('.qty2 .qty-up')
  let $qtydown2 = $('.qty2 .qty-down')

  $qtyup.click(function () {
    let $input = $(`.qty-input[data-id = '${$(this).data('id')}']`)
    let $price = $(`.product_price[data-id = '${$(this).data('id')}']`)
    let $deal_price = $(`#deal-price`)
    $.ajax({
      url: 'RequestSide.php',
      type: 'post',
      data: {
        itemid: $(this).data('id'),
        userid: $(this).data('user_id'),
        eval: 'increment',
      },
      success: function (data) {
        console.log('this is the data', data)
        // $input.val($input.val() + 1)
        window.location.reload()
      },
    })
  })
  $qtydown.click(function () {
    let $input = $(`.qty-input[data-id = '${$(this).data('id')}']`)
    let $price = $(`.product_price[data-id = '${$(this).data('id')}']`)
    let $deal_price = $(`#deal-price`)
    console.log(
      'url',
      'RequestSide.php',
      'type',
      'post',
      'itemid',
      $(this).data('id'),
      'userid',
      $(this).data('user_id'),
      'decrement',
      $input,
    )
    $.ajax({
      url: 'RequestSide.php',
      type: 'post',
      data: {
        itemid: $(this).data('id'),
        userid: $(this).data('user_id'),
        eval: 'decrement',
      },
      success: function (data) {
        console.log('this is the data', data)
        // $input.val($input.val() + 1)
        window.location.reload()
      },
    })
  })
 

  $qtyup2.click(function () {
    let $input2 = $(`.qty2-input[data-id = '${$(this).data('id')}']`)
    let $price = $(`.product_price[data-id = '${$(this).data('id')}']`)
    let $deal_price = $(`#deal-price`)
    $.ajax({
      url: 'RequestSide.php',
      type: 'post',
      data: {
        itemid: $(this).data('id'),
        eval: 'getid',
      },
      success: function (data) {
        console.log('erroe')
        console.log('this is the data', data)
        let obj = JSON.parse(data)
        let item_price = obj[0]['item_price']
        $userid = $('.qty2 .qty-up').data("user_id")
        $.ajax({
          url: 'RequestSide.php',
          type: 'post',
          data: {
            itemid: obj[0]["item_id"],
            userid: $userid,
            eval: 'increment',
          },
          success: function (data) {
            // console.log("data2",data)
            console.log($price)
            $input2.val(+$input2.val() + 1)
            // increase price of the prodcut
            $price.text(parseInt(item_price * $input2.val()).toFixed(2))
            //change the price of total
            let subtotal = parseInt($deal_price.text()) + parseInt(item_price)
            $deal_price.text(subtotal.toFixed(2))
          },
        })
      },
    })
  })
  $qtydown2.click(function () {
    let $input2 = $(`.qty2-input[data-id = '${$(this).data('id')}']`)
    let $price = $(`.product_price[data-id = '${$(this).data('id')}']`)
    let $deal_price = $(`#deal-price`)
    if($input2.val() > 1){
      $.ajax({
        url: 'RequestSide.php',
        type: 'post',
        data: {
          itemid: $(this).data('id'),
          eval: 'getid',
        },
        success: function (data) {
          console.log('erroe')
          console.log('this is the data', data)
          let obj = JSON.parse(data)
          let item_price = obj[0]['item_price']
          $userid = $('.qty2 .qty-up').data("user_id")
          $.ajax({
            url: 'RequestSide.php',
            type: 'post',
            data: {
              itemid: obj[0]["item_id"],
              userid: $userid,
              eval: 'decrement',
            },
            success: function (data) {
              // console.log("data2",data)
              console.log($price)
              $input2.val(+$input2.val() - 1)
              // increase price of the prodcut
              $price.text(parseInt(item_price * $input2.val()).toFixed(2))
              //change the price of total
              let subtotal = parseInt($deal_price.text()) - parseInt(item_price)
              $deal_price.text(subtotal.toFixed(2))
            },
          })
        },
      })
    }
  })
})

