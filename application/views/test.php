
<form action="<?= base_url('Course/setCart'); ?>" method="post">
	<input type="text" name="category" value="cat"><br>
	<input type="text" name="cat_value" value="123"><br>
	<input type="text" name="plan" value="basic"><br>
	<input type="text" name="price" value="200"><br>
	<input type="text" name="orderid" value="<?= "ord_".mt_rand(000000000,999999999); ?>"><br>
	<button>Submit</button>
</form>