<?php
	require 'vendor/autoload.php';
	\Stripe\Stripe::setApiKey('sk_test_51IvTtXJYhAtruV5mCxoZv81N83AoOm3RGm6aMd8jS2UHjvmIYpYfvWMuwvb2ubmkNPMvcKCYUxTC1rQ18h8cMOnb00bg7NAcB1');

	$checkout_session = \Stripe\Checkout\Session::create([
      'success_url' => 'http://localhost/easy-plate-blog/frontend/front-end/success.php',
      'cancel_url' => 'http://localhost/easy-plate-blog/frontend/front-end/cancel.html',
      'payment_method_types' => ['card'],
      'mode' => 'subscription',
      'line_items' => [[
        'price' => "price_1Ivh83JYhAtruV5mztH5MiSm",
        // For metered billing, do not pass quantity
        'quantity' => 1,
      ]],
    ]);


?>

<head>
  <title>Stripe Payment</title>
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
	<script type="text/javascript">
		var stripe = Stripe('pk_test_51IvTtXJYhAtruV5msS9JnIZdt3WcNyYXNm7AKFc3EwmEIqpSFRdVVltCAbfSn6S2SIKSm2NlMoRFeqQTFSB3SauS00hDGZauV2');
		var session = "<?php echo $checkout_session['id']; ?>";
		stripe.redirectToCheckout({ sessionId: session })
		.then(function(result) {
          // If `redirectToCheckout` fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using `error.message`.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function(error) {
          console.error('Error:', error);
        });
	</script>
</body>